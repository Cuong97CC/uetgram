<div class="col-sm-2">
    @if($i->user->lv == -1)
    <a href="#" data-trigger="focus" data-placement="bottom" data-toggle="popover" title="Ảnh nhỏ" data-content="Tài khoản sở hữu ảnh đang bị khóa!">
        <img id="img{{$i->id}}" class="small-img" src=""/>
        <script>
            getSrc('{{$i->id}}','{{$i->img}}');
        </script>
    </a>
    @elseif(Auth::guest())
    <a href="#" data-trigger="focus" data-placement="bottom" data-toggle="popover" title="Ảnh nhỏ" data-content="Đăng nhập để xem kích thước đầy đủ!">
        <img id="img{{$i->id}}" class="small-img" src=""/>
        <script>
            getSrc('{{$i->id}}','{{$i->img}}');
        </script>
    </a>
    @elseif(Auth::user()->lv >= 0)
    <div class="loggedin-img" id="loggedin-img{{$i->id}}" onmouseenter="imgMouseOver({{$i->id}})" onmouseleave="imgMouseOut({{$i->id}})">
    <label class="custom-control custom-checkbox top-left img-cb" id="box{{$i->id}}" style="display:none">
        <input type="checkbox" class="custom-control-input" data-idImg="{{$i->id}}" id="{{$i->id}}" value="{{$i->img}}">
        <span class="custom-control-indicator"></span>
    </label>
    <a id="link{{$i->id}}" href="javascript:void(0)" onClick="clickImg({{$k+1}})">
        <img id="img{{$i->id}}" src="{{ URL::to('/storage/upload/' . $i->img) }}"/>
    </a>
    </div>
    @else
    <a href="#" data-trigger="focus" data-placement="bottom" data-toggle="popover" title="Ảnh nhỏ" data-content="Tài khoản của bạn đang bị khóa!">
        <img id="img{{$i->id}}" class="small-img" src=""/>
        <script>
            getSrc('{{$i->id}}','{{$i->img}}');
        </script>
    </a>
    @endif
</div>
