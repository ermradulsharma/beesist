<?php

namespace Modules\Tenant\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\HtmlString;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Crypt;

class TenantAgreementNotification extends Notification
{
    use Queueable;
    public $content;
    public $subject;
    public $first_name = null;
    public $attachment = null;
    public $ccEmails = null;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($content, $subject, $first_name = null, $ccEmails = null, $attachment = null)
    {
        $this->content = $content;
        $this->subject = $subject;
        $this->first_name = $first_name;
        $this->ccEmails = $ccEmails;
        $this->attachment = $attachment;
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
        $message = (new MailMessage())->subject($this->subject);
        if ($this->first_name) {
            $message->greeting('Hello ' . $this->first_name . ',');
            if ($this->ccEmails) {
                if (is_array($this->ccEmails)) {
                    foreach ($this->ccEmails as $ccEmail) {
                        $message->cc($ccEmail);
                    }
                } else {
                    $message->cc($this->ccEmails);
                }
            }
        }
        $message->line(new HtmlString($this->content));
        if (is_array($this->attachment)) {
            foreach ($this->attachment as $file) {
                if (is_file($file)) {
                    $message->attach($file);
                }
            }
        } else {
            if (is_file($this->attachment)) {
                $message->attach($this->attachment);
            }
        }
        return $message;
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
