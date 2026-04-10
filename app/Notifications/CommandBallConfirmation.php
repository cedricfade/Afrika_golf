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
            ->line('Nous vous remercions pour votre soutien à travers l\'achat de vos balles. Ce geste dépasse le simple cadre sportif : vous êtes un véritable partenaire dans l\'action d\'accompagnement des adultes autistes.')
            ->line('**Nombre de balles commandées :** ' . $this->command->nombre_de_balles)
            ->line('Rassurez-vous, nous ferons oeuvre utile et nous vous tiendrons informés de l\'avancement de nos projets grâce au rapport de nos activités.')
            ->line('Encore un grand **MERCI** pour votre solidarité !')
            ->line('Rendez-vous à **KIGALI**, les **28-29-30 octobre 2026** pour partager des expériences inédites !')
            ->salutation('Cordialement, l\'équipe Africa Art Golf Cup');
    }
}
