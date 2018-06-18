
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
        <div class="col-xs-4">
            <form action="{{ route('club.lesson.update', [ 'lesson'=> $lesson ,'club'=> $club]) }}" method="post">
                <legend>Redaguot pamoką</legend>
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="form-group">
                    <input type="text" class="date form-control @if ($errors->has('date')) alert-danger @endif" name="date" id="" value="{{ $lesson->date }}">
                </div>
               

                <button type="submit" class="btn btn-primary">Redaguoti</button>
            </form>
        </div>
    </div>

</div>


@endsection