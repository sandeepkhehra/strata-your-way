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
		$admin = Auth::user();
		$maintenanceRequests = $admin->maintenanceRequests()->orderBy('created_at', 'DESC')->get();

		return view('admin.index', compact('admin', 'maintenanceRequests'));
	}

	public function handleLotUser()
	{
		$admin = Auth::user();

		if (is_null($admin->userDetail)) {
			return redirect()->route('user.create');
		}

		$maintenanceRequests = $admin->maintenanceRequests()->orderBy('created_at', 'DESC')->get();

		return view('lot.index', compact('admin', 'maintenanceRequests'));
	}
}
