<?php

namespace Modules\RentalApplication\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

class RentalApplicationNotification extends Notification
{
    use Queueable;
    public $userObj;
    public $subject;
    public $message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($userObj, $subject, $message)
    {
        $this->userObj = $userObj;
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
        return (new MailMessage())
            ->subject($this->subject)
            ->greeting('Hello ' . $this->userObj['first_name'] . ',')
            ->line(new HtmlString($this->message))
            ->line('If you are unable to provide a reference, please let us know by replying to this email.')
            ->line('Thank you for your cooperation.')
            ->line('Regards,')
            ->line(config('app.name') . ' Team');
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
