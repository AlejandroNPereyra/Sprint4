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
            $table->unsignedInteger('mana')->default(30);
            $table->string('email')->unique();
            $table->unsignedInteger('duels_won')->default(0);
            $table->unsignedInteger('duels_lost')->default(0);
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
