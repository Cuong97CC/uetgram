@extends('layouts.app')

@section('title')
	UETGram
@stop

@section('sidebar')
<nav class="side-navbar">
      @include('parts.sideHeader')
      <!-- Sidebar Navidation Menus-->
        <ul class="list-unstyled">
          <li><a href="/"><i class="fa fa-home" aria-hidden="true"></i>Trang chủ</a></li>
          <li><a href="{{route('album.index')}}"><i class="fa fa-folder-open" aria-hidden="true"></i>Thư mục gốc</a></li>
          <li><a href="{{ route('image.index') }}"><i class="fa fa-image" aria-hidden="true"></i>Tất cả ảnh</a></li>
          @if(!Auth::guest())
          <li><a href="#"><i class="fa fa-user-circle-o" aria-hidden="true"></i>Ảnh của bạn</a></li>
          @endif
        </ul>
    </nav>
@stop

@section('header')
<header class="page-header">
  <div id="row row-flex">
    <div class="col-xs-12 col-md-12">
      <strong><label class="col-xs-12 col-md-10" style="font-size: 125%"><big>{{$content}}</big>: {{$albums->total() + $users->total() + $images->total() + $tags->total()}} kết quả</label></strong>
    </div>
  </div>
</header>
@stop

@section('content')
<section class="forms">
  <div class="container" id="container" style="min-height: 400px">
    <div id="searchResult" role="tablist" aria-multiselectable="true">
        <div class="card">
            <div class="card-header" role="tab" id="headingOne">
            <h5 class="mb-0">
                <a class="collapsed" data-toggle="collapse" data-parent="#searchResult" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Albums: {{$albums->total()}} kết quả
                </a>
            </h5>
            </div>

            <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne">
            <div class="card-block">
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
            </div>
        </div>
        <div class="card">
            <div class="card-header" role="tab" id="headingTwo">
            <h5 class="mb-0">
                <a class="collapsed" data-toggle="collapse" data-parent="#searchResult" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Người dùng: {{$users->total()}} kết quả
                </a>
            </h5>
            </div>
            <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
            <div class="card-block">
                @if($users->total()==0)
                <p>Không có gì để hiển thị!</p>
                @else
                <div class="row">
                    @foreach ($users as $u)
                        @include('parts.user')
                    @endforeach
                </div>      
                <div class="col-md-12">
                    {!! $users->links('vendor.pagination.bootstrap-4'); !!}
                </div>
                @endif
            </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" role="tab" id="headingThree">
            <h5 class="mb-0">
                <a class="collapsed" data-toggle="collapse" data-parent="#searchResult" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Tags: {{$tags->total()}} kết quả
                </a>
            </h5>
            </div>
            <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
            <div class="card-block">
                @if($tags->total()==0)
                <p>Không có gì để hiển thị!</p>
                @else
                <ul style="margin-left:25px">
                @foreach ($tags as $t)
                    <li>
                        <a href="{{ route('tag.findimages',$t->content) }}">#{{$t->content}}</a>
                    </li>
                @endforeach
                </ul>   
                <div class="col-md-12">
                    {!! $tags->links('vendor.pagination.bootstrap-4'); !!}
                </div>
                @endif
            </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" role="tab" id="headingFour">
            <h5 class="mb-0">
                <a class="collapsed" data-toggle="collapse" data-parent="#searchResult" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                Tiêu đề ảnh: {{$images->total()}} kết quả
                </a>
            </h5>
            </div>
            <div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour">
            <div class="card-block">
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
            </div>
        </div>
    </div>
  </div>
</section>
@stop

@section('script')
<script>
$(document).ready(function() {
    var last=localStorage.getItem("id");
    if (last!=null) {
        //remove default collapse settings
        $("#searchResult .collapse").removeClass('show');
        //show the last visible group
        $("#"+last).collapse("show");
    }
});

$('#searchResult').on('shown.bs.collapse', function () {
    var active=$("#searchResult .show").attr('id');
    localStorage.setItem('id', active);
})

$('#searchResult').on('hidden.bs.collapse', function () {
    localStorage.removeItem('id');
})

@if(Auth::guest() && $images->total()>0)
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
@endif
</script>
@stop