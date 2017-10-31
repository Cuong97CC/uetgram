<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Auth;
use App\Image;
use App\Comment;

class CommentsController extends Controller
{
    public function store($id,Request $request) {
        if($request->ajax()) {
        $idImg = $request->idImg;
        $content = $request->content;
        $idUser = Auth::user()->id;

        $comment = Comment::create([
            'content' => $content,
            'idImg' => $id,
            'idUser' => $idUser,
        ]);
        
        return $comment->id;  
        }    
    }

    public function destroy($id,Request $request) {
        if($request->ajax()) {
            $idCmt = $request->id;
            $cmt = Comment::find($idCmt);
            if(!empty($cmt)){
                $cmt->delete();
            }
            return $idCmt;
        }
    }
}
