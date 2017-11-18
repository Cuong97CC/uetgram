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
            if(!is_dir("storage/upload/".date("Y"))) {
                mkdir("storage/upload/".date("Y"));
                if(!is_dir("storage/upload/".date("Y")."/thang".date("m"))) {
                    mkdir("storage/upload/".date("Y")."/thang".date("m"));
                }
            }
            foreach($files as $file){
                $name = $file->getClientOriginalName();
                $fname = str_random(4)."_". $name;
                $img = date("Y")."/thang".date("m")."/".$fname;
                while(file_exists("storage/upload/".$img)){
                    $fname = str_random(4)."_". $name;
                    $img = date("Y")."/thang".date("m")."/".$fname;
                }
                $file->move("storage/upload/".date("Y")."/thang".date("m")."/", $fname);
                Image::create([
                    'idUser' => $idUser,
                    'img' => $img,
                    'idAlbum' => $idAlbum,
                    'title' => $title,
                    'content' => $content
                ]);
            }
            $notificationMsg = array(
                "message" => "Ảnh của bạn đã được đăng thành công!",
                "alert-type" => "success"
            );
            return back()->with($notificationMsg);  
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
            $notificationMsg = array(
                "message" => "Đã xóa (những) ảnh được chọn!",
                "alert-type" => "success"
            );
            return back()->with($notificationMsg); 
                
        }   
        else {
            $notificationMsg = array(
                "message" => "Bạn đang cố xóa ảnh của người khác!",
                "alert-type" => "warning"
            );
            return back()->with($notificationMsg); 
        }
    }
}
