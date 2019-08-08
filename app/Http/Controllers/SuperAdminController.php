<?php

namespace App\Http\Controllers;

use App\User;
use App\Community;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperAdminController extends Controller
{
    public function index()
	{
		$communities = Community::all();
		return view('super-admin.super', compact('communities'));
	}

	public function users()
	{
		$admin = Auth::user();
		$users = User::where('email', '<>', $admin->email)->get();

		return view('super-admin.all-users', compact('admin', 'users'));
	}

	public function community(Request $request, Community $community)
	{
		$admin = User::find($community->user_id);
		if ( is_null( $admin ) ) {
			$admin = (object) [
				'community' => null,
			];
		}
		$lotUsers = User::where(['imported_by' => $community->id])->get();
		return view('super-admin.community', compact('community', 'admin', 'lotUsers'));
	}

	public function user(Request $request, User $user)
	{
		$admin = $user;
		if ( is_null( $admin ) ) {
			$admin = (object) [
				'community' => null,
			];
		}

		return view('user.edit', compact('admin', 'user'));
	}
}
