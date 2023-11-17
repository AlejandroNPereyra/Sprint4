<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class UpdateCommandersDuelsWonLost extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    //   DB::unprepared('
    //       UPDATE commanders 
    //       SET duels_won = (SELECT COUNT(*) FROM duels WHERE duels.winner_ID = commanders.commander_ID),
    //           duels_lost = (SELECT COUNT(*) FROM duels WHERE duels.loser_ID = commanders.commander_ID);
    //   ');
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
      // There's no straightforward way to reverse this operation
  }
}