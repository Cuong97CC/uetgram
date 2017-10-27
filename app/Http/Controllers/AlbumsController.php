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
            return redirect()->back()->with(['type'=>'danger','msg'=>'Tiêu đề này đã tồn tại. Vui lòng chọn tiêu đề khác!']);      
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
                return redirect()->route('album.index')->with(['type'=>'success','msg'=>'Thêm album thành công!']);      
            }
            else {
                return redirect()->route('album.show', [$idAlbumf])->with(['type'=>'success','msg'=>'Thêm album thành công!']);
            } 
        }
    }

    public function edit($idAlbum,Request $request) {
        $validate= Validator::make($request->all(),
        [
            'title' => 'unique:albums'
        ]);
        if($validate->fails()){
            return redirect()->back()->with(['type'=>'danger','msg'=>'Tiêu đề này đã tồn tại. Vui lòng chọn tiêu đề khác!']);      
        }
        else{
            $title = Input::get('title');
            $album = Album::find($idAlbum);
            $album->title = $title;
            $album->save();
            if($album->idAlbumf == 0) {
                return redirect()->route('album.index')->with(['type'=>'success','msg'=>'Đổi tên album thành công!']);      
            }
            else {
                return redirect()->route('album.show', [$album->idAlbumf])->with(['type'=>'success','msg'=>'TĐổi tên album thành công!']);
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
            return redirect()->route('album.index')->with(['type'=>'danger','msg'=>"Đã xóa album $title!"]); 
        }
        else {
            return redirect()->route('album.show', [$idAlbumf])->with(['type'=>'danger','msg'=>"Đã xóa album $title!"]);
        } 
    }
}
