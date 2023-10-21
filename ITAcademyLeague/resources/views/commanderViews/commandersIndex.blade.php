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
                    <th><a href="{{ route('create.commander') }}" class="btn btn-success"><i class="fas fa-plus hover:text-yellow-500 transition duration-300"></i></a></th>
               </tr>

          </thead>

          <tbody class="bg-mtg-bg text-white text-center">

               @foreach ($commandersIndex as $commander)

                    <tr>
                         <td><a href="{{ route('recall.commander', $commander->commander_ID) }}" style="color: #007bff; transition: color 0.3s; text-decoration: none;" onmouseover="this.style.color='#ff9900'" onmouseout="this.style.color='#007bff'">{{ $commander->commander_name }}</a></td>
                         <td>{{ $commander->description }}</td>
                         <td>{{ $commander->mana }}</td>
                         <td>{{ $commander->email }}</td>
                         <td>{{ $commander->duels_won }}</td>
                         <td>{{ $commander->duels_lost }}</td>
                         <td>{{ $commander->created_at }}</td>
                         <td>{{ $commander->updated_at }}</td>
                         <td>
                              <a href="{{ route('update.commander', $commander->commander_ID) }}" class="btn btn-primary hover:text-yellow-500 transition duration-300"><i class="fas fa-edit"></i></a>
                              <a href="{{ route('create.commander', $commander->commander_ID) }}" class="btn btn-danger hover:text-yellow-500 transition duration-300"><i class="fas fa-trash"></i></a>  
                         </td>
                    </tr>

               @endforeach

          </tbody>

     </table>

     <div class="font-mtg-title text-white text-center">
          {{ $commandersIndex->links() }}
     </div>

@endsection