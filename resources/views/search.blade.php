@extends('layouts.app')

@section('title')
	UETGram
@stop

@section('sidebar')
<nav class="side-navbar">
      @include('parts.sideHeader')
      <!-- Sidebar Navidation Menus-->
        <ul class="list-unstyled">
            @include('parts.basicSideBar')
        </ul>
    </nav>
@stop

@section('header')
<header class="page-header up">
  <div id="row row-flex">
    <div class="col-xs-12 col-md-12">
      <strong><label class="col-xs-12 col-md-10" style="font-size: 125%"><big>Tìm thấy {{$albums->total() + $users->total() + $images->total() + $tags->total()}} kết quả với từ khóa <big>"{{$content}}"</big></label></strong>
    </div>
  </div>
</header>
@stop

@section('content')
<section class="forms up">
  <div class="container" id="container" style="min-height: 400px">
    <div id="searchResult" role="tablist" aria-multiselectable="true">
        <div class="card">
            <div class="card-header" role="tab" id="headingOne">
            <h5 class="mb-0 col-md-10 inline">
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
            <h5 class="mb-0 col-md-10 inline">
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
            <h5 class="mb-0 col-md-10 inline">
                <a class="collapsed" data-toggle="collapse" data-parent="#searchResult" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Nhãn: {{$tags->total()}} kết quả
                </a>
            </h5>
            </div>
            <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
            <div class="card-block">
                @if($tags->total()==0)
                <p>Không có gì để hiển thị!</p>
                @else

                @foreach ($tags as $t)
                <div class="col-sm-2 inline">
                    <a href="{{ route('tag.findimages',$t->content) }}">#{{$t->content}}</a>
                </div>
                @endforeach
  
                <div class="col-md-12">
                    {!! $tags->links('vendor.pagination.bootstrap-4'); !!}
                </div>
                @endif
            </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" role="tab" id="headingFour">
            <h5 class="mb-0 col-md-10 inline">
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
                    <div class="col-sm-12">
                    @if(!Auth::guest() && Auth::user()->lv==1 && $images->total()>0)
                    <button class="btn btn-sm btn-danger inline pull-right" disabled id="delete-mul-bt" data-toggle="modal" data-target="#deleteMulModal"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    @endif
                    @include('parts.mulControl')
                    </div>
                </div>
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
            </div>
        </div>
    </div>
  </div>
  @include('modals.deleteMulModal')
</section>
@include('parts.imageDetail')
@stop

@section('script')  
    @include('parts.albumScript')
    @include('parts.mulControlScript')
@stop