<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class UpdateCommandersMana extends Migration
{
 /**
  * Run the migrations.
  */
 public function up(): void
 {
    // DB::unprepared('
    //     UPDATE commanders 
    //     JOIN (
    //         SELECT winner_ID, COUNT(*) as won, loser_ID, COUNT(*) as lost
    //         FROM duels
    //         GROUP BY winner_ID, loser_ID
    //     ) as duels_counts
    //     ON commanders.commander_ID = duels_counts.winner_ID
    //     SET mana = GREATEST(10, LEAST(100, duels_counts.won - duels_counts.lost));
    // ');
 }

 /**
  * Reverse the migrations.
  */
 public function down(): void
 {
     // There's no straightforward way to reverse this operation
 }
}