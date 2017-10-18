<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Auth;
use App\Image;
use App\Comment;

class CommentsController extends Controller
{
    public function store($id) {
        $content = Input::get('content');
        $idUser = Auth::user()->id;

        Comment::create([
            'content' => $content,
            'idImg' => $id,
            'idUser' => $idUser,
        ]);
        
        return redirect()->route('image.show',$id);      
    }

    public function destroy($id,Request $request) {
            $cmt = Comment::find($id);
            $image = $cmt->image;
            if(!empty($cmt)){
                $cmt->delete();
            }
            return redirect()->route('image.show',$image->id);
    }
}
