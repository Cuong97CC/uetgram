@if(!Auth::guest() && $images && $images->total()>0)
@if(Auth::user()->lv==1)
<button class="btn btn-sm btn-danger inline pull-right" disabled id="delete-mul-bt" data-toggle="modal" data-target="#deleteMulModal"><i class="fa fa-trash" aria-hidden="true"></i></button>
@endif
<button class="btn btn-sm btn-success inline pull-right" disabled id="download-mul-bt"><i class="fa fa-download" aria-hidden="true"></i></button>
<label class="custom-control custom-checkbox inline pull-right" style="margin-top: 8px">
    <input type="checkbox" class="custom-control-input" id="checkAll">
    <span class="custom-control-indicator"></span>
    <span class="custom-control-description">Chọn tất cả</span>
</label>
<a id="hidden-link" download="" href="" style="display:none"></a>
@endif