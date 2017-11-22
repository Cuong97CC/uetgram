<!-- Modal -->
<div class="modal fade" id="newAlbumModalRoot" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->

        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Album mới</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{ route('album.store',[0]) }}" method="POST" class="form-horizontal">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <label class="form-label" for="title">Tiêu đề:</label>
                    <input class="form-control" type="text" placeholder="Tiêu đề" name="title" required oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Trường này không được để trống')">
                    </br>
                    </br>
                    <div class="form-group" style="text-align: center">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-plus" aria-hidden="true"></i> Tạo</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <i class="fa fa-times-circle" area-hidden="true"></i> Hủy</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

</div>