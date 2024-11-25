<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UnauthorizedAccessAlert extends Notification
{
    use Queueable;
    protected $details;


    /**
     * Create a new notification instance.
     */
    public function __construct(array $details)
    {
        $this->details = $details;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Unauthorized Access Attempt Detected')
            ->greeting('Hello DenaPax Admin,')
            ->line('An unauthorized access attempt was detected on your system.')
            ->line('Details:')
            ->line('User ID: ' . ($this->details['user_id'] ?? 'Unknown'))
            ->line('Required Role: ' . $this->details['role'])
            ->line('IP Address: ' . $this->details['ip'])
            ->line('Attempted URL: ' . $this->details['url'])
            ->line('Timestamp: ' . now()->toDateTimeString())
            ->line('Please review this incident and take necessary actions.')
            ->action('Visit Dashboard', url('/master/'))
            ->line('Thank you for keeping the system secure!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
