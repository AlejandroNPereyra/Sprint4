@extends('layouts.layout')

@section('title', 'New Duel')

@section('content')

<div class="container mx-auto mt-10 p-6 bg-mtg-card rounded-lg border-mtg-border">
    <h1 class="text-2xl font-mtg-title mb-4 text-mtg-text">Register a new Duel</h1>

    <form method="POST" action="{{ route('store.duel') }}" class="mt-4">
        @csrf

        <div class="mb-4">
            <label for="date" class="block text-mtg-text font-semibold">Date</label>
            <input type="datetime-local" id="date" name="date" class="w-full px-4 py-2 rounded-lg bg-mtg-input border-2 border-mtg-border text-black focus:outline-none focus-border-mtg-highlight" value="{{ old('date') }}">
            <br>
            @error('date')
                <span class="font-mtg-title text-red-500 text-center"> {{ $message }} </span>
            @enderror
            <br>
        </div>

        <div class="mb-4">
            <label for="celebrated_at" class="block text-mtg-text font-semibold">Celebrated at</label>
            <select id="celebrated_at" name="celebrated_at" class="w-full px-4 py-2 rounded-lg bg-mtg-input border-2 border-mtg-border text-black focus:outline-none focus-border-mtg-highlight">
                <option value="" disabled selected>Select a place</option>
                @foreach($fantasyPlaces as $place)
                    <option value="{{ $place }}" {{ old('celebrated_at') == $place ? 'selected' : '' }}>{{ $place }}</option>
                @endforeach
            </select>
            <br>
            @error('celebrated_at') 
                <span class="font-mtg-title text-red-500 text-center"> {{ $message }} </span>
            @enderror
            <br>
        </div>

        <div class="mb-4">
            <label for="winner_commander" class="block text-mtg-text font-semibold">Winner</label>
                <select id="winner_commander" name="winner_commander" class="w-full px-4 py-2 rounded-lg bg-mtg-input border-2 border-mtg-border text-black focus:outline-none focus-border-mtg-highlight">
                <option value="" disabled selected>Select a commander</option>
            @foreach($commanders as $commander)
                <option value="{{ $commander->commander_ID }}">{{ $commander->commander_name }}</option>
            @endforeach
        </select>
                <br>
                @error('winner_commander')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
                <br>
        </div>

            <div class="mb-4">
                <label for="loser_commander" class="block text-mtg-text font-semibold">Loser</label>
        <select id="loser_commander" name="loser_commander" class="w-full px-4 py-2 rounded-lg bg-mtg-input border-2 border-mtg-border text-black focus:outline-none focus-border-mtg-highlight">
            <option value="" disabled selected>Select a commander</option>
            @foreach($commanders as $commander)
                <option value="{{ $commander->commander_ID }}">{{ $commander->commander_name }}</option>
            @endforeach
        </select>
                <br>
                @error('loser_commander')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
                <br>
            </div>

        <div class="mb-4">
            <label for="winner_mana_used" class="block text-mtg-text font-semibold">Winner's Mana Used</label>
            <input type="number" id="winner_mana_used" name="winner_mana_used" class="w-full px-4 py-2 rounded-lg bg-mtg-input border-2 border-mtg-border text-black focus:outline-none focus-border-mtg-highlight" value="{{ old('winner_mana_used') }}">
            <br>
            @error('winner_mana_used')
                <span class="font-mtg-title text-red-500 text-center"> {{ $message }} </span>
            @enderror
            <br>
        </div>

        <div class="mb-4">
            <label for="loser_mana_used" class="block text-mtg-text font-semibold">Loser's Mana Used</label>
            <input type="number" id="loser_mana_used" name="loser_mana_used" class="w-full px-4 py-2 rounded-lg bg-mtg-input border-2 border-mtg-border text-black focus:outline-none focus-border-mtg-highlight" min="0" max="1000" value="{{ old('loser_mana_used') }}">
            <br>
            @error('loser_mana_used')
                <span class="font-mtg-title text-red-500 text-center"> {{ $message }} </span>
            @enderror
            <br>
        </div>

        <input type="submit" value="Summon" class="bg-mtg-button text-mtg-button-text px-4 py-2 rounded-lg transition duration-300 transform hover:scale-105 focus:outline-none">
    </form>
</div><br><br>

<script>

    document.addEventListener("DOMContentLoaded", function () {
        
        const winnerSelect = document.getElementById("winner_commander");
        const loserSelect = document.getElementById("loser_commander");

        // Store the original options for the loser selector
        const originalLoserOptions = Array.from(loserSelect.options);

        winnerSelect.addEventListener("change", function () {
            const winnerId = winnerSelect.value;

            // Clear the loser selector
            loserSelect.innerHTML = "";

            // Add back the original options except for the selected winner
            originalLoserOptions.forEach(function (option) {

                if (option.value !== winnerId) {

                    loserSelect.appendChild(option);

                }

            });

        });

    });

</script>

@endsection