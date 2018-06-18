
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
            <form action="{{ route('clubs.update', $club) }}" method="post">
                <legend>Redaguoti klubą</legend>
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="form-group">
                    <input type="text" class="form-control @if ($errors->has('name')) alert-danger @endif" name="name" id="" value="{{ $club->name }}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control @if ($errors->has('address')) alert-danger @endif" name="address" id="" value="{{ $club->address }}">
                </div>



                <div class="form-group">
                    <select class="form-control" name="type">             
                       <option value="Sporto">Sporto</option>
                       <option value="Meno">Meno</option>
                       <option value="BUP">Bendro ugdymo programa</option>
                    </select>
                </div>



                <div class="form-group">
                    <input type="number" class="form-control @if ($errors->has('year')) alert-danger @endif" name="year" id="" value="{{ $club->year }}">
                </div>
                <div class="form-group">
                    <input type="number" class="form-control @if ($errors->has('quarter')) alert-danger @endif" name="quarter" id="" value="{{ $club->quarter }}">
                </div>
                <div class="form-group">
                   <select class="form-control" name="user_id">
                    @foreach ($users as $user)
                       <option value="{{$user->id}}" @if ($club->user_id == $user->id) selected @endif>{{$user->name}}</option>
                       @endforeach
                   </select>
                </div>

                <button type="submit" class="btn btn-primary">Redaguoti klubą</button>
            </form>
        </div>
    </div>

</div>


@endsection