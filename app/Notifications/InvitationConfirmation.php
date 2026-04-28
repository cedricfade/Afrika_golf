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
        $locale = app()->getLocale();
        $data = json_decode($this->invitation->message, true);
        $p1 = $data['participant_1'] ?? [];
        $greeting = ($p1['civilite'] ?? '') . ' ' . ($p1['prenom'] ?? '') . ' ' . ($p1['nom'] ?? '');

        if ($locale === 'en') {
            $mail = (new MailMessage)
                ->subject('Registration Confirmation — Africa Art Golf Cup 2026')
                ->greeting('Hello ' . $greeting . ',')
                ->line('We are delighted to count on your participation in the Africa Art Golf Cup 2026! We look forward to seeing you in Kigali from October 28 to 30.');

            foreach (range(1, 4) as $i) {
                $p = $data['participant_' . $i] ?? [];
                if (empty($p)) continue;
                $mail->line('———————————————————')
                    ->line('**Participant ' . $i . ':**')
                    ->line(trim(($p['civilite'] ?? '') . ' ' . ($p['prenom'] ?? '') . ' ' . ($p['nom'] ?? '')))
                    ->line('**Type:** ' . ($p['type'] ?? ''))
                    ->line('**Email:** ' . ($p['email'] ?? ''));
            }

            return $mail
                ->line('———————————————————')
                ->line('Your request has been received. As places are limited, registrations are validated in order of confirmation.')
                ->line('A member of our team will contact you shortly to guide you through the next steps.')
                ->salutation('Kind regards, the Africa Art Golf Cup team');
        }

        $mail = (new MailMessage)
            ->subject('Confirmation de votre inscription — Africa Art Golf Cup 2026')
            ->greeting('Bonjour ' . $greeting . ',')
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
