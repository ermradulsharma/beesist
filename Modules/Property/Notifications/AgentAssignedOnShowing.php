<?php

namespace Modules\Property\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;
use Modules\Property\Entities\PropertyShowing;

class AgentAssignedOnShowing extends Notification
{
    use Queueable;
    public $showing, $message, $subject;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(PropertyShowing $showing, $message, ?string $subject = 'Default Subject')
    {
        $this->showing = $showing;
        $this->message = $message;
        $this->subject = $subject ?? 'Default Subject';
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
        $agentName = optional($this->showing->agent)->first_name ?? 'Agent';
        $subject = $this->subject ?? 'Default Subject';
        $greeting = 'Hello ' . $agentName;
        return (new MailMessage)->subject($subject)->greeting($greeting)->line(new HtmlString($this->message));
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
