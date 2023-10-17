<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return "Welcome to the League Homepage, it will be good to see the Commanders Ranking table here";
});

Route::get('commanders', function () {
    return "Commanders Index";
});

Route::get('commanders/createCommander', function () {
    return "On this webpage we can create a new commander";
});

Route::get('commanders/editCommander', function () {
    return "On this webpage we can create a new commander";
});

Route::get('commanders/{commander}', function ($commander) {
    return "Details webpage for: $commander";
});

Route::get('duels', function () {
    return "Duels Index";
});

Route::get('duels/createDuels', function () {
    return "On this webpage we can create a new duel";
});

Route::get('duels/editDuels', function () {
    return "On this webpage we can create a new duel";
});

Route::get('duels/{duel}', function ($duel) {
    return "Details webpage for: $duel";

});



