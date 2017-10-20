@extends('layouts.app')

@section('title')
	UETGram
@stop

@section('sidebar')
<nav class="side-navbar">
      @include('parts.sideHeader')
      <!-- Sidebar Navidation Menus-->
        <ul class="list-unstyled">
          <li class="active"> <a href="/"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
          <li><a href="{{route('album.index')}}"><i class="fa fa-folder-open" aria-hidden="true"></i>Root</a></li>
          <li><a href="#"><i class="fa fa-image" aria-hidden="true"></i>All Images</a></li>
          @if(!Auth::guest())
          <li><a href="#"><i class="fa fa-user-circle-o" aria-hidden="true"></i>Your Images</a></li>
          @endif
        </ul>
    </nav>
    @include('modals.newAlbumModalRoot')
@stop

@section('content')
    @include('parts.welcome')
@stop

@section('script')

@stop

