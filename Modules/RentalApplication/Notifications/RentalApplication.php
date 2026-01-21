<?php

namespace Modules\RentalApplication\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

class RentalApplication extends Notification
{
    use Queueable;
    public $rentalApplicationObj;
    public $subject;
    public $textBody;
    public $textBody2;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($rentalApplicationObj, $subject, $textBody, $textBody2 = null)
    {
        $this->rentalApplicationObj = $rentalApplicationObj;
        $this->subject = $subject;
        $this->textBody = $textBody;
        $this->textBody2 = $textBody2;
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
        $mailMessage = (new MailMessage())
            ->subject($this->subject)
            ->greeting('Hello ' . $this->rentalApplicationObj['first_name'] . ',')
            ->line(new HtmlString($this->textBody));
        if (! is_null($this->textBody2)) {
            $mailMessage->line(new HtmlString($this->textBody2));
        }
        if (! is_null($this->rentalApplicationObj['id'])) {
            $mailMessage->action('Preview Property', route('rental_application.rentalApplicationPreviw', ['id' => encrypt($this->rentalApplicationObj['id'])]));
        }
        $mailMessage->line('If you are unable to provide a reference, please let us know by replying to this email.')
            ->line('Thank you for your cooperation.')
            ->line('Regards,')
            ->line(config('app.name') . ' Team');

        return $mailMessage;
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
