<!-- hien thi man hinh phan quyen cho nguoi su dung -->
@extends('layouts.app')

@section('title')
	UETGram
@stop


@section('sidebar')
<nav class="side-navbar">
    @include('parts.sideHeader')
    <!-- Sidebar Navigation Menus-->
    <ul class="list-unstyled">
      @include('parts.basicSideBar')
    </ul>
</nav>
@stop

@section('header')
<header class="page-header up">
  <div id="row row-flex">
    <div class="col-sm-12">
      <strong><label style="font-size: 125%">Danh sách tài khoản</label></strong>
    </div>
  </div>
</header>
@stop
@section('content')
<section class="forms up">
  <div class="container" id="container" style="min-height: 400px">
    <table class="table table-striped" style="padding-top: 20px">
      <thead>
        <tr>
          <th>Họ tên</th>
          <th>Email</th>
          <th>Quyền</th>
          <th>Sửa</th>
        </tr>
      </thead>
      <tbody>  
        @foreach ($users as $user)
            <tr>
              <td>{{ $user->name}}</td>
              <td>{{ $user->email}}</td>
              @if ($user->lv == 0)
              <td>Người dùng thường</td>
              @elseif ($user->lv > 0)
              <td>Quản trị viên</td>
              @else
              <td>
                <a href="#" data-toggle="modal" title="Mở khóa tài khoản" data-target="#openAcountModal{{$user->id}}">
                  Tài khoản đã bị khóa
                </a>
                @include('modals.openAcount')
              </td>
              @endif
              @if ($user->lv == 0)
              <td> 
                <a href="#" data-toggle="modal" data-target="#editUserModal{{$user->id}}">
                  <i class="fa fa-edit" aria-hidden="true"></i>
                </a>
                  @include('modals.editUser') 
              </td>
              @else 
              <td></td>
              @endif
            </tr>
        @endforeach 
      </tbody>
    </table>
    <div class="col-md-12">
      {!! $users->links('vendor.pagination.bootstrap-4'); !!}
    </div>
  </div>
</section>
@stop
