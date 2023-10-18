<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DuelController extends Controller
{
    public function duelsIndex () {
        return "Duels Index";
    }

    public function createDuel () {
        return "On this webpage we can create a new duel";
    }

    public function recallDuel ($duel) {
        return "Details webpage for duel: $duel";
    }

    public function updateDuel () {
        return "On this webpage we can update a duel";
    }

    public function deleteDuel () {
        return "This should be a controller to delete a duel";
    }

}
