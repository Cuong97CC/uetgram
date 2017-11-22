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

@section('content')
    @include('parts.welcome')
@stop

@section('script')

@stop
