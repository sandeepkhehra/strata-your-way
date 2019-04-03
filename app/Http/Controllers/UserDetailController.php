<?php

namespace App\Http\Controllers;

use App\User;
use App\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$usersID = Auth::user()->community->users;
		$users = [];

		foreach ($usersID as $userID ) {
			$users[] = User::find($userID);
		}

        return view('user.list', compact('users'));
	}

	/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$user = Auth::user();

        return view('user.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$rawDetails = [
			'tel' => $request->tel,
			'email' => $request->email,
			'medium' => $request->medium,
			'address' => $request->address,
			'communication' => $request->communication,
		];


		$user = Auth::user();
		$user->name = $request->name;
		$user->update();

		$userDetail = new UserDetail;
		$userDetail->user_id = Auth::id();
		$userDetail->details = $rawDetails;
		$userDetail->save();

		$request->session()->flash('status', 'Profile updated successfully!');

		return redirect('/');
	}

	/**
     * Display the specified resource.
     *
     * @param  \App\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function show(UserDetail $user)
    {
		return view('user.view', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(UserDetail $userDetail)
    {
		$user = Auth::user();

		return view('user.edit', compact('user', 'userDetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserDetail $user)
    {
        $rawDetails = [
			'tel' => $request->tel,
			'email' => $request->email,
			'medium' => $request->medium,
			'address' => $request->address,
			'communication' => $request->communication,
		];

		// $authUser = Auth::user();
		// $authUser->name = $request->name;
		// $authUser->update();

		// dd($request);

		$user->user_id = Auth::id();
		$user->details = $rawDetails;
		$user->update();

		$request->session()->flash('status', 'Profile updated successfully!');

		return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserDetail $userDetail)
    {
        //
    }
}
