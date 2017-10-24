<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use App\Image;
use App\Tag;
use App\User;

class AppController extends Controller
{
    public function search($content) {
        $users = User::where('name','LIKE','%'.$content.'%')->paginate(8);
        $albums = Album::where('title','LIKE','%'.$content.'%')->paginate(8);
        $images = Image::where('title','LIKE','%'.$content.'%')->paginate(18);
        $tags = Tag::where('content','LIKE','%'.$content.'%')->paginate(48);
        return view('search',compact(['albums','users','images','tags','content']));
    }
}
