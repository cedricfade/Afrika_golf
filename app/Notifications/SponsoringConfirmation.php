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
        $locale = app()->getLocale();

        if ($locale === 'en') {
            return (new MailMessage)
                ->subject('Confirmation of your sponsorship request — Africa Art Golf Cup')
                ->greeting('Hello ' . $this->sponsoring->nom_prenoms . ',')
                ->line('We have received your sponsorship request and we thank you for it.')
                ->line('**Company:** ' . $this->sponsoring->company_name)
                ->line('**Pack:** ' . ($this->sponsoring->pack_title ?? 'Not specified'))
                ->line('**Industry:** ' . $this->sponsoring->sector)
                ->line('**Country:** ' . $this->sponsoring->country)
                ->line('Our team will get back to you as soon as possible with our complete sponsorship offer.')
                ->line('See you in **KIGALI**, on **October 28-29-30, 2026** to share unique experiences!')
                ->line('To learn more about our sponsorship offers, please consult our presentation document:')
                ->action('Download the sponsorship brochure', 'https://drive.google.com/file/d/1fABsxAaLVQhUAaF9ZjQ0jJUkxwjrbntn/view')
                ->salutation('Kind regards, the Africa Art Golf Cup team');
        }

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
            ->line('Pour en savoir plus sur nos offres de sponsoring, veuillez consulter notre document de présentation :')
            ->action('Télécharger la plaquette de sponsoring', 'https://drive.google.com/file/d/1fABsxAaLVQhUAaF9ZjQ0jJUkxwjrbntn/view')
            ->salutation('Cordialement, l\'équipe Africa Art Golf Cup');
    }
}
