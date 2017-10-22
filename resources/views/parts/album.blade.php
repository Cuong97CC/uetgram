<div class="col-sm-3 text-center">
    <div class="folder">
		@if(!Auth::guest() && Auth::user()->lv==1)
		@if($a->hasUserImage())
		<button class="btn btn-sm btn-danger pull-right" data-toggle="modal" data-target="#deleteAlbumFail{{$a->id}}"><i class="fa fa-trash" aria-hidden="true"></i></button>
		@else
		<button class="btn btn-sm btn-danger pull-right" data-toggle="modal" data-target="#deleteAlbumModal{{$a->id}}"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
@include('modals.deleteAlbumModal')
@include('modals.deleteAlbumFail')

