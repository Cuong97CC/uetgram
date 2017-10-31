<div class="col-sm-3 text-center">
    <div class="folder" id="folder{{$a->id}}" onmouseenter="albumMouseOver('{{$a->id}}')" onmouseleave="albumMouseOut('{{$a->id}}')">
		@if(!Auth::guest() && Auth::user()->lv==1)
		<div id="album-ctrl{{$a->id}}" style="display:none">
		<button id="del-album-bt{{$a->id}}" class="btn btn-sm btn-danger pull-right" data-toggle="modal" data-target="#deleteAlbumModal{{$a->id}}" style="font-size: 75%"><i class="fa fa-trash" aria-hidden="true"></i></button>
		<button id="edit-album-bt{{$a->id}}" class="btn btn-sm btn-info pull-right" style="font-size: 75%" onClick="editAlbum({{$a->id}},'{{$a->title}}')"><i class="fa fa-pencil" aria-hidden="true"></i></button>
		</div>
		@endif
		<a href="{{ route('album.show',[$a->id]) }}" id="album-link{{$a->id}}">
        	<div class="folder-header">
            	<img class="folder-img-top" style="margin-top:5px" src="{{ URL::to('/img/album.png') }}" alt="#">
          	</div>
          	<div class="folder-section">
			  	<div id="album-title{{$a->id}}">
            		<h4>{{$a->title}}</h4>
				</div>
          	</div>
		</a>
    </div>   
</div>

@if(!Auth::guest() && Auth::user()->lv==1)
	@include('modals.deleteAlbumModal')
@endif

