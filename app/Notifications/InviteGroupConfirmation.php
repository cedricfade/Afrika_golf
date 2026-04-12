<?php

namespace App\Notifications;

use App\Models\Invite;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InviteGroupConfirmation extends Notification
{
    use Queueable;

    /**
     * @param Invite[] $invites
     */
    public function __construct(
        public readonly array $invites
    ) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $first = $this->invites[0];

        $mail = (new MailMessage)
            ->subject('Confirmation de votre inscription — Tournoi de Golf Africa Art Golf Cup')
            ->greeting('Bonjour ' . $first->civilite . ' ' . $first->prenom . ' ' . $first->nom . ',')
            ->line('Nous avons bien reçu votre inscription au **Tournoi de Golf** et nous vous en remercions.');

        foreach ($this->invites as $i => $invite) {
            $mail->line('---')
                ->line('**Participant ' . ($i + 1) . ' :** ' . $invite->civilite . ' ' . $invite->prenom . ' ' . $invite->nom)
                ->line('**Statut :** ' . $invite->type)
                ->line('**Email :** ' . $invite->email);
        }

        return $mail
            ->line('Notre équipe vous contactera dans les plus brefs délais.')
            ->salutation('Cordialement, l\'équipe Africa Art Golf Cup');
    }
}
