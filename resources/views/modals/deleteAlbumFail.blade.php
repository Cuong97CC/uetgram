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
				<p>Album <strong>{{$a->title}}</strong> is not empty. DELETE CANCELLED!</p></br>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
		</div>
	</div>
</div>