<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Auth;
use File;
use App\Album;
use App\Image;
use App\Comment;
use App\User;

class ImagesController extends Controller
{
    public function index() {
        $images = Image::paginate(18);
        return view('image.index',compact('images'));        
    }

    public function userimg($user) {
        $user = User::where('name', '=', $user)->first();
        $images = $user->images()->paginate(18);
        return view('image.user',compact('images','user'));        
    }

    public function addimg($idAlbum,Request $request){
        $input=$request->all();
        $images=array();
        if($files = $request->file('file')){
            $title = Input::get('title');
            $content = Input::get('content');
            $idUser = Auth::user()->id;
            foreach($files as $file){
                $name = $file->getClientOriginalName();
                $img = str_random(4)."_". $name;
                while(file_exists("storage/upload/".$img)){
                    $img = str_random(4)."_". $name;
                }
                $file->move('storage/upload', $img);
                Image::create([
                    'idUser' => $idUser,
                    'img' => $img,
                    'idAlbum' => $idAlbum,
                    'title' => $title,
                    'content' => $content
                ]);
            }
            return redirect()->route('album.show',$idAlbum)->with(['type'=>'success','msg'=>"Ảnh của bạn đã được đăng thành công!"]);
        }
    }

    public function describe($id,Request $request) {
        if($request->ajax()) {
            $idImg = $request->idImg;
            $idCmt = $request->idCmt;
            $img = Image::find($idImg);
            $cmt = Comment::find($idCmt);
            $img->content = $cmt->content;
            $img->save();
            return $img->content;
        }
    }

    public function edit($id,Request $request) {
        if($request->ajax()) {
            $idImg = $request->idImg;
            $img = Image::find($idImg);
            if($request->title) {
                $img->title = $request->title;
            }
            if($request->content) {
                $img->content = $request->content;
            }
            $img->save();
            return $img->toJson();
        }
    }

    public function empty($id,Request $request) {
        if($request->ajax()) {
            $idImg = $request->idImg;
            $img = Image::find($idImg);
            if($request->val) {
                if($request->val == 'title') {
                    $img->title = null;
                }
                if($request->val == 'content') {
                    $img->content = null;
                }
            }
            $img->save();
            return $img->toJson();
        }
    }

    public function destroy($id) {
        $checkUser = true;
        foreach(Image::find(explode(',', $id)) as $image) {
            if(Auth::user()->lv != 1 && Auth::user()->id != $image->idUser) {
                $checkUser = false;
                break;
            }
        }
        if($checkUser) {
            foreach(Image::find(explode(',', $id)) as $image) {
                if(Auth::user()->lv == 1 || Auth::user()->id == $image->idUser) {
                    $image->destroyI();
                }
            }
            return redirect()->back()->with(['type'=>'danger','msg'=>"Đã xóa (những) ảnh được chọn!"]);    
        }   
        else {
            return redirect()->back()->with(['type'=>'warning','msg'=>"Bạn đang cố xóa ảnh của người khác!"]);    
        }
    }
}
