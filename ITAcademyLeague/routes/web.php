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

Route::get('/', HomeController::class)->name('home');

Route::controller(CommanderController::class)->group(function() {

    Route::get('commanders', 'commandersIndex')->name('commanders.index');
    Route::get('commanders/createCommander', 'createCommander')->name('create.commander');
    Route::get('commanders/updateCommander', 'updateCommander')->name('update.commander');
    Route::get('commanders/{commander_ID}', 'recallCommander')->name('recall.commander');

});

Route::controller(DuelController::class)->group(function() {

    Route::get('duels', 'duelsIndex')->name('duels.index');
    Route::get('duels/createDuel', 'createDuel')->name('create.duel');
    Route::get('duels/updateDuel', 'updateDuel')->name('update.duel');
    Route::get('duels/{duel}', 'recallDuel')->name('recall.duel');

});

