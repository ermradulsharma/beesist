<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GetQuoteNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $quote;
    public $content;
    public $subjectLine;

    /**
     * Create a new message instance.
     *
     * @param  \stdClass|object  $quote
     * @param  string  $content
     * @param  string  $subjectLine
     * @return void
     */
    public function __construct($quote, $content, $subjectLine)
    {
        $this->quote = $quote;
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
