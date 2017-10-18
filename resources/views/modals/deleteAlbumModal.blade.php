<!-- Modal -->
<div class="modal fade" id="deleteAlbumModal{{$a->id}}" role="dialog">
	<div class="modal-dialog">
						
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Delete Album</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
		    <div class="modal-body">
				<p>Are you sure to delete album <strong>{{$a->title}}</strong>?</p></br>
			</div>
			<div class="modal-footer">
				<form method="POST" class="form-inline" action="{{ route('album.destroy',[$a->id]) }}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="_method" value="DELETE" >
					<button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Confirm</button>
					<button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
				</form>
         	</div>
		</div>
	</div>
</div>