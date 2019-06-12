<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class GetQuote extends Mailable
{
	use Queueable, SerializesModels;

	private $for;
	public $subject;
	private $formType;
	private $formData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $formData, $formType = 'quote', $for = 'user')
    {
		$this->for = $for;
		$this->formType = $formType;
		$this->formData = $formData;

		$this->subject =  $this->formType === 'quote' ? 'Your Quote!' : (
			$this->formType === 'contact' ? 'Thanks for Contacting Strata Your Way' :
			'A user sent you an email - Strata Your Way'
		);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
		return $this->view('emails.getQuote')
				->subject($this->subject)
				->with([
					'for' => $this->for,
					'formType' => $this->formType,
					'formData' => $this->formData,
				]);
    }
}
