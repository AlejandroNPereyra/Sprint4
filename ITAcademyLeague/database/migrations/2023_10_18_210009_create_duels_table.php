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
            $table->unsignedBigInteger('winner_ID')->nullable()->default(null);
            $table->unsignedBigInteger('loser_ID')->nullable()->default(null);
            $table->integer('winner_mana_used');
            $table->integer('loser_mana_used');
            $table->timestamps();

            $table->foreign('winner_ID')->references('commander_ID')->on('Commanders')->cascadeOnDelete();
            $table->foreign('loser_ID')->references('commander_ID')->on('Commanders')->cascadeOnDelete();

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
