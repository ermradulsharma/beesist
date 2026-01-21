<?php

namespace Modules\Property\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

class PerformanceReportNotification extends Notification
{
    use Queueable;
    public $name;
    public $subject;
    public $message;
    public $email2;

    /**
     * Create a new notification instance.
     */
    public function __construct($name, $subject, $message, $email2 = null)
    {
        $this->name = $name;
        $this->subject = $subject;
        $this->message = $message;
        $this->email2 = $email2;
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
        $greeting = 'Hello ' . $this->name;

        $mailMessage = (new MailMessage())
            ->subject($this->subject)
            ->greeting($greeting)
            ->line(new HtmlString($this->message))
            ->line('Thank you for using our application!');
        if ($this->email2) {
            $mailMessage->cc($this->email2);
        }

        return $mailMessage;
    }

    /**
     * Get the array representation of the notification.
     */
    public function toArray($notifiable): array
    {
        return [];
    }
}
