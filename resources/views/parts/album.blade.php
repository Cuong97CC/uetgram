<div class="col-sm-3 text-center">
    <div class="folder" id="folder{{$a->id}}">
		@if(!Auth::guest() && Auth::user()->lv==1)
		@if($a->hasUserImage())
		<button id="del-album-bt{{$a->id}}" class="btn btn-sm btn-danger pull-right" data-toggle="modal" data-target="#deleteAlbumFail{{$a->id}}" style="display: none"><i class="fa fa-trash" aria-hidden="true"></i></button>
		@else
		<button id="del-album-bt{{$a->id}}" class="btn btn-sm btn-danger pull-right" data-toggle="modal" data-target="#deleteAlbumModal{{$a->id}}" style="display:none"><i class="fa fa-trash" aria-hidden="true"></i></button>
		@endif
		@endif
		<a href="{{ route('album.show',[$a->id]) }}">
        	<div class="folder-header">
            	<img class="folder-img-top" style="margin-top:5px" src="{{ URL::to('/img/album.png') }}" alt="#">
          	</div>
          	<div class="folder-section">
            	<h4>{{$a->title}}</h4>
          	</div>
		</a>
    </div>   
</div>

@if(!Auth::guest() && Auth::user()->lv==1)
	@if(!$a->hasUserImage())
		@include('modals.deleteAlbumModal')
	@else
		@include('modals.deleteAlbumFail')
	@endif
@endif

