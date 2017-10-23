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
            return redirect()->route('album.show',$idAlbum)->with(['type'=>'success','msg'=>"Success to post your image(s)!"]);
        }
    }

    public function show($idImg) {
        $image = Image::find($idImg);
        $idUser = Auth::user()->id;
        $images = Image::all();
        return view('image.show',compact('image','images','idUser'));        
    }

    public function destroy($id) {
        $image = Image::find($id);
        $idAlbum = $image->idAlbum;
        $image->destroyI();

        return redirect()->route('album.show',$idAlbum)->with(['type'=>'danger','msg'=>"You've deleted one image!"]);       
    }
}
