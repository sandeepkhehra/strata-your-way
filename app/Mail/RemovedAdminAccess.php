<?php

namespace App\Mail;

use App\User;
use App\Community;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RemovedAdminAccess extends Mailable
{
	use Queueable, SerializesModels;

	private $user;
	private $community;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Community $community)
    {
		$this->user = $user;
        $this->community = $community;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->community->email)
			->view('emails.removedAccess')->with([
					'community' => $this->community->name,
					'user' => $this->user,
				]);
    }
}
