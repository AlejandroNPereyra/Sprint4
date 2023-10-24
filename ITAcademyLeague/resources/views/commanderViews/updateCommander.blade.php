@extends('layouts.layout')

@section('title', 'Update Commander')

@section('content')

<div class="container mx-auto mt-10 p-6 bg-mtg-card rounded-lg border-mtg-border">
    <h1 class="text-2xl font-mtg-title mb-4 text-mtg-text">Update Commander Form</h1>

    <form method="POST" action="{{ route('storeOnUpdate.commander', $commander) }}" class="mt-4">

        @csrf

        @method('put')

        <style>
            
            input[type="text"], input[type="email"] {
                color: #000;
            }

        </style>

        <div class="mb-4">
            <label for="commander_name" class="block text-mtg-text font-semibold">Commander's Name</label>
            <input type="text" id="commander_name" name="commander_name" value="{{$commander->commander_name}}" class="w-full px-4 py-2 rounded-lg bg-mtg-input border-2 border-mtg-border text-mtg-text focus:outline-none focus:border-mtg-highlight" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-mtg-text font-semibold">Description</label>
            <input type="text" id="description" name="description" value="{{$commander->description}}" class="w-full px-4 py-2 rounded-lg bg-mtg-input border-2 border-mtg-border text-mtg-text focus:outline-none focus:border-mtg-highlight" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-mtg-text font-semibold">Email</label>
            <input type="email" id="email" name="email" value="{{$commander->email}}" class="w-full px-4 py-2 rounded-lg bg-mtg-input border-2 border-mtg-border text-mtg-text focus:outline-none focus:border-mtg-highlight" required>
        </div>

        <input type="submit" value="Re-Summon" class="bg-mtg-button text-mtg-button-text px-4 py-2 rounded-lg transition duration-300 transform hover:scale-105 focus:outline-none">
    </form>

</div><br><br>

@endsection