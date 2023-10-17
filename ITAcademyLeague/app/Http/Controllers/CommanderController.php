<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommanderController extends Controller
{
    public function commanderIndex () {
        return "Commanders Index";
    }

    public function createCommander () {
        return "On this webpage we can create a new commander";
    }

    public function recallCommander ($commander) {
        return "Details webpage for: $commander";
    }

    public function updateCommander () {
        return "On this webpage we can update a commander";
    }

    public function deleteCommander () {
        return "This should be a controller to delete a commander";
    }

}
