<?php

namespace App\Notifications;

use App\Models\WebInvitation;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InvitationConfirmation extends Notification
{
    use Queueable;

    public function __construct(
        public readonly WebInvitation $invitation
    ) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Confirmation de votre demande — Africa Art Golf Cup')
            ->greeting('Bonjour ' . $this->invitation->nomComplet . ',')
            ->line('Nous avons bien reçu votre demande d\'invitation et nous vous en remercions.')
            ->line('**Objet :** ' . $this->invitation->objet)
            ->line('**Message :**')
            ->line($this->invitation->message)
            ->line('Notre équipe vous contactera dans les plus brefs délais.')
            ->salutation('Cordialement, l\'équipe Africa Art Golf Cup');
    }
}
