@extends('layouts.app')

@section('content')
<h1>{{$album->name}}</h1>

<a class="btn btn-primary"  href="/">Go back</a>

<a class="btn btn-secondary"  href="/photos/create/{{$album->id}}">Upload Photo to Album</a>

<hr>


@if (count($album->photos) > 0)
<?php
 $colcount = count($album->photos);
 $i = 0;
?>
 <div id="photos">
     <div class="row text-center">
       @foreach ($album->photos as $photo)
        @if ($i == $colcount)
        <div class="col-md-4 end">
        <div class="card" style="width: 18rem;">

        <img src="storage/album_covers/{{$album->cover_image}}" class="card-img-top" alt="{{$album->name}}">

         <div class="card-body">
         <h5 class="card-title">{{$album->name}}</h5>
         <p class="card-text">{{$album->description}}</p>
           <a href="/albums/{{$album->id}}" class="btn btn-primary">View</a>
         </div>
       </div>
     </div>

     {{-- /storage/album_covers/{{$album->cover_image}} --}}
        @else
        <div class="col-md-4 col-lg-4">
         <div class="card" style="width: 18rem;">
             <a href="/photos/{{$photo->id}}">
         <img src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" class="card-img-top" alt="{{$photo->title}}">
     </a>
          <div class="card-body">
          <h5 class="card-title">{{$photo->title}}</h5>
          <p class="card-text">{{$photo->description}}</p>
            <a href="#" class="btn btn-primary">View</a>
          </div>
        </div>
      </div>

        @endif
        @if ($i % 3 == 0)
         <div></div><div class="row text-center">
         @else
             </div>
        @endif
             <?php $i++; ?>
       @endforeach

     </div>
 </div>


@else
 <p>No albums to display</p>
@endif


{!! Form::open(['action' => ['AlbumsController@destroy',$album->id], 'method' => 'POST']) !!}

  {{Form::hidden('_method', 'DELETE')}}
  {{form::submit('Delete Photo', ['class' => 'btn btn-danger'])}}
{!! Form::close() !!}

</div>
@endsection
