<?php

namespace App\Notifications;

use App\Models\WebInvitation;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InvitationAdminAlert extends Notification
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
            ->subject('Nouvelle demande d\'invitation — Africa Art Golf Cup')
            ->greeting('Nouvelle demande reçue')
            ->line('Un visiteur vient de soumettre une demande d\'invitation via le site.')
            ->line('---')
            ->line('**Nom & prénoms :** ' . $this->invitation->nomComplet)
            ->line('**Email :** ' . $this->invitation->email)
            ->line('**Objet :** ' . $this->invitation->objet)
            ->line('**Message :**')
            ->line($this->invitation->message)
            ->line('**Page source :** ' . ($this->invitation->page ?? 'non renseignée'))
            ->line('**Date :** ' . ($this->invitation->created_at ? \Carbon\Carbon::createFromTimestamp($this->invitation->created_at)->format('d/m/Y à H:i') : now()->format('d/m/Y à H:i')))
            ->salutation('Africa Art Golf Cup — Système de notification automatique');
    }
}
