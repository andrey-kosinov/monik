<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SiteDead extends Mailable
{
    use Queueable, SerializesModels;

    protected $site;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($site)
    {
        $this->site = $site;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Your website is unavailable')
        	->view('mail.site.dead',[
        		'site' => $this->site
        	]);
    }
}
