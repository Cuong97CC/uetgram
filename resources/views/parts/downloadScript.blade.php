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
    console.log(checked[i])
    $("#hidden-link").attr("href", "{{ URL::to('/storage/upload') }}/" + checked[i]);
    document.getElementById("hidden-link").click();
  }
})