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
    @if(!Auth::guest() && Auth::user()->lv >= 0 && $images->total() == 0)
    <li><a href="#" data-toggle="modal" data-target="#newAlbumModal"><i class="fa fa-plus" aria-hidden="true"></i>Album mới</a></li>
	@endif
	@if(!Auth::guest() && Auth::user()->lv >= 0 && $subAlbums->total() == 0)
    <li><a href="#" data-toggle="modal" data-target="#addImageModal"><i class="fa fa-upload" aria-hidden="true"></i>Tải ảnh lên</a></li>
	@endif
    </ul>
</nav>	
@if(!Auth::guest() && Auth::user()->lv >= 0 && $images->total() == 0)
	@include('modals.newAlbumModal')
@endif
@if(!Auth::guest() && Auth::user()->lv >= 0 && $subAlbums->total() == 0)
	@include('modals.addImageModal')
@endif
@stop

@section('header')
<header class="page-header up">
  <div id="row row-flex">
    <div class="col-xs-12 col-md-12">
			<label class="col-xs-6 col-md-6 col-sm-6" style="font-size: 125%">
	  	<a href="{{ route('album.index') }}">Thư mục gốc</a> /
	  	@foreach($album->getPath() as $a)
			@if($a == $album)
			<big><strong>{{$a->title}}</strong></big>
			@else
			<a href="{{ route('album.show', [$a->id]) }}">{{$a->title}}</a> /
			@endif
			@endforeach
			</label>
			@include('parts.mulControl')
    </div>
  </div>
</header>
@stop

@section('content')
<section class="forms up">
  <div class="container" id="container" style="min-height: 400px">
    @if($subAlbums->total()==0 && $images->total()==0)
		<p>Không có gì để hiển thị!</p>
		@else
		@if($subAlbums->total()>0)
			<div class="row">
			@foreach($subAlbums as $a)
				@include('parts.album')
			@endforeach
			</div>
			<div class="col-md-12" style="text-align: center">
				{!! $subAlbums->links('vendor.pagination.bootstrap-4'); !!}
			</div>
		@elseif($images->total()>0)
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
	@include('modals.deleteMulModal')
</section>
@include('parts.imageDetail')
@stop

@section('script')
	@include('parts.albumScript')
	@include('parts.mulControlScript')
@stop