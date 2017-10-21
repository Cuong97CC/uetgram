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
          <li><a href="{{route('album.index')}}"><i class="fa fa-folder-open" aria-hidden="true"></i>Root</a></li>
          <li><a href="{{ route('image.index') }}"><i class="fa fa-image" aria-hidden="true"></i>All Images</a></li>
          @if(!Auth::guest())
          <li><a href="#"><i class="fa fa-user-circle-o" aria-hidden="true"></i>Your Images</a></li>
          @endif
          @if(!Auth::guest() && Auth::user()->lv > 0 && $images->count() == 0)
          <li><a href="#" data-toggle="modal" data-target="#newAlbumModal"><i class="fa fa-plus" aria-hidden="true"></i>New Album</a></li>
		  		@endif
          @if(!Auth::guest() && $subAlbums->count() == 0)
          <li><a href="#" data-toggle="modal" data-target="#addImageModal"><i class="fa fa-upload" aria-hidden="true"></i>Upload Image</a></li>
		  		@endif
    </ul>
</nav>	
@include('modals.newAlbumModal')
@include('modals.addImageModal')
@stop

@section('header')
<header class="page-header">
  <div id="row row-flex">
    <div class="col-xs-12 col-md-12">
      <p>
	  	<a href="{{ route('album.index') }}">Root</a> /
	  	@foreach($album->getPath() as $a)
			@if($a == $album)
			<big><strong>{{$a->title}}</strong></big>
			@else
			<a href="{{ route('album.show', [$a->id]) }}">{{$a->title}}</a> /
			@endif
			@endforeach
	  </p>
    </div>
  </div>
</header>
@stop

@section('content')
<section class="forms">
  <div class="container" id="container" style="min-height: 400px">
    @if($subAlbums->count()==0 && $images->count()==0)
		<p>Nothing to display!</p>
		@else
		@if($subAlbums->count()>0)
			<div class="row">
			@foreach($subAlbums as $a)
				@include('parts.album')
			@endforeach
			</div>
			<div class="col-md-12" style="text-align: center">
				{!! $subAlbums->links('vendor.pagination.bootstrap-4'); !!}
			</div>
		@elseif($images->count()>0)
			<div class="row">
			@foreach($images as $i)
				@include('parts.image')
			@endforeach
			</div>
			<div class="col-md-12">
				{!! $images->links('vendor.pagination.bootstrap-4'); !!}
			</div>
		@endif
		@endif
  </div>
</section>
@include('modals.imageDetailModal')
@stop
