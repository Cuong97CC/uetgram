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
      <strong><label style="font-size: 125%">Tất cả ảnh</label></strong>
      @include('parts.mulControl')
    </div>
  </div>
</header>
@stop

@section('content')
<section class="forms up">
  <div class="container" id="container" style="min-height: 400px">
    @if($images->total()==0)
		<p>Không có gì để hiển thị!</p>
	  @else
      <div class="row">
      @foreach($images as $k=>$i)
        @include('parts.image')
      @endforeach
      </div>
      <div class="col-md-12">
            {!! $images->links('vendor.pagination.bootstrap-4'); !!}
      </div>
	  @endif
  </div>
@include('modals.deleteMulModal')
</section>
@include('parts.imageDetail')
@stop


@section('script') 
  @include('parts.mulControlScript')
@stop
