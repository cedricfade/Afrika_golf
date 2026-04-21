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
            ->subject('Confirmation de votre inscription — Africa Art Golf Cup 2026')
            ->greeting('Bonjour ' . $first->civilite . ' ' . $first->prenom . ' ' . $first->nom . ',')
            ->line('C\'est un plaisir de compter sur votre participation à l\'Africa Art Golf Cup 2026 ! Nous avons hâte de vous retrouver à Kigali du 28 au 30 octobre.');

        foreach ($this->invites as $i => $invite) {
            $mail->line('———————————————————')
                ->line('**Participant ' . ($i + 1) . ' :**')
                ->line($invite->civilite . ' ' . $invite->prenom . ' ' . $invite->nom)
                ->line('**Statut :** ' . $invite->type)
                ->line('**Email :** ' . $invite->email);
        }

        return $mail
            ->line('———————————————————')
            ->line('Votre demande est bien reçue. Comme les places sont limitées, les inscriptions sont validées par ordre de confirmation.')
            ->line('Un membre de notre équipe vous contactera sous peu pour vous accompagner dans la suite des démarches.')
            ->salutation('Cordialement, l\'équipe Africa Art Golf Cup');
    }
}
