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

Route::get('commanders', [CommanderController::class, 'commanderIndex']);

Route::get('commanders/createCommander', [CommanderController::class, 'createCommander']);

Route::get('commanders/updateCommander', [CommanderController::class, 'updateCommander']);

Route::get('commanders/{commander}', [CommanderController::class, 'recallCommander']);

Route::get('duels', [DuelController::class, 'duelIndex']);

Route::get('duels/createDuel', [DuelController::class, 'createDuel']);

Route::get('duels/updateDuel', [DuelController::class, 'updateDuel']);

Route::get('duels/{duel}', [DuelController::class, 'recallDuel']);