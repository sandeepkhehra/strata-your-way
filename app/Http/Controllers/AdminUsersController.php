<?php

namespace App\Http\Controllers;

use App\Community;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUsersController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
		$user = Auth::user();
		$maintenanceRequests = $user->maintenanceRequests()->orderBy('created_at', 'DESC')->get();

        return view('admin.index', compact('user', 'maintenanceRequests'));
	}

	public function levies()
	{
		return view('admin.levies.index');
	}
}
