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
          <th>Tên</th>
          <th>Email</th>
          <th>Ảnh</th>
          <th>Trạng thái</th>
          <th>Hành động</th>
        </tr>
      </thead>
      <tbody>  
        @foreach ($users as $user)
            <tr>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td><a href="{{ route('image.userimg',[$user->name]) }}">{{ $user->images->count() }}</a></td>
              @if ($user->lv == 0)
              <td>Người dùng thường</td>
              @elseif ($user->lv > 0)
              <td>Quản trị viên</td>
              @else
              <td style="color: red">Bị khóa</td>
              @endif
              @if ($user->lv != 1)
              <td> 
                <div class="btn-group-sm" role="group" aria-label="Basic example">
                  @if ($user->lv != -1)
                  <form method="POST" class="form-group inline" action="{{ route('admin.update',[$user->id,1]) }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-info btn-sm inline">Quản trị</button>
                  </form>
                  @else
                  <button class="btn btn-info btn-sm inline disabled">Quản trị</button>
                  @endif
                  @if ($user->lv != -1)
                  <form method="POST" class="form-group inline" action="{{ route('admin.update',[$user->id,-1]) }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-danger btn-sm">Khóa</button>
                  </form>
                  @else
                  <button type="button" class="btn btn-danger disabled">Khóa</button>
                  @endif
                  @if ($user->lv == -1)
                  <form method="POST" class="form-group inline" action="{{ route('admin.update',[$user->id,0]) }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-success btn-sm">Mở khóa</button>
                  </form>
                  @else
                  <button type="button" class="btn btn-success disabled">Mở khóa</button>
                  @endif
                </div> 
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
