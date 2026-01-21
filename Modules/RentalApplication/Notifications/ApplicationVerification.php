<?php

namespace Modules\RentalApplication\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\HtmlString;

class ApplicationVerification extends Notification
{
    use Queueable;
    public $userObj, $type, $application_id;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($userObj, $type = null, $application_id = null)
    {
        $this->userObj = $userObj;
        $this->type = $type;
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
        $mailMessage = (new MailMessage)->subject($this->userObj['subject'])->greeting('Hello ' . $this->userObj['user_name'] . ',')->line(new HtmlString($this->userObj['msg']));
        if ($this->userObj['user_address'] != '') {
            $mailMessage->line($this->userObj['user_address']);
        }
        if ($this->userObj['msg2'] != '') {
            $mailMessage->line(new HtmlString($this->userObj['msg2']));
        }
        if ($this->application_id != '') {
            $mailMessage->action('Give a Review', route('rental_application.screeningRentalApplication', ['type' => $this->type, 'application_id' => encrypt($this->application_id)]));
        }
        $mailMessage->line('If you are unable to provide a reference, please let us know by replying to this email.')->line('Thank you for your cooperation.');
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
