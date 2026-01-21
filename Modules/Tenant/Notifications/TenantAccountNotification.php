<?php

namespace Modules\Tenant\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TenantAccountNotification extends Notification
{
    use Queueable;
    public $user;
    public $password;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user, $password)
    {
        $this->user = $user;
        $this->password = $password;
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
        return (new MailMessage())->subject('Registration confirmed at ' . config('app.name') . '!')
            ->greeting('Hello ' . $this->user->first_name . ',')
            ->line('Your account has been created with ' . config('app.name') . '.')
            ->line('You can login with:')
            ->line('Username: ' . $this->user->email)
            ->line('Password: ' . $this->password)
            ->action('Sign In', route('login'))
            ->line('Thank you for registering with ' . config('app.name') . '!')
            ->line(__('If you did not create an account, no further action is required.'));
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
