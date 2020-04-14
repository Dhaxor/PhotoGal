@extends('layouts.app')



@section('content')



 @if (count($albums) > 0)
   <?php
    $colcount = count($albums);
    $i = 0;
   ?>
    <div id="albums">
        <div class="row text-center">
          @foreach ($albums as $album)
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
                <a href="/albums/{{$album->id}}">
            <img src="storage/album_covers/{{$album->cover_image}}" class="card-img-top" alt="{{$album->name}}">
        </a>
             <div class="card-body">
             <h5 class="card-title">{{$album->name}}</h5>
             <p class="card-text">{{$album->description}}</p>
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
@endsection
