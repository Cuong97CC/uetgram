@if(!Auth::guest() && $images->total()>0)
  @foreach($images as $i)
  $("#loggedin-img{{$i->id}}").hover(function(){
          $("#{{$i->id}}").fadeIn();
      },function(){
          if(!document.getElementById("box{{$i->id}}").checked) {
              $("#{{$i->id}}").fadeOut();
          }
    });
  @endforeach
@endif

@if(Auth::guest() && $images->total()>0)
  @foreach($images as $i)
    fetch('{{ URL::to('/storage/upload/' . $i->img) }}')
    .then(res => res.blob())
    .then(blob => {
      var reader{{$i->id}} = new FileReader();
      reader{{$i->id}}.onload = function (e) {
        $('#img{{$i->id}}').attr('src', e.target.result);
      }
      reader{{$i->id}}.readAsDataURL(blob);
    });
    $("#loggedin-img{{$i->id}}").hover(function(){
        $("#{{$i->id}}").fadeIn();
    },function(){
        if(!document.getElementById("box{{$i->id}}").checked) {
            $("#{{$i->id}}").fadeOut();
        }
  });
  @endforeach
@endif
