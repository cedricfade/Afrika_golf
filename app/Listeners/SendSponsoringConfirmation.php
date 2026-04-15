<?php

namespace App\Listeners;

use App\Events\SponsoringSubmitted;
use App\Notifications\SponsoringAdminAlert;
use App\Notifications\SponsoringConfirmation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\AnonymousNotifiable;

class SendSponsoringConfirmation implements ShouldQueue
{
    public function handle(SponsoringSubmitted $event): void
    {
        $sponsoring = $event->sponsoring;

        // 1. Accusé de réception au demandeur
        (new AnonymousNotifiable)
            ->route('mail', $sponsoring->email)
            ->notify(new SponsoringConfirmation($sponsoring));

        // 2. Alerte à l'administrateur
        $adminEmail = config('services.invitation.admin_email');
        if ($adminEmail) {
            (new AnonymousNotifiable)
                ->route('mail', $adminEmail)
                ->notify(new SponsoringAdminAlert($sponsoring));
        }
    }
}
