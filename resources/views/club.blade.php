
@extends ('layouts.app')

@section ('content')

	<div class="container">
    
<table class="table">
  <thead>
    <tr>
      <th scope="col">Pavadinimas</th>
      <th scope="col">Adresas</th>
      <th scope="col">Tipas</th>
      <th scope="col">Metai</th>
      <th scope="col">Ketvirtis</th>
      <th scope="col">Vadovas</th>
      <th scope="col">Mokiniai</th>
      <th scope="col">Pamokos</th>
    </tr>
  </thead>
  <tbody>
  	@foreach ($clubs as $club)
    <tr>
      <td>{{$club->name}}</td>
      <td>{{$club->address}}</td>
      <td>{{$club->type}}</td>
      <td>{{$club->year}}</td>
      <td>{{$club->quarter}}</td>
      <td>{{$club->user->name}}</td>
      <td><a href="{{route('club.student.index', $club->id)}}" class="btn btn-success">Į sąrašą</a></td>
      <td><a href="{{route('club.lesson.index', $club->id) }}" class="btn btn-success">Pamokos</a></td>
    </tr>
  	@endforeach
  </tbody>
</table>
</div>

@endsection