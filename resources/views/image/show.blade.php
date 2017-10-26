@extends('layouts.app')

@section('title')
    UETGram
@stop

@section('content')
<div id="wrapper">
<div class="container-fluid">
<div style="text-align:left">
    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
    @foreach($images as $i)
        @if($i->id == $image->id)
        <div class="item active">
        @else
        <div class="item">
        @endif
        @include('parts.details')
        </div>
    @endforeach
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Trước</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Sau</span>
    </a>
  </div>
</div>

	
</div>
</div>
</div>
@stop