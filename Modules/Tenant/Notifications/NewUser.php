<?php

namespace Modules\Tenant\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\HtmlString;
use Illuminate\Notifications\Messages\MailMessage;

class NewUser extends Notification
{
    use Queueable;
    protected $mailData;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($mailData)
    {
        $this->mailData = $mailData;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
        ->from($this->mailData['from_email'], $this->mailData['from_name'])
        ->subject($this->mailData['subject'])
        ->greeting('Hello ' . $this->mailData['user_name'])
        ->line(new HtmlString($this->mailData['message']));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'message' => $this->mailData['message'],
        ];
    }
}
