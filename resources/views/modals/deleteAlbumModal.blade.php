<!-- Modal -->
<div class="modal fade" id="deleteAlbumModal{{$a->id}}" role="dialog">
	<div class="modal-dialog">
						
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Xóa Album</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
		    <div class="modal-body">
				@if(!$a->hasUserImage())
				<p>Bạn có chắc chắn xóa album <big><strong>{{$a->title}}</strong></big>?</p></br>
				@else
				<p>Album <big><strong>{{$a->title}}</strong></big> chứa ảnh của người dùng khác. <strong>BẠN CHẮC CHẮN MUỐN DÙNG QUYỀN ADMIN ĐỂ XÓA?</strong></p></br>
				@endif
			</div>
			<div class="modal-footer">
				<form method="POST" class="form-inline" action="{{ route('album.destroy',[$a->id]) }}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="_method" value="DELETE" >
					<button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xác nhận</button>
					<button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-times-circle" area-hidden="true"></i> Hủy</button>
				</form>
         	</div>
		</div>
	</div>
</div>