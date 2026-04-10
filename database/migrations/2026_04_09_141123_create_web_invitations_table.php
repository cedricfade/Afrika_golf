<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('web_invitations', function (Blueprint $table) {
            $table->id();
            $table->string('nomComplet');
            $table->string('email');
            $table->string('objet');
            $table->text('message');

            $table->string('page');

            $table->integer('created_at')->nullable();
            $table->boolean('deleted')->default(false);
            $table->integer('deleted_at')->nullable();
            $table->integer('deleted_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('web_invitations');
    }
};
