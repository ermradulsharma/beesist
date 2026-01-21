<?php

namespace Modules\Leads\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\HtmlString;

class LeadsFormNotification extends Notification
{
    use Queueable;
    public $data, $subject, $message;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data, $subject, $message)
    {
        $this->data = $data;
        $this->subject = $subject;
        $this->message = $message;
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
            ->subject($this->subject)
            ->greeting('Hello ' . $this->data['name']  . ',')
            ->line(new HtmlString($this->message))
            ->line('If you are unable to provide a reference, please let us know by replying to this email.')
            ->line('Thank you for your cooperation.');
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
            //
        ];
    }
}
