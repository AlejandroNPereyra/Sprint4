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
        Schema::create('duels', function (Blueprint $table) {

            $table->id('duel_ID');
            $table->dateTime('date');
            $table->string('celebrated_at');
            $table->unsignedBigInteger('winner_ID');
            $table->unsignedBigInteger('loser_ID');
            $table->integer('winner_mana_used');
            $table->integer('loser_mana_used');
            $table->timestamps();

            $table->foreign('winner_ID')->references('commander_ID')->on('Commanders');
            $table->foreign('loser_ID')->references('commander_ID')->on('Commanders');

            // Ensure that winner_ID and loser_ID are not the same
            $table->unique(['winner_ID', 'loser_ID']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('duels');
    }
};
