<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReportingReminderNotification extends Notification
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
            ->subject('Reminder: Report Birth/Death')
            ->greeting('Dear User,')
            ->line('This is a reminder to report any recent birth or death event.')
            ->action('Report Now', url('/report'))
            ->line('Timely reporting helps us keep accurate records.');
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => 'Reminder: Please report any recent birth or death.',
            'url' => '/report'
        ];
    }
}
