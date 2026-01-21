<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PmaNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $form;
    public $content;
    public $subjectLine;

    /**
     * Create a new message instance.
     *
     * @param  object  $form
     * @param  string  $content
     * @param  string  $subjectLine
     * @return void
     */
    public function __construct($form, $content, $subjectLine)
    {
        $this->form = $form;
        $this->content = $content;
        $this->subjectLine = $subjectLine;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subjectLine)
            ->html($this->content);
    }
}
