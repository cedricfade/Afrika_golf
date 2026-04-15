<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sponsoring_requests', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('nom_prenoms');
            $table->string('country');
            $table->string('email');
            $table->string('sector');
            $table->string('telephone')->nullable();
            $table->unsignedBigInteger('pack_id')->nullable();
            $table->string('pack_title')->nullable();

            $table->integer('created_at')->nullable();
            $table->boolean('deleted')->default(false);
            $table->integer('deleted_at')->nullable();
            $table->integer('deleted_by')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sponsoring_requests');
    }
};
