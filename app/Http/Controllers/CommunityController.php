<?php

namespace App\Http\Controllers;

use App\User;
use App\Community;
use App\UserInviteToken;
use App\Mail\InviteUser;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
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
        return view('community.edit', compact('community'));
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
			$documents[$request->doc_type][] = $request->file('file')->storeAs('public/community_documents', $request->file('file')->getClientOriginalName());
			$community->documents = $documents;
			$community->update();
		} else {
			$community->update([
				'name' => $request->name,
				'email' => $request->email,
				'details' => $request->details,
				'users' => $request->users,
			]);
		}

		$request->session()->flash('status', 'Document uploaded successfully!');

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
			Mail::to($invitedUser->email)->send(new InviteUser($invitedUser, $user->community, $invite));
		}

		// $users = User::findMany($userIDs);

	}

	public function getDoc(Community $community, $docType)
	{
		$documents = Community::value('documents');
		$return = [];

		if (isset($documents[$docType])) :
			$order = array_reverse($documents[$docType]);

			foreach ($order as $document) :
				$return[] = '<a href="'.Storage::url($document).'">'. ltrim($document, 'public/community_documents/') .'</a> <button class="btn btn-danger float-right" data-doc-delete="'. Storage::url($document) .'"><i class="fa fa-trash"></i> Delete</button>';
			endforeach;
		endif;

		return response()->json( $return );
	}

	public function deleteDoc(Request $request)
	{
		echo $request->file;
		// $l = Storage::delete($request->file);
		$l = Storage::delete('invoices/fifasetup.ini');
		echo "<pre>";
		print_r($l);
		echo "</pre>";
	}
}
