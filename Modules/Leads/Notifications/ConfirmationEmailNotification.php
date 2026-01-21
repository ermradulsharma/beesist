<?php

namespace Modules\Leads\Notifications;

use App\Domains\Auth\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

class ConfirmationEmailNotification extends Notification
{
    use Queueable;
    public $data;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
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
        $uuid = User::where('email', $this->data['user_email'])->first()->uuid;

        return (new MailMessage())
            ->subject($this->data['subject'])
            ->greeting('Hello ' . $this->data['user_name']  . ',')
            ->line(new HtmlString($this->data['msg']))
            ->action('Fill Agreement', route('pma.form', ['account_id' => $uuid]))
            ->line('Please complete the agreement process by the specified deadline.')
            ->line('If you are unable to provide a reference, please let us know by replying to this email.')
            ->line('Thank you for your cooperation.');
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
