<?php

namespace App\Listeners;

use App\Events\InviteGroupSubmitted;
use App\Notifications\InviteGroupAdminAlert;
use App\Notifications\InviteGroupConfirmation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\AnonymousNotifiable;

class SendInviteGroupNotification implements ShouldQueue
{
    public function handle(InviteGroupSubmitted $event): void
    {
        $invites = $event->invites;
        $first = $invites[0];

        // Accusé de réception au premier participant
        (new AnonymousNotifiable)
            ->route('mail', $first->email)
            ->notify(new InviteGroupConfirmation($invites));

        // Alerte à l'administrateur
        $adminEmail = config('services.invitation.admin_email');
        if ($adminEmail) {
            (new AnonymousNotifiable)
                ->route('mail', $adminEmail)
                ->notify(new InviteGroupAdminAlert($invites));
        }
    }
}
