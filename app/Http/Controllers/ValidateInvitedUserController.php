<?php

namespace App\Http\Controllers;

use App\User;
use App\Community;
use App\UserInviteToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ValidateInvitedUserController extends Controller
{
    public function validateInvite($token, $id)
	{
		$isValid = UserInviteToken::where(['token' => $token])->first();

		if (is_null($isValid)) abort(404);

		if (in_array($id, $isValid->user_ids)) {
			$user = User::find($id);

			if (! is_null($user) && $community = Community::where(['id' => $isValid->community_id])->first()) {
				/** Update the Community users if not already exists. */
				$communityUsers = $community->users ? $community->users : [];

				if (! in_array($id, $communityUsers)) $communityUsers[] = $id;

				$community->update([
					'users' => $communityUsers,
				]);

				/** Update user details and reference the Community ID. */
				$userDetails = $user->userDetail->details;
				$userDetails->referredCommunity = $isValid->community_id;
				$user->userDetail->details = $userDetails;
				$user->userDetail->update();

				/** Update User type to 3. [3 = invited] */
				$user->type = 3;
				$user->update();

				/** Delete the invited code history. */
				$isValid->delete();

				Auth::login($user);

				return redirect('/')->with('status', 'You are successfully registered to this community!');
			}
		} else {
			return redirect('/');
		}
	}
}
