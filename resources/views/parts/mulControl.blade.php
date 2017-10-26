@if(!Auth::guest())
<button class="btn btn-sm btn-success inline pull-right" disabled id="download-mul-bt"><i class="fa fa-download" aria-hidden="true"></i></button>
<label class="custom-control custom-checkbox inline pull-right" style="margin-top: 8px">
    <input type="checkbox" class="custom-control-input" id="checkAll">
    <span class="custom-control-indicator"></span>
    <span class="custom-control-description">Chọn tất cả</span>
</label>
<a id="hidden-link" download="" href="" style="display:none"></a>
@endif