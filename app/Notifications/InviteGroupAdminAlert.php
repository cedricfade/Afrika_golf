<?php

namespace App\Notifications;

use App\Models\Invite;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InviteGroupAdminAlert extends Notification
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
        $count = count($this->invites);
        $date = $first->created_at
            ? Carbon::createFromTimestamp($first->created_at)->format('d/m/Y à H:i')
            : now()->format('d/m/Y à H:i');

        $mail = (new MailMessage)
            ->subject('Nouvelle inscription Tournoi de Golf (' . $count . ' participant(s)) — Africa Art Golf Cup')
            ->greeting('Nouvelle inscription reçue')
            ->line($count . ' participant(s) viennent de s\'inscrire au Tournoi de Golf via le site.')
            ->line('**Groupe ID :** ' . $first->groupe_id)
            ->line('**Date :** ' . $date)
            ->line('**Page source :** ' . ($first->page ?? 'non renseignée'));

        foreach ($this->invites as $i => $invite) {
            $mail->line('---')
                ->line('**Participant ' . ($i + 1) . '**')
                ->line('**Statut :** ' . $invite->type)
                ->line('**Civilité :** ' . $invite->civilite)
                ->line('**Nom :** ' . $invite->prenom . ' ' . $invite->nom)
                ->line('**Date naissance :** ' . ($invite->date_naissance ?? '—'))
                ->line('**Adresse :** ' . implode(', ', array_filter([$invite->adresse, $invite->ville, $invite->code_postal, $invite->pays])))
                ->line('**Téléphone :** ' . ($invite->telephone ?? '—'))
                ->line('**Email :** ' . $invite->email)
                ->line('**Index :** ' . ($invite->index_golf ?? '—') . ' | **N° licence :** ' . ($invite->numero_licence ?? '—'))
                ->line('**Taille polo :** ' . ($invite->taille_polo ?? '—'))
                ->line('**Session :** ' . ($invite->session ?: 'N/A'));
        }

        return $mail->salutation('Africa Art Golf Cup — Système de notification automatique');
    }
}
