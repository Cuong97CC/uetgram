<div class="col-sm-2">
    @if(!Auth::guest())
    <a href="#">
        <img id="img{{$i->id}}" class="small-img" alt="{{$i->title}}" src="{{ URL::to('/storage/upload/' . $i->img) }}"/>
    </a>
    @else
    <a href="#" data-trigger="focus" data-toggle="popover" title="Small image" data-content="Please login or signup to view full size!">
        <img id="img{{$i->id}}" class="small-img" alt="{{$i->title}}" src=""/>
    </a>
    @endif
</div>