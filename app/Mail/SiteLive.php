<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SiteLive extends Mailable
{
    use Queueable, SerializesModels;

	protected $site, $first_error_tstamp;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($site, $first_error_tstamp)
    {
		$this->site = $site;
		$this->first_error_tstamp = $first_error_tstamp;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Your website is alive now')
        	->view('mail.site.live',[
        		'site' => $this->site,
        		'first_error_tstamp' => $this->first_error_tstamp
        	]);
    }
}
