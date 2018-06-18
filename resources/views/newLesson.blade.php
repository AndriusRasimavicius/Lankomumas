
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
            <form action="{{ route('club.lesson.store', $club) }}" method="post">
                <legend>Nauja pamoką</legend>
                {{ csrf_field() }}

                <div class="form-group">
                    <input type="number" class="form-control @if ($errors->has('date')) alert-danger @endif" name="date" id="" placeholder="Data" value="{{ Request::old('date') }}">
                </div>

               


              

                <button type="submit" class="btn btn-primary">Prideti pamoką</button>
            </form>
        </div>
    </div>

</div>


@endsection