<!-- Modal -->
<div class="modal fade" id="deleteAlbumFail{{$a->id}}" role="dialog">
	<div class="modal-dialog">
						
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Delete Album</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
		    <div class="modal-body">
				<p>Album <big><strong>{{$a->title}}</strong></big> is not empty. <strong>DELETE CANCELLED!</strong></p></br>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-times-circle" area-hidden="true"></i> Cancel</button>
            </div>
		</div>
	</div>
</div>