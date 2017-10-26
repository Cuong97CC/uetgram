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
<header class="page-header">
  <div id="row row-flex">
    <div class="col-xs-12 col-md-12">
    <strong><label style="font-size: 125%">Ảnh của {{ $user->name }}</label></strong>
    @include('parts.mulControl')
    </div>
  </div>
</header>
@stop

@section('content')
<section class="forms">
  <div class="container" id="container" style="min-height: 400px">
    @if($images->total()==0)
		<p>Không có gì để hiển thị!</p>
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

@section('script')
  @include('parts.imageScript')
  @include('parts.downloadScript')
@stop
