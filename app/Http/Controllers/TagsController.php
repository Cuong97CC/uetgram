<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Image;
use App\Tag_Image;
use Auth;
use Input;

class TagsController extends Controller
{
    public function store($idImg,Request $request) {
        if($request->ajax()) {
        $idImage = $request->idImg;
        $content = $request->content;
        $idUser = Auth::user()->id;
        $tag = Tag::where('content', '=', $content)->first();
        if(is_object($tag)) {
            foreach($tag->images as $i){
                if($i->id == $idImg){
                    return "Existed";
                }
            }
            Tag_Image::create([
                'idUser' => $idUser,
                'idTag' => $tag->id,
                'idImg' => $idImage,
            ]);
            return $tag->toJson(); 
        }
        else {
            $t = Tag::create([
                'content' => $content,
            ]);
            Tag_Image::create([
                'idUser' => $idUser,
                'idTag' => $t->id,
                'idImg' => $idImg,
            ]);
            return $t->toJson();     
        }
    }
    }

    public function findimages($content) {
        $tag = Tag::where('content', '=', $content)->first();
        $images = null;
        if($tag) {
            $images = $tag->images()->paginate(18);
        }
        return view('image.tag',compact('images','content'));        
    }

    public function destroy($idImg,$idTag,Request $request) {
        if($request->ajax()) {
            $idI = $request->idImg;
            $idT = $request->idTag;
            $tag = Tag_Image::where('idTag', '=', $idT, 'and', 'idImg', '=', $idI)->first();
            if(!empty($tag)){
                $tag->destroyTI();
            }
            return "OK";
        }
    }
}
