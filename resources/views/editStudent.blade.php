
@extends ('layouts.app')

@section ('content')



<div class="container">
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
        <div class="col-xs-12">
            <form action="{{ route('club.student.update', [ 'student'=> $student ,'club'=> $club]) }}" method="post">
                <legend>Redaguot studentą</legend>
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="form-group">
                    <input type="text" class="form-control @if ($errors->has('name')) alert-danger @endif" name="name" id="" value="{{ $student->name }}">
                </div>
               <div class="form-group">
                    <input type="text" class="form-control @if ($errors->has('surname')) alert-danger @endif" name="surname" id="" value="{{ $student->surname }}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control @if ($errors->has('school')) alert-danger @endif" name="school" id="" value="{{ $student->school }}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control @if ($errors->has('class')) alert-danger @endif" name="class" id="" value="{{ $student->class }}">
                </div>

                <button type="submit" class="btn btn-primary">Redaguoti</button>
            </form>
        </div>
    </div>

</div>


@endsection