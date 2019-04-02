<?php

namespace App\Http\Controllers;

use App\User;
use App\Community;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommunityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

		return view('welcome', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
		$community->users = $request->users;
		$community->save();

		return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function show(Community $community)
    {
        return view('community.docEdit', compact('community'));
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
			$community->doc_type = $request->doc_type;
			$community->documents = $request->file('file')->store('community_documents');
			$community->update();
		} else {
			$community->update([
				'name' => $request->name,
				'email' => $request->email,
				'details' => $request->details,
				'admins' => $request->admins,
			]);
		}

		return redirect('/admin-area');
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
}
