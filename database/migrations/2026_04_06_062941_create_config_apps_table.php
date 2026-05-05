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
        Schema::create('config_apps', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->string('value');
            $table->string('page')->nullable();
            $table->enum('type', ['image', 'string', 'json'])->default('string');

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
        Schema::dropIfExists('config_apps');
    }
};
