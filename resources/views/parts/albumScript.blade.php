@if(!Auth::guest() && Auth::user()->lv==1)
  @foreach($albums as $a)
  $("#folder{{$a->id}}").hover(function(){
        $("#del-album-bt{{$a->id}}").fadeIn();
    },function(){
        $("#del-album-bt{{$a->id}}").fadeOut();
    });
  @endforeach
@endif