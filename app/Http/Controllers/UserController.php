<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'check.admin']);
	}

	public function index()
	{
		$user = Auth::user();

		if ($user->type === 1) {
			return $this->handleLotUser();
		} else {
			return $this->handleAdminUser();
		}
	}

	public function handleAdminUser()
	{
		$user = Auth::user();
		$maintenanceRequests = $user->maintenanceRequests()->orderBy('created_at', 'DESC')->get();

		return view('admin.index', compact('user', 'maintenanceRequests'));
	}

	public function handleLotUser()
	{
		$user = Auth::user();

		if (is_null($user->userDetail)) {
			return redirect()->route('user.create');
		}

		$maintenanceRequests = $user->maintenanceRequests()->orderBy('created_at', 'DESC')->get();

		return view('lot.index', compact('user', 'maintenanceRequests'));
	}
}
