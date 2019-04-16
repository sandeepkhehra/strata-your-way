<?php

namespace App\Http\Controllers;

use App\UserInviteToken;
use Illuminate\Http\Request;

class ValidateInvitedUserController extends Controller
{
    public function validateInvite($token, $id)
	{
		$isValid = UserInviteToken::where(['token' => $token])->first();
		dd($id);
	}
}
