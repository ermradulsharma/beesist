<?php

namespace Modules\RentalApplication\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\HtmlString;

class LandlordApplicationVerification extends Notification
{
    use Queueable;
    public $landlordObj, $type, $subject, $text_body, $text_body2, $application_id;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($landlordObj, $type, $subject, $text_body, $text_body2, $application_id)
    {
        $this->landlordObj = $landlordObj;
        $this->type = $type;
        $this->subject = $subject;
        $this->text_body = $text_body;
        $this->text_body2 = $text_body2;
        $this->application_id = $application_id;
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
        $refernceName = ($this->type == 'landlord') ? $this->landlordObj['landlord_name'] : $this->landlordObj['employer_name'];
        $refernceAddress = ($this->type == 'landlord') ? $this->landlordObj['property_address'] : $this->landlordObj['employment_address'];

        return (new MailMessage)
            ->subject($this->subject)
            ->greeting('Hello ' . $refernceName  . ',')
            ->line(new HtmlString($this->text_body))
            ->line($refernceAddress)
            ->line(new HtmlString($this->text_body2))
            ->action('Give a Review', url('rental_application.review', [$this->type, encrypt($this->application_id)]))
            ->line('If you are unable to provide a reference, please let us know by replying to this email.')
            ->line('Thank you for your cooperation.')
            ->line('Regards,')
            ->line($this->landlordObj['site_name'] . ' Team');
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
