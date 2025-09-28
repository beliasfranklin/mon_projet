<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class WhatsAppNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $message;
    public $phone;

    public function __construct($message, $phone)
    {
        $this->message = $message;
        $this->phone = $phone;
    }

    public function via($notifiable)
    {
        return ['whatsapp'];
    }

    public function toWhatsApp($notifiable)
    {
        // Ici, on simule l'envoi. En production, il faut intégrer une API WhatsApp (Twilio, Chat-API, etc.)
        return [
            'phone' => $this->phone,
            'message' => $this->message,
        ];
    }

    // Optionnel : fallback mail
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('Notification WhatsApp : ' . $this->message);
    }
}
