<?php

namespace App\Http\Controllers;

use App\User;
use App\Community;
use App\UserInviteToken;
use App\Mail\InviteUser;
use App\MaintenanceRequest;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\RemovedAdminAccess;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CommunityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		// Temporary.
		return $this->create();
	}

	public function upload(Community $community)
	{
		return view('community.docEdit', compact('community'));
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$user = Auth::user();

		if (! is_null($user->community)) {
			return redirect('/');
		}

        $users = User::all();

		return view('community.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$community = new Community;
		$community->user_id = Auth::id();
		$community->name = $request->name;
		$community->email = $request->email;
		$community->details = $request->details;
		$community->users = [];
		$community->save();

		return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function show(Community $community)
    {
        return view('community.docView', compact('community'));
	}

	public function documentData(Community $community)
	{
		echo "<pre>";
		print_r($community);
		print_r($_POST);
		echo "</pre>";
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function edit(Community $community)
    {
		$lotUsers = User::where(['imported_by' => Auth::user()->community->id])->get();

        return view('community.edit', compact('community', 'lotUsers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Community $community)
    {
		if (isset($request->doc_type)) {
			$documents = $community->documents;
			$documents[$request->doc_type][] = [
				'file' => $request->file('file')->storeAs('public/community_documents', $request->file('file')->getClientOriginalName()),
				'time' => date('Y-m-d H:i:s'),
			];
			$community->documents = $documents;
			$community->update();

			$documentPost = new MaintenanceRequest;
			$documentPost->user_id = Auth::id();
			$documentPost->community_id = Auth::user()->community->id;
			$documentPost->title = $request->file('file')->getClientOriginalName();
			$documentPost->description = ''; // Leaving this blank for this case.
			$documentPost->contractors = [
				'doc_type' => array_search($request->doc_type, Community::DOC_TYPES),
				'file_path' => $request->file('file')->storeAs('public/community_documents', $request->file('file')->getClientOriginalName()),
			]; // Just doing this to mark it unique. Using 'contractor' field as it is already casted as array.

			$documentPost->save();

			$request->session()->flash('status', 'Document uploaded successfully!');
		} else {
			$users = ! is_null($request->users) ? $request->users : [];
			$nominatedAdmins = $community->users;

			$community->update([
				'name' => $request->name,
				'email' => $request->email,
				'details' => $request->details,
				'users' => $users,
			]);

			$user = Auth::user();

			$invite = UserInviteToken::create([
				'community_id' => $user->community->id,
				'user_ids' => $users,
				'token' => Str::random(16),
			]);

			$removedUsers = array_diff($nominatedAdmins, $users);

			foreach ($users as $userID) {
				$invitedUser = User::findOrFail($userID);

				if ($invitedUser->type !== 3)
					Mail::to($invitedUser->userDetail->details->email->{'1'})->send(new InviteUser($invitedUser, $user->community, $invite));
			}

			foreach ($removedUsers as $userID) {
				$removedUser = User::findOrFail($userID);
				$removedUser->type = 1;
				$removedUser->update();

				Mail::to($removedUser->userDetail->details->email->{'1'})->send(new RemovedAdminAccess($removedUser, $user->community));
			}

			$request->session()->flash('status', 'Community details updated successfully!');
		}

		return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function destroy(Community $community)
    {
        //
	}

	public function invite()
	{
		$userIDs = $_POST['owner_ids'];
		$user = Auth::user();

		$invite = UserInviteToken::create([
			'community_id' => $user->community->id,
			'user_ids' => $userIDs,
			'token' => Str::random(16),
		]);

		foreach ($userIDs as $userID) {
			$invitedUser = User::findOrFail($userID);
			Mail::to($invitedUser->userDetail->details->email->{'1'})->send(new InviteUser($invitedUser, $user->community, $invite));
		}

		echo json_encode([
			'type' => 'success',
			'msg' => 'Invite(s) sent successfully!',
		]);
	}

	public function getDoc(Community $community, $docType)
	{
		$documents = $community->documents;
		$return = [];

		if (isset($documents[$docType])) :
			$order = array_reverse($documents[$docType]);

			foreach ($order as $document) :
				$exists = Storage::disk('local')->exists($document['file']);
				if ($exists) {
					$return[] = '<a href="'.Storage::url($document['file']).'" download="'. str_replace('public/community_documents/', '', $document['file']) .'">'. str_replace('public/community_documents/', '', $document['file']) .'</a>
					<span class="text-muted" style="margin-left:100px">'. $document['time'] .'</span>
					<button class="btn btn-danger float-right" data-doc-delete="'. Storage::url($document['file']) .'" data-community="'. $community->id .'"><i class="fa fa-trash"></i> Delete</button>';
				}
			endforeach;
		endif;

		return response()->json( $return );
	}

	public function deleteDoc(Request $request)
	{
		$fileName = str_replace('/storage/', '', $request->file);
		unlink(storage_path('app/public/' . $fileName));

		// remove the file path from DB as well?
		// $community = Community::findOrFail($request->community);
		// $documents = $community->documents;
		// dd($documents);
	}
}
