<?php

namespace App\Http\Controllers;

use App\User;
use App\Community;
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

		// Assign parent community to lot owner.
		$admin->type === 3 ? $admin->community = Community::find($admin->userDetail->details->referredCommunity) : '';
		dd($admin->maintenanceRequests());
		$lotUsers = User::where(['type' => 1])->get();
		$maintenanceRequests = $admin->maintenanceRequests()->orderBy('created_at', 'DESC')->get();

		return view('admin.index', compact( 'admin', 'lotUsers', 'maintenanceRequests'));
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

	public function import()
	{
		echo "<pre>";
		print_r($_FILES);
		echo "</pre>";
		dd('asdad');
	}
}
