<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;
use Validator;
use Input;
use Auth;
use File;
use App\User;

class AdminController extends Controller
{
  public function index() {
    $users = User::paginate(15);
    return view('admin.index',compact('users'));  
  }

  public function update($idUser, Request $request) {
    $user = User::find($idUser);
    $user->lv = Input::get('lv');
    $user->save();
    $notificationMsg = array(
      "message" => "Cấp quyền cho tài khoản thành công!",
      "alert-type" => "success"
    );
    return back()->with($notificationMsg);
  }

  public function openAcount($idUser, Request $request) {
    $user = User::find($idUser);
    $user->lv = 0;
    $user->save();
    $notificationMsg = array(
      "message" => "Tài khoản đã mở khóa!",
      "alert-type" => "success"
    );
    return back()->with($notificationMsg);
  }

}
