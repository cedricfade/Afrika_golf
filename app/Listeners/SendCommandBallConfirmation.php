<?php

namespace App\Listeners;

use App\Events\CommandBallSubmitted;
use App\Notifications\CommandBallAdminAlert;
use App\Notifications\CommandBallConfirmation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\AnonymousNotifiable;

class SendCommandBallConfirmation implements ShouldQueue
{
    public function handle(CommandBallSubmitted $event): void
    {
        $command = $event->command;

        // 1. Accusé de réception au client
        (new AnonymousNotifiable)
            ->route('mail', $command->email)
            ->notify(new CommandBallConfirmation($command));

        // 2. Alerte à l'administrateur
        $adminEmail = config('services.invitation.admin_email');
        if ($adminEmail) {
            (new AnonymousNotifiable)
                ->route('mail', $adminEmail)
                ->notify(new CommandBallAdminAlert($command));
        }
    }
}
