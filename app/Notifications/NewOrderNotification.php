<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewOrderNotification extends Notification
{
    use Queueable;

    private $details;

    /**
     * Create a new notification instance.
     */
    public function __construct($details)
    {

        $this->details = $details;

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

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {

        return (new MailMessage)

            ->greeting($this->details['greeting'])

            ->line($this->details['body'])

            ->action($this->details['actionText'], $this->details['actionURL'])

            ->line($this->details['thanks']);

    }

    public function toDatabase($notifiable)
    {

        return [

            'order_id' => $this->details['order_id'],

        ];

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
