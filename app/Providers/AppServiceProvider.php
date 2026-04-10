<?php

namespace App\Providers;

use App\Events\CommandBallSubmitted;
use App\Events\InvitationSubmitted;
use App\Listeners\SendCommandBallConfirmation;
use App\Listeners\SendInvitationConfirmation;
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
     * Effectuez les actions nécessaires après l'enregistrement des services.
     *
     * @return void
     */
    public function boot()
    {
        // Définition de la longueur maximale des colonnes de type string dans la base de données
        Schema::defaultStringLength(191);
        
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