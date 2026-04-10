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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('title');
            $table->text('content');

            $table->integer('ranking');

            $table->integer('created_at')->nullable();
            $table->integer('created_by')->nullable();

            $table->boolean('published')->default(false);
            $table->integer('published_at')->nullable();
            $table->integer('published_by')->nullable();

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
        Schema::dropIfExists('posts');
    }
};
