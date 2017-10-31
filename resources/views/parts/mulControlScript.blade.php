@if(!Auth::guest() && $images && $images->total()>0)
$("#checkAll").change(function () {
    $("input:checkbox").prop('checked', $(this).prop("checked"));
    if (this.checked) {
        $("label.img-cb").fadeIn();
    } else {
        $("label.img-cb").fadeOut();
    }
});

$("input:checkbox").change(function () {
    if ($("input:checked").length>0) {
        @if(!Auth::guest() && Auth::user()->lv==1)
        document.getElementById('delete-mul-bt').disabled = false;
        @endif
        document.getElementById('download-mul-bt').disabled = false;
    } else {
        @if(!Auth::guest() && Auth::user()->lv==1)
        document.getElementById('delete-mul-bt').disabled = true;
        @endif
        document.getElementById('download-mul-bt').disabled = true;
    }
    if ($("input:checked").length == $("input:checkbox").length - 1 && $('#checkAll')[0].checked == false) {
        $('#checkAll')[0].checked = true;
    } else if ($("input:checked").length == $("input:checkbox").length - 1 && $('#checkAll')[0].checked == true) {
        $('#checkAll')[0].checked = false;
    }
    @if(Auth::user()->lv==1)
    var checked = [];
    if(document.getElementById("checkAll").checked){
        for(var i=0; i<$( "input:checked" ).length-1; i++) {
        checked[i] = $( "input:checked" )[i+1].id;
        }
    }
    else {
        for(var i=0; i<$( "input:checked" ).length; i++) {
        checked[i] = $( "input:checked" )[i].id;
        }
    }
    var ids = checked[0];
    for(var i=1; i< checked.length; i++) {
        ids += "," + checked[i];
    }
    $("#form-del-mul").attr('action', "/images/" + ids)
    @endif
});

$("#download-mul-bt").on('click',function() {
  var checked = [];
  if(document.getElementById("checkAll").checked){
    for(var i=0; i<$( "input:checked" ).length-1; i++) {
      checked[i] = $( "input:checked" )[i+1].value;
    }
  }
  else {
    for(var i=0; i<$( "input:checked" ).length; i++) {
      checked[i] = $( "input:checked" )[i].value;
    }
  }
  for(var i=0; i< checked.length; i++) {
    $("#hidden-link").attr("href", "{{ URL::to('/storage/upload') }}/" + checked[i]);
    document.getElementById("hidden-link").click();
  }
});
@endif