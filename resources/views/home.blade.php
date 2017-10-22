@extends('layouts.app')

@section('title')
	UETGram
@stop

@section('sidebar')
<nav class="side-navbar">
      @include('parts.sideHeader')
      <!-- Sidebar Navidation Menus-->
        <ul class="list-unstyled">
          <li class="active"> <a href="/"><i class="fa fa-home" aria-hidden="true"></i>Trang chủ</a></li>
          <li><a href="{{route('album.index')}}"><i class="fa fa-folder-open" aria-hidden="true"></i>Thư mục gốc</a></li>
          <li><a href="{{ route('image.index') }}"><i class="fa fa-image" aria-hidden="true"></i>Tất cả ảnh</a></li>
          @if(!Auth::guest())
          <li><a href="#"><i class="fa fa-user-circle-o" aria-hidden="true"></i>Ảnh của bạn</a></li>
          @endif
        </ul>
    </nav>
@stop

@section('content')
    @include('parts.welcome')
@stop

@section('script')

@stop

