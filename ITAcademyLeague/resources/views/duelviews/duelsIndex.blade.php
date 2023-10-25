@extends('layouts.layout')

@section('title', 'Duels Index')

<style>

     .center-table {

         margin: 0 auto;

     }

     .table th:nth-child(1), .table td:nth-child(1),
     .table th:nth-child(2), .table td:nth-child(2),
     .table th:nth-child(5), .table td:nth-child(5),
     .table th:nth-child(6), .table td:nth-child(6),
     .table th:nth-child(7), .table td:nth-child(7),
     .table th:nth-child(8), .table td:nth-child(8),
     .table th:nth-child(8), .table td:nth-child(9) {
         padding-right: 40px; /* Adjust the padding as needed */

     }

 </style>

@section('content')

     <br><h1 class="text-2xl font-mtg-title text-white text-center">Duels Index</h1><br>

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

     <table class="table center-table">

          <thead class="bg-mtg-bg text-white text-center">

               <tr>
                    <th>Duel ID</th>
                    <th>Date</th>
                    <th>Celebrated At</th>
                    <th class="text-green-500">Winner</th>  
                    <th class="text-red-500">Loser</th>
                    <th>Winner's Mana<br>used</th>
                    <th>Loser's Mana<br> used</th>
                    <th>Duel created<br>on</th>
                    <th>Duel updated<br>on</th>
                    <th><a href="{{ route('create.duel') }}" class="btn btn-success"><i class="fas fa-plus hover:text-yellow-500 transition duration-300"></i></a></th>
               </tr>

          </thead>

          <tbody class="bg-mtg-bg text-white text-center">

               @foreach ($duelsIndex as $duel)

                    <tr>
                         <td><a href="{{ route('recall.duel', $duel->duel_ID) }}" style="color: #007bff; transition: color 0.3s; text-decoration: none;" onmouseover="this.style.color='#ff9900'" onmouseout="this.style.color='#007bff'">{{ $duel->duel_ID }}</a></td>

                         <td>{{ $duel->date }}</td>
                         <td>{{ $duel->celebrated_at }}</td>
                         <td>{{ $duel->winner_name }}</td>
                         <td>{{ $duel->loser_name }}</td>
                         <td>{{ $duel->winner_mana_used }}</td>
                         <td>{{ $duel->loser_mana_used }}</td>
                         <td>{{ $duel->created_at }}</td>
                         <td>{{ $duel->updated_at }}</td>
                         <td>

                              <a href="{{ route('update.duel', $duel->duel_ID) }}" class="btn btn-primary hover:text-yellow-500 transition duration-300"><i class="fas fa-edit"></i></a>
                              
                              <form action="{{ route('delete.duel', ['duel' => $duel->duel_ID]) }}" method="POST">
                                   @csrf
                                   @method('DELETE')
                                   <br><button type="submit" class="btn btn-danger hover:text-yellow-500 transition duration-300" onclick="confirmDelete('{{ $duel->duel_ID }}')">
                                        <i class="fas fa-trash"></i>
                                   </button>
                              </form>

                         </td>
                    </tr>

               @endforeach

          </tbody>

     </table>

     <div class="font-mtg-title text-white text-center">
          {{ $duelsIndex->links() }}
     </div>

     <script>

          function confirmDelete(duelDate) {

              if (confirm(`Are you sure you want to delete the duel: ${duelDate}?`)) {

                  document.querySelector('form').submit();

              }
              
          }

      </script>

@endsection