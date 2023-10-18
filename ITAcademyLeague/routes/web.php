<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommanderController;
use App\Http\Controllers\DuelController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', HomeController::class);

Route::controller(CommanderController::class)->group(function() {

    Route::get('commanders', 'commandersIndex');
    Route::get('commanders/createCommander', 'createCommander');
    Route::get('commanders/updateCommander', 'updateCommander');
    Route::get('commanders/{commander}', 'recallCommander');

});

Route::controller(DuelController::class)->group(function() {

    Route::get('duels', 'duelsIndex');
    Route::get('duels/createDuel', 'createDuel');
    Route::get('duels/updateDuel', 'updateDuel');
    Route::get('duels/{duel}', 'recallDuel');

});

