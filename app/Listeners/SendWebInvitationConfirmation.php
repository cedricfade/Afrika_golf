<?php

namespace App\Listeners;

use App\Events\WebInvitationSubmitted;
use App\Notifications\WebInvitationAdminAlert;
use App\Notifications\WebInvitationConfirmation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\AnonymousNotifiable;

class SendWebInvitationConfirmation implements ShouldQueue
{
    public function handle(WebInvitationSubmitted $event): void
    {
        $webInvitation = $event->webInvitation;

        // 1. Accusé de réception au visiteur
        (new AnonymousNotifiable)
            ->route('mail', $webInvitation->email)
            ->notify(new WebInvitationConfirmation($webInvitation));

        // 2. Alerte à l'administrateur
        $adminEmail = config('services.invitation.admin_email');
        if ($adminEmail) {
            (new AnonymousNotifiable)
                ->route('mail', $adminEmail)
                ->notify(new WebInvitationAdminAlert($webInvitation));
        }
    }
}
