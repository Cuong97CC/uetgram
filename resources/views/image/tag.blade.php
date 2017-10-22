@extends('layouts.app')

@section('title')
	UETGram
@stop

@section('sidebar')
<div class="col-sm-2">
<div class="nav-side-menu">
    <div class="brand">Action</div> 
        <div class="menu-list">  
            <ul id="menu-content" class="menu-content collapse out">
				<li data-toggle="collapse" data-target="#search" class="collapsed active"> 
					<span class="glyphicon glyphicon-search"></span> Tìm kiếm
				</li>
                <ul class="sub-menu collapse" id="search">
					<li>
						<form>
							<input type="text" class="form-control" name="search-content" placeholder="Anything...">
						</form>
					</li>
                </ul>
				<li onClick="window.location='{{ route('album.index') }}'"> 
					<span class="glyphicon glyphicon-folder-open"></span> Thư mục gốc
				</li>
                <li onClick="window.location='{{ route('image.index') }}'"> 
					<span class="glyphicon glyphicon-picture"></span> Tất cả ảnh 
				</li>  
				<li class="disabled">
					<span class="glyphicon glyphicon-plus"></span> Album mới
                </li>  
				<li class="disabled">
					<span class="glyphicon glyphicon-cloud-upload"></span> Tải ảnh lên
                </li>
				<li onClick="window.history.back()">
					<span class="glyphicon glyphicon-chevron-left"></span> Quay lại
                </li>
            </ul>
    </div>
</div>
</div>
@stop

@section('content')
<div id="wrapper">
    <div class="col-sm-10">
        <div class="container-fluid">
            <div class="row">
                <ul class="breadcrumb">
                    <li class="active">
                        <big><strong>#{{$tag}}</strong></big>
                    </li>
                </ul>
            </div>
			<div class="row">
                @foreach ($images as $i)
                    @include('parts.image')
                @endforeach	
            </div>
		</div>
        <div class="col-md-12" style="text-align:center">
            {!! $images->render() !!}
        </div>
    </div>
</div>
@stop


