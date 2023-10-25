@extends('layouts.layout')

@section('title', 'Homepage')

@section('content')

     <h1 class="text-2xl font-mtg-title text-white text-center">Top Rated</h1>

     <table class="table">
          <thead class="bg-mtg-bg text-white text-center">
               <tr>
                    <th>Rank<i class="fas fa-crown text-yellow-500"></i></th>
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
               @foreach ($commandersRanking as $key => $commander)
                    <tr>
                         <td>{{ $key + 1 }}</td>
                         <td><a href="{{ route('recall.commander', $commander->commander_ID) }}" style="color: #007bff; transition: color 0.3s; text-decoration: none;" onmouseover="this.style.color='#ff9900'" onmouseout="this.style.color='#007bff'">{{ $commander->commander_name }}</a></td>
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

     {{-- <div class="font-mtg-title text-white text-center">
          {{ $commandersRanking->links() }}
     </div> --}}

@endsection