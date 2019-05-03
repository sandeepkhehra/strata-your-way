<?php

namespace App\Http\Controllers;

use App\MaintenanceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MaintenanceRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		/** Can we use eloquent here? */
		$requests = MaintenanceRequest::where('user_id', Auth::id())->get();

		return view('maintenance.list', compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$types = MaintenanceRequest::TYPES;

        return view('maintenance.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$maintenance = new MaintenanceRequest;
		$maintenance->user_id = Auth::id();
		$maintenance->title = $request->title;
		$maintenance->type = $request->type;
		$maintenance->description = $request->description;
		$maintenance->save();

		$request->session()->flash('status', 'Request posted successfully!');

		return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MaintenanceRequest  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function show(MaintenanceRequest $maintenance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MaintenanceRequest  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function edit(MaintenanceRequest $maintenance)
    {
        return view('maintenance.edit', compact('maintenance'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MaintenanceRequest  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MaintenanceRequest $maintenance)
    {
		$maintenance->status = $request->status;

		if ($maintenance->status === 'quoted') :
			$maintenance->quote = $request->quote;
			$maintenance->contractors = $request->contractors;
		elseif ($maintenance->status === 'allocated') :
			$maintenance->assigned = $request->assigned;
		elseif ($maintenance->status === 'invoiced') :
			$path = $request->file('attachment')->storeAs('public/invoices', $request->file('attachment')->getClientOriginalName());
			$maintenance->invoice = $request->invoice;
			$maintenance->attachment = $path;
		endif;

		$maintenance->comments = $request->comments;
		$maintenance->update();

		return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MaintenanceRequest  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function destroy(MaintenanceRequest $maintenance)
    {
        //
    }
}
