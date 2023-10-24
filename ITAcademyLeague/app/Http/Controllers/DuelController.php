<?php

namespace App\Http\Controllers;

use App\Models\Duel;
use Illuminate\Http\Request;

class DuelController extends Controller {

    public function duelsIndex () {

        $duelsIndex = Duel::paginate(10);

        return view ('duelViews.duelsIndex', compact('duelsIndex'));

    public function createDuel () {
        return view ('duelViews.createDuel');
    }

    public function recallDuel ($duel) {
        return view ('duelViews.recallDuel', compact('duel'));
    }

    public function updateDuel () {
        return view ('duelViews.updateDuel');
    }

    public function deleteDuel () {
        return "This should be a controller to delete a duel";
    }

}
