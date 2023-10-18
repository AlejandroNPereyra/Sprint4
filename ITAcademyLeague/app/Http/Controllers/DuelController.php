<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DuelController extends Controller
{
    public function duelsIndex () {
        return view ('duelViews.duelsIndex');
    }

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
