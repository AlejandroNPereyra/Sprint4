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
        Schema::create('commanders', function (Blueprint $table) {

            $table->id('commander_ID');
            $table->string('commander_name')->unique();
            $table->string('description');
            $table->integer('mana');
            $table->string('email')->unique();
            $table->integer('duels_won');
            $table->integer('duels_lost');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commanders');
    }
};
