<?php

namespace Modules\Property\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\HtmlString;

class AppointmentNotification extends Notification
{
    use Queueable;
    public $name, $subject, $message;

    /**
     * Create a new notification instance.
     */
    public function __construct($name, $subject, $message)
    {
        $this->name = $name;
        $this->subject = $subject;
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via($notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject($this->subject)
            ->greeting('Hello ' . $this->name. ',')
            ->line(new HtmlString($this->message))
            ->line('If you are unable to provide a reference, please let us know by replying to this email.')
            ->line('Thank you for your attention to this matter.');
    }

    /**
     * Get the array representation of the notification.
     */
    public function toArray($notifiable): array
    {
        return [];
    }
}
