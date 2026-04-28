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
        $locale = app()->getLocale();
        $name = $this->command->prenom . ' ' . $this->command->nom;

        if ($locale === 'en') {
            return (new MailMessage)
                ->subject('Confirmation of your ball order — Africa Art Golf Cup')
                ->greeting('Hello ' . $name . ',')
                ->line('Thank you for your support through the purchase of your balls. This gesture goes beyond sport: you are a true partner in the effort to support autistic adults.')
                ->line('**Number of balls ordered:** ' . $this->command->nombre_de_balles)
                ->line('Rest assured, we will put your contribution to good use and keep you informed of the progress of our projects through our activity reports.')
                ->line('A heartfelt **THANK YOU** for your solidarity!')
                ->line('See you in **KIGALI**, on **October 28-29-30, 2026** to share unique experiences!')
                ->salutation('Kind regards, the Africa Art Golf Cup team');
        }

        return (new MailMessage)
            ->subject('Confirmation de votre commande de balles — Africa Art Golf Cup')
            ->greeting('Bonjour ' . $name . ',')
            ->line('Nous vous remercions pour votre soutien à travers l\'achat de vos balles. Ce geste dépasse le simple cadre sportif : vous êtes un véritable partenaire dans l\'action d\'accompagnement des adultes autistes.')
            ->line('**Nombre de balles commandées :** ' . $this->command->nombre_de_balles)
            ->line('Rassurez-vous, nous ferons oeuvre utile et nous vous tiendrons informés de l\'avancement de nos projets grâce au rapport de nos activités.')
            ->line('Encore un grand **MERCI** pour votre solidarité !')
            ->line('Rendez-vous à **KIGALI**, les **28-29-30 octobre 2026** pour partager des expériences inédites !')
            ->salutation('Cordialement, l\'équipe Africa Art Golf Cup');
    }
}
