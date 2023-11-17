<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateAdjustDuelsWonLostTrigger extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
      DB::unprepared('
          CREATE TRIGGER increment_winner_duels_won
          AFTER INSERT ON duels
          FOR EACH ROW
          BEGIN
              UPDATE commanders SET duels_won = duels_won + 1 WHERE commander_ID = NEW.winner_ID;
              UPDATE commanders SET duels_lost = duels_lost + 1 WHERE commander_ID = NEW.loser_ID;
          END;
      ');

      DB::unprepared('
          CREATE TRIGGER decrement_winner_loser_duels_won_lost
          AFTER DELETE ON duels
          FOR EACH ROW
          BEGIN
              UPDATE commanders SET duels_won = duels_won - 1 WHERE commander_ID = OLD.winner_ID;
              UPDATE commanders SET duels_lost = duels_lost - 1 WHERE commander_ID = OLD.loser_ID;
          END;
      ');

      DB::unprepared('
          CREATE TRIGGER adjust_duels_won_lost
          AFTER UPDATE ON duels
          FOR EACH ROW
          BEGIN
              UPDATE commanders SET duels_won = duels_won - 1 WHERE commander_ID = OLD.winner_ID;
              UPDATE commanders SET duels_lost = duels_lost - 1 WHERE commander_ID = OLD.loser_ID;
              UPDATE commanders SET duels_won = duels_won + 1 WHERE commander_ID = NEW.winner_ID;
              UPDATE commanders SET duels_lost = duels_lost + 1 WHERE commander_ID = NEW.loser_ID;
          END;
      ');
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
      DB::unprepared('DROP TRIGGER IF EXISTS increment_winner_duels_won');
      DB::unprepared('DROP TRIGGER IF EXISTS decrement_winner_loser_duels_won_lost');
      DB::unprepared('DROP TRIGGER IF EXISTS adjust_duels_won_lost');
  }
}