<?php

namespace App\Http\Controllers;
use App\Models\Commander;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke () {

        $commandersRanking = Commander::select('*')
        
            ->selectRaw('(CAST(duels_won AS SIGNED) - CAST(duels_lost AS SIGNED)) AS score')
            ->orderBy('score', 'desc')
            ->paginate(10);

        return view('home', compact('commandersRanking'));

    }
   
}
