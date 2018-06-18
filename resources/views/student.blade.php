
@extends ('layouts.app')

@section ('content')

	<div class="container">
 
        <a href="{{route('club.index')}}" class="btn btn-success"><< Grizti i klubus</a>
       
<table class="table">
  <thead>
    <tr>
      <th scope="col">Vardas</th>
      <th scope="col">Pavarde</th>
      <th scope="col">Mokykla</th>
      <th scope="col">Klasė</th>
      <th scope="col">Redaguoti</th>
      <th scope="col">Šalinti iš sąrašo</th>
    </tr>
  </thead>
  <tbody>
  	@foreach ($club->students as $student)
    <tr>
      <td>{{$student->name}}</td>
      <td>{{$student->surname}}</td>
      <td>{{$student->school}}</td>
      <td>{{$student->class}}</td>
      <td>
        <a href="{{route('club.student.edit', [ 'student' => $student ,'club' => $club]) }}" class="btn btn-success">Redaguoti</a>
      </td>
      <td>
        <form action="{{route('pasalinti')}}" method="post">
        {{ csrf_field() }}
          <input type="hidden" name="club_id" value="{{$club->id}}">
          <input type="hidden" name="student_id" value="{{$student->id}}">     
          <button type="submit" class="btn btn-danger">Šalinti</button>
        </form>
      </td>
    </tr>
  	@endforeach
  </tbody>
</table>

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
            <form action="{{ route('club.student.store', $club) }}" method="post">
                <legend>Prideti naują mokinį</legend>
                {{ csrf_field() }}

                <div class="form-group">
                    <input type="text" class="form-control @if ($errors->has('name')) alert-danger @endif" name="name" id="" placeholder="Vardas" value="{{ Request::old('name') }}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control @if ($errors->has('surname')) alert-danger @endif" name="surname" id="" placeholder="Pavardė" value="{{ Request::old('surname') }}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control @if ($errors->has('school')) alert-danger @endif" name="school" id="" placeholder="Mokykla" value="{{ Request::old('school') }}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control @if ($errors->has('class')) alert-danger @endif" name="class" id="" placeholder="Klasė" value="{{ Request::old('Class') }}">
                </div>
                <button type="submit" class="btn btn-primary">Pridėti</button>
            </form>
</div>
<div class="col-xs-4">
             <form action="{{route('priskirti')}}" method="post">
              <legend>Priskirti mokinį iš sąrašo</legend>
        {{ csrf_field() }}
        <div class="form-group">
          <input type="hidden" name="club_id" value="{{$club->id}}">
        </div>
        <div class="form-group">
                   <select class="js-example-basic-multiple" name="student_id[]" multiple>
                    @foreach ($students as $student)
                       <option value="{{$student->id}}">{{$student->name}}{{$student->surname}}</option>
                       @endforeach
                   </select>
                </div>
       <button type="submit" class="btn btn-primary">Priskirti</button>
      </form>
</div>

    </div>
   

</div>
</div>

@endsection