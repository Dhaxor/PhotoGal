@extends('layouts.app')

@section('content')
<div class="jumbotron" style="max-width:700px; margin:30px auto;">
  <h3>Create Album</h3>
  {!! Form::open(['action' => 'AlbumsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
  {{ Form::bsText('name','', ['placeholder'=> 'Album Name'])}}
  {{ Form::bsTextArea('description','', ['placeholder'=> 'Album Description'])}}
  {{ Form::file('cover_image')}}
  {{ Form::bsSubmit('submit' ,['class' => 'btn btn-success sample'])}}

  {!! Form::close() !!}

</div>
@endsection
