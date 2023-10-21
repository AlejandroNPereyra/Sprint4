<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commander;

class CommanderController extends Controller
{
    public function commandersIndex () {

        $commandersIndex = Commander::paginate(10);

        return view ('commanderViews.commandersIndex', compact('commandersIndex'));

    }

    public function createCommander () {
        return view ('commanderViews.createCommander');
    }

    public function recallCommander ($commander_ID) {

        $commander = Commander::find ($commander_ID);

        return view ('commanderViews.recallCommander', compact('commander'));

    }

    public function updateCommander () {
        return view ('commanderViews.updateCommander');
    }

    public function deleteCommander () {
        
        return "This should be a controller to delete a commander";
    }

}
