<?php

namespace App\Http\Controllers;

use App\User;
use App\Community;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\SuperAdminController;

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
		if ( $admin->email === 'contact@stratayourway.com.au' ) {
			return (new SuperAdminController)->index();
		}

		// Assign parent community to lot owner.
		$admin->type === 3 ? $admin->community = Community::find($admin->userDetail->details->referredCommunity) : '';

		$lotUsers = User::where(['type' => 1, 'imported_by' => $admin->community->id])->get();
		$maintenanceRequests = $admin->community->maintenanceRequests()->orderBy('created_at', 'DESC')->get();
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

	public function import(Request $request)
	{
		Excel::import(new UsersImport, $request->file('csv-file'));
	}

	public function delete(User $user)
	{
		$user->delete();

		return redirect()->back()->with('status', 'User deleted successfully!');
	}
}
