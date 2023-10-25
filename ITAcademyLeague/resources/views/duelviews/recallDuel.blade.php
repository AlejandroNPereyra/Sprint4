@extends('layouts.layout')

@section('title', 'Duel Résumé')

@section('content')

<br>

<h1 class="text-2xl font-mtg-title text-white text-center">Duel: {{ $duelData->duel_ID }}</h1>

<div class="container mx-auto mt-10 p-6 bg-mtg-card rounded-lg border-mtg-border">
    
    <h1 class="text-2xl font-mtg-title mb-4 text-mtg-text text-center">Résumé</h1>

    <div class="mb-4">
        <label class="block text-mtg-text font-semibold text-center">Date</label>
        <p class="text-mtg-text text-center">{{ $duelData->date }}</p>
    </div>

    <div class="mb-4">
        <label class="block text-mtg-text font-semibold text-center">Location</label>
        <p class="text-mtg-text text-center">{{ $duelData->celebrated_at }}</p>
    </div>

    <div class="mb-4">
        <label class="block text-green-500 font-semibold text-center">Winner</label>
        <p class="text-mtg-text text-center">{{ $commanderNames->winner_name }}</p>
    </div>

    <div class="mb-4">
        <label class="block text-red-500 font-semibold text-center">Loser</label>
        <p class="text-mtg-text text-center">{{ $commanderNames->loser_name }}</p>
    </div>

    <div class="mb-4">
        <label class="block text-mtg-text font-semibold text-center">Winner's Mana Used</label>
        <p class="text-mtg-text text-center">{{ $duelData->winner_mana_used }}</p>
    </div>

    <div class="mb-4">
        <label class="block text-mtg-text font-semibold text-center">Loser's Mana Used</label>
        <p class="text-mtg-text text-center">{{ $duelData->loser_mana_used }}</p>
    </div>

    <div class="mb-4">
        <label class="block text-mtg-text font-semibold text-center">Created At</label>
        <p class="text-mtg-text text-center">{{ $duelData->created_at }}</p>
    </div>

    <div class="mb-4">
        <label class="block text-mtg-text font-semibold text-center">Updated At</label>
        <p class="text-mtg-text text-center">{{ $duelData->updated_at }}</p>
    </div>

</div><br><br>

@endsection
