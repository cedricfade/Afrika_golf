<?php

namespace App\Notifications;

use App\Models\WebInvitation;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WebInvitationAdminAlert extends Notification
{
    use Queueable;

    public function __construct(
        public readonly WebInvitation $webInvitation
    ) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Nouveau message de contact — Africa Art Golf Cup')
            ->greeting('Nouveau message reçu')
            ->line('Un visiteur vient de soumettre un message via le formulaire de contact du site.')
            ->line('---')
            ->line('**Nom :** ' . $this->webInvitation->nomComplet)
            ->line('**Email :** ' . $this->webInvitation->email)
            ->line('**Objet :** ' . $this->webInvitation->objet)
            ->line('**Message :** ' . $this->webInvitation->message)
            ->line('**Page :** ' . $this->webInvitation->page)
            ->line('**Date :** ' . Carbon::createFromTimestamp($this->webInvitation->created_at)->format('d/m/Y à H:i'))
            ->salutation('Africa Art Golf Cup — Système de notification automatique');
    }
}
