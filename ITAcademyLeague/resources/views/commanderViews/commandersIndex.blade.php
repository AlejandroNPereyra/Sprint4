@extends('layouts.layout')

@section('title', 'Commanders Index')

@section('content')
     <h1 class="text-2xl font-mtg-title text-white text-center">Commanders Index</h1>
     <table class="table">
          <thead class="bg-mtg-bg text-white text-center">
               <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Mana</th>
                    <th>Email</th>
                    <th>Duels Won</th>
                    <th>Duels Lost</th>
                    <th>Created At</th>
                    <th>Updated At</th>
               </tr>
          </thead>
          <tbody class="bg-mtg-bg text-white text-center">
               @foreach ($commandersIndex as $commander)
                    <tr>
                         <td><a class="hover-link" href="{{ route('recall.commander', $commander->commander_ID) }}">{{ $commander->commander_name }}</a></td>
                         <td>{{ $commander->description }}</td>
                         <td>{{ $commander->mana }}</td>
                         <td>{{ $commander->email }}</td>
                         <td>{{ $commander->duels_won }}</td>
                         <td>{{ $commander->duels_lost }}</td>
                         <td>{{ $commander->created_at }}</td>
                         <td>{{ $commander->updated_at }}</td>
                    </tr>
               @endforeach
          </tbody>
     </table>

     <div class="font-mtg-title text-white text-center">
          {{ $commandersIndex->links() }}
     </div>
@endsection
