<?php

namespace App\Notifications;

use App\Models\SponsoringRequest;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SponsoringAdminAlert extends Notification
{
    use Queueable;

    public function __construct(
        public readonly SponsoringRequest $sponsoring
    ) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Nouvelle demande de sponsoring — Africa Art Golf Cup')
            ->greeting('Nouvelle demande de sponsoring reçue')
            ->line('Un visiteur vient de soumettre une demande de sponsoring via le site.')
            ->line('---')
            ->line('**Entreprise :** ' . $this->sponsoring->company_name)
            ->line('**Nom & prénoms :** ' . $this->sponsoring->nom_prenoms)
            ->line('**Email :** ' . $this->sponsoring->email)
            ->line('**Téléphone :** ' . ($this->sponsoring->telephone ?? 'non renseigné'))
            ->line('**Pays :** ' . $this->sponsoring->country)
            ->line('**Secteur d\'activité :** ' . $this->sponsoring->sector)
            ->line('**Pack demandé :** ' . ($this->sponsoring->pack_title ?? 'Non spécifié'))
            ->line('**Date :** ' . Carbon::createFromTimestamp($this->sponsoring->created_at)->format('d/m/Y à H:i'))
            ->salutation('Africa Art Golf Cup — Système de notification automatique');
    }
}
