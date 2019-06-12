<?php

namespace App\Http\Controllers;

use App\Mail\GetQuote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;

class GetQuoteController extends Controller
{
	public function index()
	{
		if ( ! Auth::check() ) return view('landing.page');
		else return (new UserController)->index();
	}
	public function getQuote(Request $request)
	{
		$quoteData =  $request->all();
		Mail::to($request->user_email)
			->send(new GetQuote($quoteData));

		Mail::to('contact@stratayoaurway.com.au')
			->send(new GetQuote($quoteData, 'quote', 'admin'));
	}

	public function contact(Request $request)
	{
		$contactData =  $request->all();

		Mail::to($request->email)
			->send(new GetQuote($contactData, 'contact'));
	}

	public function contactOther(Request $request)
	{
		$contactData =  $request->all();

		Mail::to($request->send_to)
			->send(new GetQuote($contactData, 'contactOther'));
	}
}
