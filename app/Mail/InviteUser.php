<?php

namespace App\Mail;

use App\User;
use App\Community;
use App\UserInviteToken;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InviteUser extends Mailable
{
	use Queueable, SerializesModels;

	private $user;
	private $token;
	private $community;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Community $community, UserInviteToken $token)
    {
		$this->community = $community;
		$this->token = $token::where(['community_id' => $this->community->id])->value('token');
		$this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
		return $this->from($this->community->email)
			->view('emails.invite')->with([
					'community' => $this->community->name,
					'token' => $this->token,
					'user' => $this->user,
				]);
    }
}
