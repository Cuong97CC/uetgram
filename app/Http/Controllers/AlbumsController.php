<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Input;
use Auth;
use File;
use App\Album;
use App\Image;

class AlbumsController extends Controller
{
    public function index() {
        $albums = Album::where('idAlbumf', '=', 0)->paginate(8);
        return view('album.index',compact('albums'));        
    }

    public function store($idAlbumf,Request $request) {
        $validate= Validator::make($request->all(),
        [
            'title' => 'unique:albums'
        ]);
        if($validate->fails()){
            return redirect()->back()->with(['type'=>'danger','msg'=>'This title has been taken!']);      
        }
        else{
            $title = Input::get('title');
            $idUser = Auth::user()->id;
                
            Album::create([
                'title' => $title,
                'idUser'=> $idUser,
                'idAlbumf' => $idAlbumf
            ]);
            if($idAlbumf == 0) {
                return redirect()->route('album.index')->with(['type'=>'success','msg'=>'Success to add new album!']);      
            }
            else {
                return redirect()->route('album.show', [$idAlbumf])->with(['type'=>'success','msg'=>'Success to add new album!']);
            } 
        }
    }

    public function show($idAlbum) {
        $album = Album::find($idAlbum);
        $subAlbums = $album->albums()->paginate(8);
        $images = $album->images()->paginate(18);
        return view('album.show',compact(['album','subAlbums','images']));    
    }

    public function destroy($idAlbum,Request $request) {
        $album = Album::find($idAlbum);
        $title = $album->title;
        $idAlbumf = $album->idAlbumf;
        if(!empty($album)){
            $album->destroyA();
        }
        if($idAlbumf == 0) {
            return redirect()->route('album.index')->with(['type'=>'danger','msg'=>"Deleted album $title!"]); 
        }
        else {
            return redirect()->route('album.show', [$idAlbumf])->with(['type'=>'danger','msg'=>"Deleted album $title!"]);
        } 
    }
}
