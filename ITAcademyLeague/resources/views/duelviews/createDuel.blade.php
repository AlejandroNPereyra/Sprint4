@extends('layouts.layout')

@section('title', 'New Duel')

@section('content')

     <h1 class="text-2xl font-mtg-title text-white text-center">Cast a new Duel</h1>

     @if(session('success'))

          <div class="bg-mtg-bg text-white text-center alert alert-success" style="background-color: red;">
               {{ session('success') }}
          </div>
     @endif

     @if(session('error'))

          <div class="bg-mtg-bg text-white text-center alert alert-danger" style="background-color: red;">
               {{ session('error') }}
          </div>

     @endif
     
@endsection