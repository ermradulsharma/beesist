<?php

namespace Modules\Leads\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\HtmlString;

class ApplicationAttachementNotification extends Notification
{
    use Queueable;
    public $name;
    public $subject;
    public $message;
    public $attachment;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($name, $subject, $message, $attachment)
    {
        $this->name = $name;
        $this->subject = $subject;
        $this->message = $message;
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
        if ($this->name) {
            $message->greeting('Hello ' . $this->name . ',');
        }
        $message->line(new HtmlString($this->message));
        $message->line('Thank you for your cooperation.');
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
