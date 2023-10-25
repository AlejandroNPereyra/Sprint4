<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commander;

class CommanderController extends Controller {

    protected $primaryKey = 'commander_ID';

    public function commandersIndex () {

        $commandersIndex = Commander::orderBy('commander_name', 'asc')->paginate(10);

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
    
        return redirect()->route('commanders.index')->with('error', 'Not enough mana to summon a new Commander');

    }

    public function recallCommander ($commander_ID) {

        $commanderData = Commander::find ($commander_ID);

        return view ('commanderViews.recallCommander', compact('commanderData'));

    }

    public function updateCommander (Commander $commander) {

        return view ('commanderViews.updateCommander', compact('commander'));
        
    }

    public function storeOnUpdateCommander (Commander $commander, Request $request) {

        $commander->commander_name = $request->commander_name;
        $commander->description = $request->description;
        $commander->email = $request->email;

        $commander->save();

        if ($commander) {

            $commander->save();
            
            return redirect()->route('commanders.index')->with('success', 'Commander updated!');

        }
    
        return redirect()->route('commanders.index')->with('error', 'Not enough mana to update a Commander');

    }

    public function deleteCommander(Commander $commander) {

        if ($commander) {

            $commander->delete();
            
            return redirect()->route('commanders.index')->with('success', 'Commander deleted successfully');

        }

        return redirect()->route('commanders.index')->with('error', 'Commander not found');
        
    }

}