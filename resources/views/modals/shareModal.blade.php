<!-- Modal -->
<div class="modal fade" id="shareModal{{$i->id}}" role="dialog">
	<div class="modal-dialog">
						
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Chia sẻ</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
		    <div class="modal-body">
                <input type="text" class="form-control input inline" id="search{{$i->id}}" placeholder="Nhập tên..." onchange="searchUser({{$i->id}})">
                <div class="list row" id="list{{$i->id}}"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" onClick="share({{$i->id}})" id="shareto{{$i->id}}" disabled><i class="fa fa-plus" aria-hidden="true"></i> Xác nhận</button>
				<button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-times-circle" area-hidden="true"></i> Hủy</button>
            </div>
		</div>
	</div>
</div>