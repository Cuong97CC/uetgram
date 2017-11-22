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
    $admin = 0;
    $normal = 0;
    $banned = 0;
    foreach($users as $u) {
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
    return view('admin.index',compact('users','admin','normal','banned'));  
  }

  public function update($idUser,$lv, Request $request) {
    $user = User::find($idUser);
    $user->lv = $lv;
    $user->save();
    $notificationMsg = array(
      "message" => "Thay đổi quyền tài khoản thành công!",
      "alert-type" => "success"
    );
    return back()->with($notificationMsg);
  }
}
