<?php

namespace App\Providers;

use App\Events\CommandBallSubmitted;
use App\Events\InvitationSubmitted;
use App\Events\InviteGroupSubmitted;
use App\Listeners\SendCommandBallConfirmation;
use App\Listeners\SendInvitationConfirmation;
use App\Listeners\SendInviteGroupNotification;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Enregistrement des services dans le container d'applications
    }
    /**
     * Effectuez les actions n�cessaires apr�s l'enregistrement des services.
     *
     * @return void
     */
    public function boot()
    {
        // D�finition de la longueur maximale des colonnes de type string dans la base de donn�es
        Schema::defaultStringLength(191);

        Event::listen(
            InvitationSubmitted::class,
            SendInvitationConfirmation::class,
        );

        Event::listen(
            InviteGroupSubmitted::class,
            SendInviteGroupNotification::class,
        );

        Event::listen(
            CommandBallSubmitted::class,
            SendCommandBallConfirmation::class,
        );
    }
}
