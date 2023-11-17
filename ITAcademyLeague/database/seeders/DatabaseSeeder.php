<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CommanderSeeder::class);
        $this->call(DuelSeeder::class);

            // Then run your triggers
            DB::transaction(function () {
                DB::unprepared('
                    UPDATE commanders 
                    SET duels_won = (SELECT COUNT(*) FROM duels WHERE duels.winner_ID = commanders.commander_ID),
                    duels_lost = (SELECT COUNT(*) FROM duels WHERE duels.loser_ID = commanders.commander_ID);
                ');
            
                DB::update('
                UPDATE commanders 
                SET mana = GREATEST(0, LEAST(100, CAST(duels_won AS SIGNED) - CAST(duels_lost AS SIGNED)));
            ');
       });

        // Add other triggers...
    }
    
}