<?php

namespace Modules\Property\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;
use Modules\Property\Entities\ShowingApplication;

class ShowingRequestNotification extends Notification
{
    use Queueable;
    public $applicationData;
    public $body;
    public $subject;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(ShowingApplication $applicationData, $body, ?string $subject)
    {
        $this->applicationData = $applicationData;
        $this->body = $body;
        $this->subject = $subject ?? 'Default Subject';
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
        $agentName = optional($this->applicationData->agent)->first_name ?? 'Agent';
        $subject = $this->subject ?? 'Default Subject';
        $greeting = 'Hello ' . $agentName;

        return (new MailMessage())->subject($subject)->greeting($greeting)->line(new HtmlString($this->body));
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
