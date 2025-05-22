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
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('wca_id')->nullable();
            $table->string('name')->nullable();
            $table->string('country')->nullable();
            $table->integer('numberOfCompetitions')->nullable();
            $table->integer('numberOfChampionships')->nullable();
            $table->json('rank')->nullable();
            $table->json('medals')->nullable();
            $table->json('records')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};
