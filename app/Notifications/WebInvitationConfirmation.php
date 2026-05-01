<?php

namespace App\Notifications;

use App\Models\WebInvitation;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WebInvitationConfirmation extends Notification
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
        $locale = app()->getLocale();
        $name = $this->webInvitation->nomComplet;
        $objet = $this->webInvitation->objet;

        if ($locale === 'en') {
            return (new MailMessage)
                ->subject('We received your message — Africa Art Golf Cup')
                ->greeting('Hello ' . $name . ',')
                ->line('Thank you for contacting us. We have received your message and will get back to you as soon as possible.')
                ->line('**Subject:** ' . $objet)
                ->line('See you in **KIGALI**, on **October 28-29-30, 2026** to share unique experiences!')
                ->salutation('Kind regards, the Africa Art Golf Cup team');
        }

        return (new MailMessage)
            ->subject('Nous avons bien reçu votre message — Africa Art Golf Cup')
            ->greeting('Bonjour ' . $name . ',')
            ->line('Nous vous remercions de nous avoir contactés. Votre message a bien été reçu et nous vous répondrons dans les meilleurs délais.')
            ->line('**Objet :** ' . $objet)
            ->line('Rendez-vous à **KIGALI**, les **28-29-30 octobre 2026** pour partager des expériences inédites !')
            ->salutation('Cordialement, l\'équipe Africa Art Golf Cup');
    }
}
