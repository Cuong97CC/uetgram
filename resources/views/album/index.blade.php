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
          @if(!Auth::guest() && Auth::user()->lv > 0)
          <li><a href="#" data-toggle="modal" data-target="#newAlbumModalRoot"><i class="fa fa-plus" aria-hidden="true"></i>Album mới</a></li>
          @endif
        </ul>
    </nav>
    @if(!Auth::guest() && Auth::user()->lv > 0)
      @include('modals.newAlbumModalRoot')
    @endif
@stop

@section('header')
<header class="page-header">
  <div id="row row-flex">
    <div class="col-xs-12 col-md-12">
      <strong><label style="font-size: 125%">Thư mục gốc</label></strong>
    </div>
  </div>
</header>
@stop

@section('content')
<section class="forms">
  <div class="container" id="container" style="min-height: 400px">
    @if($albums->total()==0)
			<p>Không có gì để hiển thị!</p>
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

<<<<<<< HEAD
@section('script')
  @include('parts.albumScript')
@stop



=======
>>>>>>> e9dd449d51251a9308c80b84dc866ffc26bb49b9
