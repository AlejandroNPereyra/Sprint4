<?php

namespace App\Http\Controllers;

use App\Models\Duel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function createDuel () {
        return view ('duelViews.createDuel');
    }

    public function updateDuel () {
        return view ('duelViews.updateDuel');
    }

    public function deleteDuel(Duel $duel) {
        if ($duel) {

            $duel->delete();

            return redirect()->route('duels.index')->with('success', 'Duel deleted successfully');

        }

        return redirect()->route('duels.index')->with('error', 'Duel not found');
    }

}
