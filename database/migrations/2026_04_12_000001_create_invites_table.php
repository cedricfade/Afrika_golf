<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('invites', function (Blueprint $table) {
            $table->id();
            $table->uuid('groupe_id')->index(); // lie les participants inscrits ensemble
            $table->string('type')->nullable();           // Golfeur / Non golfeur
            $table->string('civilite')->nullable();       // Madame / Mademoiselle / Monsieur
            $table->string('nom');
            $table->string('prenom')->nullable();
            $table->date('date_naissance')->nullable();
            $table->string('adresse')->nullable();
            $table->string('pays')->nullable();
            $table->string('ville')->nullable();
            $table->string('code_postal')->nullable();
            $table->string('telephone')->nullable();
            $table->string('email');
            $table->string('index_golf')->nullable();
            $table->string('numero_licence')->nullable();
            $table->string('taille_polo')->nullable();
            $table->string('session')->nullable();
            $table->string('page')->nullable();

            $table->integer('created_at')->nullable();
            $table->boolean('deleted')->default(false);
            $table->integer('deleted_at')->nullable();
            $table->integer('deleted_by')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invites');
    }
};
