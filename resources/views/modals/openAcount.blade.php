@if(!Auth::guest() && (Auth::user()->lv==1))
<!-- Modal -->
<div class="modal fade" id="openAcountModal{{$user->id}}" role="dialog">
	<div class="modal-dialog">
						
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-heade">
				<h4 class="modal-title">Mở khóa tài khoản</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
            <div class="modal-body">
				<p>Bạn muốn mở khóa cho tài khoản này?</p>
			</div>
			<div class="modal-footer">
				<form method="POST" class="form-inline" action="{{ route('admin.openAcount',[$user->id]) }}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="_method" value="POST" >
					<button type="submit" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> Mở khóa</button>
					<button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-times-circle" area-hidden="true"></i> Hủy</button>
				</form>
         	</div>
		</div>
	</div>
</div>
@endif
