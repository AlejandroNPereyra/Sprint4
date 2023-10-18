<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommanderController extends Controller
{
    public function commandersIndex () {
        return view ('commanderViews.commandersIndex');
    }

    public function createCommander () {
        return view ('commanderViews.createCommander');
    }

    public function recallCommander ($commander) {
        return view ('commanderViews.recallCommander', compact('commander'));
    }

    public function updateCommander () {
        return view ('commanderViews.updateCommander');
    }

    public function deleteCommander () {
        return "This should be a controller to delete a commander";
    }

}
