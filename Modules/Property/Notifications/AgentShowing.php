<?php

namespace Modules\Property\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;
use Modules\Property\Entities\ShowingApplication;

class AgentShowing extends Notification
{
    use Queueable;
    public $showing;
    public $message;
    public $subject;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(ShowingApplication $showing, $message, $subject = null)
    {
        $this->showing = $showing;
        $this->message = $message;
        $this->subject = $subject;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $greeting = 'Hello';
        if ($this->showing->agent && $this->showing->agent->first_name) {
            $greeting .= ' ' . $this->showing->agent->first_name;
        } else {
            $greeting .= ' Agent';
        }

        return (new MailMessage())->subject($this->subject)->greeting($greeting)->line(new HtmlString($this->message));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'message' => $this->message,
        ];
    }
}
