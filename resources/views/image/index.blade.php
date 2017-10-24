@extends('layouts.app')

@section('title')
	UETGram
@stop

@section('sidebar')
<nav class="side-navbar">
    @include('parts.sideHeader')
    <!-- Sidebar Navigation Menus-->
    <ul class="list-unstyled">
		  <li><a href="/"><i class="fa fa-home" aria-hidden="true"></i>Trang chủ</a></li>
          <li><a href="{{route('album.index')}}"><i class="fa fa-folder-open" aria-hidden="true"></i>Thư mục gốc</a></li>
          <li class="active"><a href="{{ route('image.index') }}"><i class="fa fa-image" aria-hidden="true"></i>Tất cả ảnh</a></li>
          @if(!Auth::guest())
          <li><a href="{{ route('image.userimg',[Auth::user()->name]) }}"><i class="fa fa-user-circle-o" aria-hidden="true"></i>Ảnh của bạn</a></li>
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

@if(Auth::guest() && $images->total()>0)
@section('script')
<script>
  @foreach($images as $i)
    fetch('{{ URL::to('/storage/upload/' . $i->img) }}')
    .then(res => res.blob())
    .then(blob => {
      var reader{{$i->id}} = new FileReader();
      reader{{$i->id}}.onload = function (e) {
        $('#img{{$i->id}}').attr('src', e.target.result);
      }
      reader{{$i->id}}.readAsDataURL(blob);
    });
  @endforeach
</script>
@stop
@endif


