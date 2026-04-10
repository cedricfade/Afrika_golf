<?php

namespace App\Providers;

use App\Events\CommandBallSubmitted;
use App\Events\InvitationSubmitted;
use App\Listeners\SendCommandBallConfirmation;
use App\Listeners\SendInvitationConfirmation;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Event::listen(
            InvitationSubmitted::class,
            SendInvitationConfirmation::class,
        );

        Event::listen(
            CommandBallSubmitted::class,
            SendCommandBallConfirmation::class,
        );
    }
}
