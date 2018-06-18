
@extends ('layouts.app')

@section ('content')

	<div class="container">
 
        <a href="{{route('club.index')}}" class="btn btn-success"><< Grizti i klubus</a>
       
<table class="table">
  <thead>
    <tr>
      <th scope="col">Vardas</th>
      <th scope="col">Pavardė</th>
      <th scope="col" style="width:50px">Nedalyvavo</th>
      <th scope="col" style="width:50px">Dalyvavo</th>
     
      
    </tr>
  </thead>
  <tbody>
    <form method="post" action="{{route('attended', $lesson->id)}}">
      {{ csrf_field() }}
  	@foreach ($lesson->students as $student)
    <?php $i=$loop->index; ?>
    <tr>
      <td>{{$student->name}}</td>
      <td>{{$student->surname}}</td>
      <td><input type="radio" name="attended[{{$student->id}}]" value="0" checked></td>
      <td><input type="radio" name="attended[{{$student->id}}]" value="1"></td>
    </tr>
  	@endforeach

  </tbody>
</table>
  <input type="submit" name="submit" value="Išsaugoti">
  </form>

</div>

@endsection