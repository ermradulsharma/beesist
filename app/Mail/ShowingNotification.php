<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ShowingNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $showingApplication;
    public $content;
    public $subject;

    /**
     * Create a new message instance.
     *
     * @param  object  $showingApplication
     * @param  string  $content
     * @param  string|null  $subject
     * @return void
     */
    public function __construct($showingApplication, $content, $subject = 'Showing Notification')
    {
        $this->showingApplication = $showingApplication;
        $this->content = $content;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)
            ->html($this->content);
    }
}
