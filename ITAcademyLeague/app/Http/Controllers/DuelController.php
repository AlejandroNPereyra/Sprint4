<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDuelRequest;
use App\Http\Requests\UpdateDuelRequest;
use App\Models\Duel;
use App\Models\Commander;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Providers\FantasyPlaceProvider;


class DuelController extends Controller {

    protected $primaryKey = 'duel_ID';

    public function duelsIndex() {

    $duelsIndex = Duel::select(

        'duels.*',
        'winners.commander_name AS winner_name',
        'losers.commander_name AS loser_name',

    )

    ->join('commanders AS winners', 'duels.winner_ID', '=', 'winners.commander_ID')
    ->join('commanders AS losers', 'duels.loser_ID', '=', 'losers.commander_ID')
    ->orderBy('date', 'desc')
    ->paginate(10);

    return view('duelViews.duelsIndex', compact('duelsIndex'));

    }

    public function recallduel ($duel_ID) {

        $duelData = Duel::find ($duel_ID);

        $commanderNames = DB::table('duels')

        ->select('duels.*', 'winners.commander_name AS winner_name', 'losers.commander_name AS loser_name')
        ->join('commanders AS winners', 'duels.winner_ID', '=', 'winners.commander_ID')
        ->join('commanders AS losers', 'duels.loser_ID', '=', 'losers.commander_ID')
        ->where('duels.duel_ID', $duel_ID)
        ->first();

        return view ('duelViews.recallDuel', compact('duelData', 'commanderNames'));

    }

    public function createDuel (Request $request) {

        $faker = Factory::create();
        $fantasyPlaceProvider = new FantasyPlaceProvider($faker);

        // Create an array with all fantasy places

        $fantasyPlaces = [];
        for ($i = 0; $i < 35; $i++) { // You can change the number as needed

            $fantasyPlaces[] = $fantasyPlaceProvider->fantasyPlace();

        }

        $commanders = Commander::all();

        return view ('duelViews.createDuel', compact('fantasyPlaces', 'commanders'));

    }

    public function storeDuel (CreateDuelRequest $request) {

        $newDuel = new Duel();

        $newDuel->date = $request->date;
        $newDuel->celebrated_at = $request->celebrated_at;
        $newDuel->winner_ID = $request->winner_commander;
        $newDuel->loser_ID = $request->loser_commander; 
        $newDuel->winner_mana_used = $request->winner_mana_used;
        $newDuel->loser_mana_used = $request->loser_mana_used;
        
        $newDuel->save();

        if ($newDuel) {

            $newDuel->save();
            
            return redirect()->route('duels.index')->with('success', 'Duel summoned successfully');

        }
    
        return redirect()->route('duels.index')->with('error', 'Not enough mana to summon a new Duel');

    }

    public function updateDuel (Duel $duel) {

        $faker = Factory::create();
        $fantasyPlaceProvider = new FantasyPlaceProvider($faker);

        $fantasyPlaces = [];

        for ($i = 0; $i < 35; $i++) { 
            $fantasyPlaces[] = $fantasyPlaceProvider->fantasyPlace();
        }

        $commanders = Commander::all();

        return view ('duelViews.updateDuel', compact ('duel', 'fantasyPlaces', 'commanders'));

    }

    public function storeOnUpdateDuel(Duel $duel, UpdateDuelRequest $request) {

        // Update the duel with the request data
        $duel->date = $request->date;
        $duel->celebrated_at = $request->celebrated_at;
        $duel->winner_ID = $request->winner_commander;
        $duel->loser_ID = $request->loser_commander;
        $duel->winner_mana_used = $request->winner_mana_used;
        $duel->loser_mana_used = $request->loser_mana_used;
        
        $duel->save();
    
        if ($duel) {

            return redirect()->route('duels.index')->with('success', 'Duel updated');

        }
    
        return redirect()->route('duels.index')->with('error', 'Not enough mana to update a Duel');

    }

    public function deleteDuel(Duel $duel) {

        if ($duel) {

            $duel->delete();

            return redirect()->route('duels.index')->with('success', 'Duel deleted successfully');

        }

        return redirect()->route('duels.index')->with('error', 'Duel not deleted');
    }

}