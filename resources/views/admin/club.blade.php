
@extends ('layouts.app')

@section ('content')


	<div class="container">
    <a href="{{ route('clubs.create')}}" class="btn btn-success">Kurti naują klubą</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Pavadinimas</th>
      <th scope="col">Adresas</th>
      <th scope="col">Tipas</th>
      <th scope="col">Metai</th>
      <th scope="col">Ketvirtis</th>
      <th scope="col">Vadovas</th>
      <th scope="col">Redaguoti</th>
      <th scope="col">Ištrinti</th>
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
      <td><a href="{{route('clubs.edit', $club) }}" class="btn btn-success">Redaguoti</a></td>
      <td><a href="{{route('deleted', $club->id)}}" class="btn btn-danger">Trinti</a></td>
  
     
    </tr>
  	@endforeach
  </tbody>
</table>
 {{ $clubs->links() }}
</div>


@endsection