<?php

namespace App\Notifications;

use App\Models\SponsoringRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SponsoringConfirmation extends Notification
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
            ->subject('Confirmation de votre demande de sponsoring — Africa Art Golf Cup')
            ->greeting('Bonjour ' . $this->sponsoring->nom_prenoms . ',')
            ->line('Nous avons bien reçu votre demande de sponsoring et nous vous en remercions.')
            ->line('**Entreprise :** ' . $this->sponsoring->company_name)
            ->line('**Pack :** ' . ($this->sponsoring->pack_title ?? 'Non spécifié'))
            ->line('**Secteur d\'activité :** ' . $this->sponsoring->sector)
            ->line('**Pays :** ' . $this->sponsoring->country)
            ->line('Notre équipe reviendra vers vous dans les plus brefs délais avec notre offre de sponsoring complète.')
            ->line('Rendez-vous à **KIGALI**, les **28-29-30 octobre 2026** pour partager des expériences inédites !')
            ->salutation('Cordialement, l\'équipe Africa Art Golf Cup');
    }
}
