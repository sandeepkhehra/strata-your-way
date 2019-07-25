<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperAdminController extends Controller
{
    public function index()
	{
		return view('super-admin.super');
	}

	public function users()
	{
		$admin = Auth::user();
		$users = User::where('email', '<>', $admin->email)->get();

		return view('super-admin.all-users', compact('admin', 'users'));
	}

	public function communities()
	{
		return view('super-admin.all-communities');
	}
}
