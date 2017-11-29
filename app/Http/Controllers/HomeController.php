<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use Input;
use Auth;
use File;
use App\Comment;
use App\Image;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
      $images = Image::where('mode','=',0)->where('locked','=','0')->orderBy('created_at','DESC')->paginate(9);
      return view('home', compact('images'));
    }
}
