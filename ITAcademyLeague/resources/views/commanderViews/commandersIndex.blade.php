@extends('layouts.layout')

@section('title', 'Commanders Index')

@section('content')

     <br><h1 class="text-2xl font-mtg-title text-white text-center">Commanders Index (A-Z)</h1><br>

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
                              
                              <form id="deleteForm-{{ $commander->commander_ID }}" action="{{ route('delete.commander', $commander) }}" method="POST">
                                   @csrf
                                   @method('DELETE')
                                   <button type="button" class="btn btn-danger hover:text-yellow-500 transition duration-300" onclick="confirmDelete('{{ $commander->commander_name }}', '{{ $commander->commander_ID }}')">
                                       <i class="fas fa-trash"></i>
                                   </button>
                               </form>                             

                         </td>

                    </tr>

               @endforeach

          </tbody>

     </table>

     <div class="font-mtg-title text-white text-center">
          {{ $commandersIndex->links() }}
     </div>

     <script>

          function confirmDelete(commanderName, commanderID) {

              if (confirm(`Are you sure you want to delete ${commanderName}? This will also delete all associated duels.`)) {
               
                  // If the user confirms, submit the corresponding form
                  const formID = `deleteForm-${commanderID}`;
                  const form = document.getElementById(formID);
      
                  if (form) {

                      form.submit();
                  }

              }

          }

      </script>
      
@endsection