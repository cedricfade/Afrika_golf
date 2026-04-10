<?php

namespace App\Notifications;

use App\Models\CommandBall;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CommandBallConfirmation extends Notification
{
    use Queueable;

    public function __construct(
        public readonly CommandBall $command
    ) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Confirmation de votre commande de balles — Africa Art Golf Cup')
            ->greeting('Bonjour ' . $this->command->prenom . ' ' . $this->command->nom . ',')
            ->line('Nous avons bien reçu votre commande de balles et nous vous en remercions.')
            ->line('**Nombre de balles commandées :** ' . $this->command->nombre_de_balles)
            ->line('Notre équipe traitera votre commande dans les plus brefs délais et vous contactera pour confirmer la livraison.')
            ->salutation('Cordialement, l\'équipe Africa Art Golf Cup');
    }
}
