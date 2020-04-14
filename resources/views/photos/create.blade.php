@extends('layouts.app')

@section('content')

<div class="jumbotron" style="max-width:700px; margin:30px auto;">
    <h3>Upload Photo</h3>
    {!! Form::open(['action' => 'PhotosController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    {{ Form::bsText('title','', ['placeholder'=> 'photo title'])}}
    {{ Form::bsTextArea('description','', ['placeholder'=> 'photo Description'])}}
    {{Form::hidden('album_id',$album_id)}}
    {{ Form::file('photo')}}
    {{ Form::bsSubmit('submit' ,['class' => 'btn btn-success sample'])}}

    {!! Form::close() !!}

  </div>

@endsection
