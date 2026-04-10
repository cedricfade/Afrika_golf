<?php

namespace App\Notifications;

use App\Models\CommandBall;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CommandBallAdminAlert extends Notification
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
            ->subject('Nouvelle commande de balles — Africa Art Golf Cup')
            ->greeting('Nouvelle commande reçue')
            ->line('Un visiteur vient de soumettre une commande de balles via le site.')
            ->line('---')
            ->line('**Nom :** ' . $this->command->nom)
            ->line('**Prénom :** ' . $this->command->prenom)
            ->line('**Email :** ' . $this->command->email)
            ->line('**Téléphone :** ' . ($this->command->telephone ?? 'non renseigné'))
            ->line('**Nombre de balles :** ' . $this->command->nombre_de_balles)
            ->line('**Date :** ' . Carbon::createFromTimestamp($this->command->created_at)->format('d/m/Y à H:i'))
            ->salutation('Africa Art Golf Cup — Système de notification automatique');
    }
}
