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
    public function store($idImg) {
        $content = Input::get('tag');
        $idUser = Auth::user()->id;
        $tag = Tag::where('content', '=', $content)->first();
        if(is_object($tag)) {
            foreach($tag->images as $i){
                if($i->id == $idImg){
                    return redirect()->back()->with(['type'=>'warning','msg'=>"Tag #$content is existed!"]);
                }
            }
            Tag_Image::create([
                'idTag' => $tag->id,
                'idImg' => $idImg,
            ]);
            return redirect()->route('image.show',$idImg); 
        }
        else {
            $t = Tag::create([
                'content' => $content,
            ]);
            Tag_Image::create([
                'idTag' => $t->id,
                'idImg' => $idImg,
            ]);
            return redirect()->route('image.show',$idImg);     
        }
    }

    public function findimages($tag) {
        $idUser = Auth::user()->id;
        $t = Tag::where('content', '=', $tag)->first();
        $images = $t->images()->paginate(18);
        return view('image.tag',compact('images','tag','idUser'));        
    }

    public function destroy($idImg,$idTag,Request $request) {
            $tag = Tag_Image::where('idTag', '=', $idTag, 'and', 'idImg', '=', $idImg)->first();
            if(!empty($tag)){
                $tag->destroyTI();
            }
            return redirect()->route('image.show',$idImg);
    }
}
