@if(!Auth::guest() && Auth::user()->lv==1 && $images && $images->total()>0)
<!-- Modal -->
<div class="modal fade" id="deleteMulModal" role="dialog">
	<div class="modal-dialog">
						
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Xóa Ảnh</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
		    <div class="modal-body">
				<p>Bạn chắc chắn muốn xóa (những) ảnh này?</p>
			</div>
			<div class="modal-footer">
                <form id="form-del-mul" method="POST" class="form-inline" action="">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="DELETE" >
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xác nhận</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-times-circle" area-hidden="true"></i> Hủy</button>
                </form>
         	</div>
		</div>
	</div>
</div>
@endif