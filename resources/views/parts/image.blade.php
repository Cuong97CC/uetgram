<div class="col-md-2">
    @if(!Auth::guest())
    <a href="{{ route('image.show',$i->id) }}">
        <img class="small-img" alt="{{$i->title}}" src="{{ URL::to('/storage/upload/' . $i->img) }}"/>
    </a>
    @else
    <img class="small-img" alt="{{$i->title}}" src="{{ URL::to('/storage/upload/' . $i->img) }}"/>
    @endif
</div>