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

@if(!Auth::guest() && Auth::user()->lv==1)
  <script>
  	$("#folder{{$a->id}}").hover(function(){
        $("#album-ctrl{{$a->id}}").fadeIn();
    },function(){
        $("#album-ctrl{{$a->id}}").fadeOut();
    });

	$("#edit-album-bt{{$a->id}}").on('click', function() {
		$('#album-link{{$a->id}}').bind('click', function(e){
        	e.preventDefault();
		})
		$("#album-title{{$a->id}}").empty();
		var html=`<form class="form-inline" method="POST" action="{{route('album.edit',[$a->id])}}"  data-toggle="tooltip" data-placement="top" title="Nhấn 'Enter' để sửa. Click ra ngoài để hủy">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="_method" value="PUT" >
					<input id="edit{{$a->id}}" type="text" class="form-control inline" style="margin:5px;width:100%;text-align:center" name="title" value="{{$a->title}}" autocomplete="off">
					</form>
					`;
		$("#album-title{{$a->id}}").append(html);
		$(function () {
    		$('[data-toggle="tooltip"]').tooltip()
		});
		$("#edit{{$a->id}}").focus();
		$("#edit{{$a->id}}").focusout(function() {
			$('#album-link{{$a->id}}').unbind('click');
			$("#album-title{{$a->id}}").empty();
			var html = "<h4>{{$a->title}}</h4>"
			$("#album-title{{$a->id}}").append(html);
		});
	});
  </script>
@endif


