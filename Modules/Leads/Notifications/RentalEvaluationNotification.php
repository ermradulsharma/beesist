<?php

namespace Modules\Leads\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

class RentalEvaluationNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $content;
    public $subject;

    /**
     * Create a new notification instance.
     */
    public function __construct($content, $subject)
    {
        $this->content = $content;
        $this->subject = $subject;
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
            ->line(new HtmlString($this->content))
            ->line('If you are unable to provide a reference, please let us know by replying to this email.')
            ->line('Thank you for your cooperation.');
    }

    /**
     * Get the array representation of the notification.
     */
    public function toArray($notifiable): array
    {
        return [];
    }
}
