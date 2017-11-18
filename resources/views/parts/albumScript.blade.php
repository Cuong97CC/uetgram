@if(!Auth::guest())
function editAlbum(id, title) {
  $('#album-link' + id).bind('click', function (e) {
      e.preventDefault();
  })
  $("#album-title" + id).empty();
  var html = `<form class="form-inline" method="POST" action="/albums/` + id + `/edit" data-toggle="tooltip" data-placement="top" title="Nhấn 'Enter' để sửa. Click ra ngoài để hủy">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="_method" value="PUT" >
        <input id="edit` + id + `" type="text" class="form-control inline" style="margin:5px;width:100%;text-align:center" name="title" autocomplete="off" required oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Trường này không được để trống')">
        </form>
        `;
  $("#album-title" + id).append(html);
  $(function () {
      $('[data-toggle="tooltip"]').tooltip()
  });
  $("#edit" + id).val(title);
  $("#edit" + id).focus();
  $("#edit" + id).focusout(function () {
      $('#album-link' + id).unbind('click');
      $("#album-title" + id).empty();
      var html = "<h4>" + title + "</h4>";
      $("#album-title" + id).append(html);
  });
}
@endif