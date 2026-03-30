<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Enregistrez les services de l'application.
     *
     * @return void
     */
    public function register()
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

        // Autres configurations possibles
    }
}