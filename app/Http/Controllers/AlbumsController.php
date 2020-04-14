<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Album;
class AlbumsController extends Controller
{
    public function index()
    {
        $albums = Album::with('Photos')->get();
        return view('albums.index')->with('albums',$albums);
    }


    public function create()
    {
        return view('albums.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
             'cover_image' => 'image|max:1999'
        ]);
        //Get the file name with Extension
        $filenamewithExt =  $request->file('cover_image')->getClientOriginalName();

        //Get just the Filename
        $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);

        //Get extension

        $extension = $request->file('cover_image')->getClientOriginalExtension();

        //Join the name and ext

        $filenameToStore = $filename. '_'.time().'.'.$extension;

        //upload the image

        $path  = $request->file('cover_image')->storeAs('public/album_covers', $filenameToStore);

        //Create Album
        $album = new Album;


        $album->name = $request->input('name');

        $album->description = $request->input('description');

        $album->cover_image = $filenameToStore;

        $album->save();

        return redirect('/albums')->with('success','Album Created');
    }


    public function show($id){
    $album = Album::with('Photos')->find($id);
    return view('albums.show')->with('album',$album);

    }

    public function destroy($id){

      $album = Album::find($id);

        if(Storage::delete('public/album_covers/'.$album->cover_image)){
            $album->delete();
            return redirect('/')->with('success','Photo Deleted');
        }
    }
}
