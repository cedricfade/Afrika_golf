<?php

namespace App\Listeners;

use App\Events\InvitationSubmitted;
use App\Notifications\InvitationAdminAlert;
use App\Notifications\InvitationConfirmation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\AnonymousNotifiable;

class SendInvitationConfirmation implements ShouldQueue
{
    public function handle(InvitationSubmitted $event): void
    {
        $invitation = $event->invitation;

        // 1. Accusé de réception à l'expéditeur
        (new AnonymousNotifiable)
            ->route('mail', $invitation->email)
            ->notify(new InvitationConfirmation($invitation));

        // 2. Alerte à l'administrateur
        $adminEmail = config('services.invitation.admin_email');
        if ($adminEmail) {
            (new AnonymousNotifiable)
                ->route('mail', $adminEmail)
                ->notify(new InvitationAdminAlert($invitation));
        }
    }
}
