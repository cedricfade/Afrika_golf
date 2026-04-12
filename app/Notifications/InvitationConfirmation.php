<?php

namespace App\Notifications;

use App\Models\WebInvitation;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InvitationConfirmation extends Notification
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
        $data = json_decode($this->invitation->message, true);
        $p1 = $data['participant_1'] ?? [];

        $mail = (new MailMessage)
            ->subject('Confirmation de votre inscription — Tournoi de Golf Africa Art Golf Cup')
            ->greeting('Bonjour ' . ($p1['civilite'] ?? '') . ' ' . ($p1['prenom'] ?? '') . ' ' . ($p1['nom'] ?? '') . ',')
            ->line('Nous avons bien reçu votre inscription au **Tournoi de Golf** et nous vous en remercions.')
            ->line('**Participant 1 :** ' . ($p1['civilite'] ?? '') . ' ' . ($p1['prenom'] ?? '') . ' ' . ($p1['nom'] ?? ''))
            ->line('**Type :** ' . ($p1['type'] ?? ''))
            ->line('**Email :** ' . ($p1['email'] ?? ''));

        if (!empty($data['participant_2'])) {
            $p2 = $data['participant_2'];
            $mail->line('---')
                ->line('**Participant 2 :** ' . ($p2['civilite'] ?? '') . ' ' . ($p2['prenom'] ?? '') . ' ' . ($p2['nom'] ?? ''))
                ->line('**Type :** ' . ($p2['type'] ?? ''))
                ->line('**Email :** ' . ($p2['email'] ?? ''));
        }

        return $mail
            ->line('Notre équipe vous contactera dans les plus brefs délais.')
            ->salutation('Cordialement, l\'équipe Africa Art Golf Cup');
    }
}
