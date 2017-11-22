@if(!Auth::guest() && (Auth::user()->lv==1))
<!-- Modal -->
<div class="modal fade" id="editUserModal{{$user->id}}" role="dialog">
	<div class="modal-dialog">
						
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Cấp quyền truy cập cho tài khoản</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
            <div class="modal-body">
				
				<form method="POST" class="form-group form-inline" action="{{ route('admin.update',[$user->id]) }}">
					<div class="col-md-6">
						<h5>Cấp quyền truy cập cho tài khoản</h5>
					</div>
					
					<div class="col-md-4">
						{!! Form::select('lv',
							array('1' => 'Quản trị viên', 
							'-1' => 'Khóa tài khoản'), '1' ,
							array('id' => 'lv'),
							array('multiple'), 
							array('class' => 'form-control')) 
						!!}
					</div>
				
				</div>
				<div class="modal-footer">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input name="_method" value="POST" type="hidden">
					<button type="submit" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> Xác nhận</button>
					<button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-times-circle" area-hidden="true"></i> Hủy</button>
      			</form>
			</div>
		</div>
	</div>
</div>
@endif
