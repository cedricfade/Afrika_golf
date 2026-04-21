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
            ->subject('Confirmation de votre inscription — Africa Art Golf Cup 2026')
            ->greeting('Bonjour ' . ($p1['civilite'] ?? '') . ' ' . ($p1['prenom'] ?? '') . ' ' . ($p1['nom'] ?? '') . ',')
            ->line('C\'est un plaisir de compter sur votre participation à l\'Africa Art Golf Cup 2026 ! Nous avons hâte de vous retrouver à Kigali du 28 au 30 octobre.');

        foreach (range(1, 4) as $i) {
            $p = $data['participant_' . $i] ?? [];
            if (empty($p)) continue;
            $mail->line('———————————————————')
                ->line('**Participant ' . $i . ' :**')
                ->line(trim(($p['civilite'] ?? '') . ' ' . ($p['prenom'] ?? '') . ' ' . ($p['nom'] ?? '')))
                ->line('**Type :** ' . ($p['type'] ?? ''))
                ->line('**Email :** ' . ($p['email'] ?? ''));
        }

        return $mail
            ->line('———————————————————')
            ->line('Votre demande est bien reçue. Comme les places sont limitées, les inscriptions sont validées par ordre de confirmation.')
            ->line('Un membre de notre équipe vous contactera sous peu pour vous accompagner dans la suite des démarches.')
            ->salutation('Cordialement, l\'équipe Africa Art Golf Cup');
    }
}
