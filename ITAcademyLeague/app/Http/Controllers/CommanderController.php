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

    public function storeCommander (Request $request) {

        $newCommander = new Commander();

        $newCommander->commander_name = $request->commander_name;
        $newCommander->description = $request->description;
        $newCommander->email = $request->email;

        $newCommander->save();

        if ($newCommander) {

            $newCommander->save();
            
            return redirect()->route('commanders.index')->with('success', 'Commander registered successfully!');

        }
    
        return redirect()->route('commanders.index')->with('error', 'Not enough data to summon a new Commander');

    }

    public function recallCommander ($commander_ID) {

        $commander = Commander::find ($commander_ID);

        return view ('commanderViews.recallCommander', compact('commander'));

    }

    public function updateCommander () {
        return view ('commanderViews.updateCommander');
    }

    public function destroyCommander($commander_ID) {

        $commander = Commander::find($commander_ID);
    
        if ($commander) {

            $commander->delete();
            
            return redirect()->route('commanders.index')->with('success', 'Commander deleted successfully');
        }
    
        return redirect()->route('commanders.index')->with('error', 'Commander not found');

    }
    
}