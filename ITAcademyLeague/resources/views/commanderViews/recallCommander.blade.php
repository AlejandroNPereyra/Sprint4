@extends('layouts.layout')

@section('title', 'Commander View')

@section('content')

     <br>
     
     <h1 class="text-2xl font-mtg-title text-white text-center">Commander: {{$commanderData->commander_name}}</h1>

     <div class="container mx-auto mt-10 p-6 bg-mtg-card rounded-lg border-mtg-border">
          <h1 class="text-2xl font-mtg-title mb-4 text-mtg-text text-center">Info and Characteristics</h1>
  
          <div class="mb-4">
              <label class="block text-mtg-text font-semibold text-center">Description</label>
              <p class="text-mtg-text text-center">{{ $commanderData->description }}</p>
          </div>
  
          <div class="mb-4">
              <label class="block text-mtg-text font-semibold text-center">Email</label>
              <p class="text-mtg-text text-center">{{ $commanderData->email }}</p>
          </div>
  
          <div class="mb-4">
              <label class="block text-mtg-text font-semibold text-center">Mana</label>
              <p class="text-mtg-text text-center">{{ $commanderData->mana }}</p>
          </div>
  
          <div class="mb-4">
              <label class="block text-mtg-text font-semibold text-center">Duels Won</label>
              <p class="text-mtg-text text-center">{{ $commanderData->duels_won }}</p>
          </div>
  
          <div class="mb-4">
              <label class="block text-mtg-text font-semibold text-center">Duels Lost</label>
              <p class="text-mtg-text text-center">{{ $commanderData->duels_lost }}</p>
          </div>

          {{-- <div class="mb-4">
               <label class="block text-mtg-text font-semibold text-center">Rank</label>
               <p class="text-mtg-text text-center">{{ $rank }}</p> <!-- Display the rank for the specific commander -->
           </div> --}}

      </div>

      <br><br>

@endsection