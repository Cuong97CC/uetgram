<div class="col-md-2">
    @if(!Auth::guest())
    <a href="#" data-toggle="modal" data-target="#imageDetailModal">
        <img class="small-img" alt="{{$i->title}}" src="{{ URL::to('/storage/upload/' . $i->img) }}"/>
    </a>
    @else
    <a href="#" data-trigger="focus" data-toggle="popover" title="Small image" data-content="Please login or signup to view full size!">
        <img class="small-img" alt="{{$i->title}}" src="{{ URL::to('/storage/upload/' . $i->img) }}"/>
    </a>
    @endif
</div>