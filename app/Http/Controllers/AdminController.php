<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Input;
use Auth;
use File;
use App\User;

class AdminController extends Controller
{
  public function index() {
    $allUsers = User::all();
    $admin = 0;
    $normal = 0;
    $banned = 0;
    foreach($allUsers as $u) {
      if($u->lv == 1) {
        $admin++;
      }
      else if($u->lv == 0) {
        $normal++;
      }
      else if($u->lv == -1) {
        $banned++;
      }
    }
    $users = User::orderBy('name')->paginate(15);
    return view('admin.index',compact('allUsers','users','admin','normal','banned'));  
  }

  public function update($idUser,$lv, Request $request) {
    $user = User::find($idUser);
    if($user->lv == -1 && $lv != -1) {
      foreach($user->images as $i) {
        $i->locked = 0;
        $i->save();
      }
    }
    else if($user->lv != -1 && $lv == -1) {
      foreach($user->images as $i) {
        $i->locked = 1;
        $i->save();
      }
    }
    $user->lv = $lv;
    $user->save();
    $notificationMsg = array(
      "message" => "Thay đổi quyền tài khoản thành công!",
      "alert-type" => "success"
    );
    return back()->with($notificationMsg);
  }

  public function filter(Request $request) {
      $allUsers = User::all();
      $admin = 0;
      $normal = 0;
      $banned = 0;
      foreach($allUsers as $u) {
        if($u->lv == 1) {
          $admin++;
        }
        else if($u->lv == 0) {
          $normal++;
        }
        else if($u->lv == -1) {
          $banned++;
        }
      }
      $name = Input::get('name-search');
      $email = Input::get('email-search');
      $lv = Input::get('type-filter');
      if($lv != 99) {
        $users = User::where('name','LIKE','%'.$name.'%')->where('email','LIKE','%'.$email.'%')->where('lv','=',$lv)->orderBy('name')->paginate(15);
      }
      else {
        $users = User::where('name','LIKE','%'.$name.'%')->where('email','LIKE','%'.$email.'%')->orderBy('name')->paginate(15);
      }
      return view('admin.index',compact('allUsers','users','admin','normal','banned'));
  }
}
