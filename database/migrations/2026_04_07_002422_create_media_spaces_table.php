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
        Schema::create('media_spaces', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('file');
            $table->enum('type', ['Sortie de presse', 'Kit media']);

            $table->integer('created_at')->nullable();
            $table->integer('created_by')->nullable();
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
        Schema::dropIfExists('media_spaces');
    }
};
