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
          <li class="active"><a href="{{ route('image.index') }}"><i class="fa fa-image" aria-hidden="true"></i>All Images</a></li>
          @if(!Auth::guest())
          <li><a href="#"><i class="fa fa-user-circle-o" aria-hidden="true"></i>Your Images</a></li>
          @endif
    </ul>
</nav>
@stop

@section('header')
<header class="page-header">
  <div id="row row-flex">
    <div class="col-xs-12 col-md-12">
      <strong><label class="col-xs-12 col-md-10" style="font-size: 125%">Tất cả ảnh</label></strong>
    </div>
  </div>
</header>
@stop

@section('content')
<section class="forms">
  <div class="container" id="container" style="min-height: 400px">
    @if($images->count()==0)
		<p>Nothing to display!</p>
	  @else
		<div class="row">
		@foreach($images as $i)
			@include('parts.image')
		@endforeach
		</div>
		<div class="col-md-12">
            {!! $images->links('vendor.pagination.bootstrap-4'); !!}
		</div>
	  @endif
  </div>
</section>
@stop


