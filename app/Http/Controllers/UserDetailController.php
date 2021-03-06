<?php

namespace App\Http\Controllers;

use App\User;
use App\Community;
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
		// $usersID = Auth::user()->type === 3
		// 	? Auth::user()->community = Community::find(Auth::user()->userDetail->details->referredCommunity)->users
		// 	: Auth::user()->community->users;
		// $usersID = $usersID ? $usersID : [];

		$admin = Auth::user()->type === 3
			? Auth::user()->community = Community::find(Auth::user()->userDetail->details->referredCommunity)
			: Auth::user()->community;

		$users = User::where(['type' => 1, 'imported_by' => Auth::user()->community->id])->get();

        return view('user.list', compact('users'));
	}

	/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$admin = Auth::user();

        return view('user.create', compact('admin'));
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
			'area' => $request->area,
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
		$admin = Auth::user();

		return view('user.view', compact('admin', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(UserDetail $user)
    {
		$admin = $user->user;

		return view('user.edit', compact('admin', 'user'));
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
			'area' => $request->area,
			'email' => $request->email,
			'medium' => $request->medium,
			'address' => $request->address,
			'communication' => $request->communication,
		];

		if (Auth::user()->type === 0) $rawDetails['uno'] = $request->uno;

		$user->details = $rawDetails;
		$user->update();

		$authUser = $user->user;
		$authUser->name = $request->name;
		$authUser->email = $request->email['1'];
		$authUser->update();

		$request->session()->flash('status', 'Details updated successfully!');

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

	public function levyReport(Request $request)
	{
		dd($request);
	}
}
