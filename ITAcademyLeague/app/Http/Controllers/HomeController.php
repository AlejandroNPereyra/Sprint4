<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke () {

        return "Welcome to the League Homepage, it will be good to see the Commanders Ranking table here";

    }
   
}
