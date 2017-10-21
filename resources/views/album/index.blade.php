@extends('layouts.app')

@section('title')
	UETGram
@stop

@section('sidebar')
<nav class="side-navbar">
      @include('parts.sideHeader')
      <!-- Sidebar Navigation Menus-->
        <ul class="list-unstyled">
          <li><a href="/"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
          <li class="active"> <a href="{{route('album.index')}}"><i class="fa fa-folder-open" aria-hidden="true"></i>Root</a></li>
          <li><a href="{{ route('image.index') }}"><i class="fa fa-image" aria-hidden="true"></i>All Images</a></li>
          @if(!Auth::guest())
          <li><a href="#"><i class="fa fa-user-circle-o" aria-hidden="true"></i>Your Images</a></li>
          @endif
          @if(!Auth::guest() && Auth::user()->lv > 0)
          <li><a href="#" data-toggle="modal" data-target="#newAlbumModalRoot"><i class="fa fa-plus" aria-hidden="true"></i>New Album</a></li>
          @endif
        </ul>
    </nav>
    @include('modals.newAlbumModalRoot')
@stop

@section('header')
<header class="page-header">
  <div id="row row-flex">
    <div class="col-xs-12 col-md-12">
      <strong><label class="col-xs-12 col-md-10" style="font-size: 125%">Root</label></strong>
    </div>
  </div>
</header>
@stop

@section('content')
<section class="forms">
  <div class="container" id="container" style="min-height: 400px">
    @if($albums->count()==0)
			<p>Nothing to display!</p>
			@else
			<div class="row">
				@foreach ($albums as $a)
					@include('parts.album')
				@endforeach
			</div>      
      <div class="col-md-12">
			  {!! $albums->links('vendor.pagination.bootstrap-4'); !!}
      </div>
			@endif
  </div>
</section>
@stop

