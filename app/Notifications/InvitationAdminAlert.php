<?php

namespace App\Notifications;

use App\Models\WebInvitation;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InvitationAdminAlert extends Notification
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
        $p2 = $data['participant_2'] ?? null;

        $formatParticipant = function (array $p, string $label): array {
            return [
                "**{$label}**",
                '**Statut :** ' . ($p['type'] ?? ''),
                '**Civilité :** ' . ($p['civilite'] ?? ''),
                '**Nom :** ' . ($p['prenom'] ?? '') . ' ' . ($p['nom'] ?? ''),
                '**Date naissance :** ' . ($p['date_naissance'] ?? ''),
                '**Adresse :** ' . implode(', ', array_filter([$p['adresse'] ?? '', $p['ville'] ?? '', $p['code_postal'] ?? '', $p['pays'] ?? ''])),
                '**Téléphone :** ' . ($p['telephone'] ?? ''),
                '**Email :** ' . ($p['email'] ?? ''),
                '**Index :** ' . ($p['index'] ?? '') . ' | **N° licence :** ' . ($p['numero_licence'] ?? ''),
                '**Taille polo :** ' . ($p['taille_polo'] ?? ''),
                '**Session :** ' . ($p['session'] ?: 'N/A'),
            ];
        };

        $mail = (new MailMessage)
            ->subject('Nouvelle inscription Tournoi de Golf — Africa Art Golf Cup')
            ->greeting('Nouvelle inscription reçue')
            ->line('Un visiteur vient de s\'inscrire au Tournoi de Golf via le site.')
            ->line('---');

        foreach ($formatParticipant($p1, 'Participant 1') as $line) {
            $mail->line($line);
        }

        if ($p2) {
            $mail->line('---');
            foreach ($formatParticipant($p2, 'Participant 2') as $line) {
                $mail->line($line);
            }
        }

        return $mail
            ->line('---')
            ->line('**Page source :** ' . ($this->invitation->page ?? 'non renseignée'))
            ->line('**Date :** ' . ($this->invitation->created_at ? \Carbon\Carbon::createFromTimestamp($this->invitation->created_at)->format('d/m/Y à H:i') : now()->format('d/m/Y à H:i')))
            ->salutation('Africa Art Golf Cup — Système de notification automatique');
    }
}
