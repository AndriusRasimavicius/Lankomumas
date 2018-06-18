
@extends ('layouts.app')

@section ('content')


	<div class="container">
  
    <a href="{{route('club.index')}}" class="btn btn-success"><< Grizti i klubus</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Pavadinimas</th>
      <th scope="col">Data</th>
      <th scope="col">Dalyvavo</th>
      <th scope="col">Lankomumas</th>
      <th scope="col">Redagavimas</th>
    </tr>
  </thead>


  <tbody>
  	@foreach ($lessons as $lesson)
    <tr>
      <td>{{$lesson->club->name}}</td>
      <td>{{$lesson->date}}</td>
      <td>{{$lesson->students->count()}}</td>
 
      <td><a href="{{ route('attendance', $lesson->id )}}" class="btn btn-success">Lankomumas</a></td>
      <td><a href="{{ route('club.lesson.edit', [ 'lesson'=> $lesson ,'club' => $club])}}" class="btn btn-success">Redaguoti</a></td>
   
  
     
    </tr>
  	@endforeach
  </tbody>
</table>
 {{ $lessons->links() }}
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="row">
        <div class="col-xs-4">
            <form action="{{ route('club.lesson.store', $club) }}" method="post">
                <legend>Nauja pamoka</legend>
                {{ csrf_field() }}

                <div class="form-group">
                    <input type="text" class="date form-control @if ($errors->has('date')) alert-danger @endif" name="date" id="date" placeholder="Data" value="{{ Request::old('date') }}">
                </div>
                <button type="submit" class="btn btn-primary">Prideti pamoką</button>
            </form>
        </div>
    </div>



</div>


@endsection