<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RegistrationConfirmationNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Registration Confirmed')
            ->greeting('Hello!')
            ->line('Your registration has been successfully completed.')
            ->action('View Certificate', url('/certificates'))
            ->line('Thank you for using our services!');
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => 'Your registration was successfully completed.',
            'url' => '/certificates'
        ];
    }
}
