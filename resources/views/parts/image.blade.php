@if($i->mode == 0 || (!Auth::guest() && ($i->user->id == Auth::user()->id || Auth::user()->lv == 1 || $i->sharedTo(Auth::user()->id))))
<div class="col-sm-2">
    @if($i->locked == 1)
        @if(!Auth::guest() && (Auth::user()->lv == 1 || $i->user->id == Auth::user()->id))
        <button id="del-bt{{$i->id}}" class="btn btn-sm btn-danger top-right" data-toggle="modal" data-target="#deleteSingleModal{{$i->id}}" style="display:none"><i class="fa fa-trash" aria-hidden="true"></i></button>
        @include('modals.deleteSingleModal')
        <a href="javascript:void(0)" data-trigger="focus" data-placement="bottom" data-toggle="popover" title="Ảnh bị khóa" data-content="Tài khoản sở hữu ảnh đang bị khóa!" onmouseenter="lockedMouseOver({{$i->id}})" onmouseleave="lockedMouseOut({{$i->id}})">
            <img id="img{{$i->id}}" class="small-img admin-locked-img" src=""/>
            <script>
                getSrc('{{$i->id}}','{{$i->img}}');
            </script>
        </a>
        @else
        <a href="javascript:void(0)" data-trigger="focus" data-placement="bottom" data-toggle="popover" title="Ảnh bị khóa" data-content="Tài khoản sở hữu ảnh đang bị khóa!">
            <img id="img{{$i->id}}" class="small-img locked-img rounded-circle" src="{{ URL::to('/img/locked.jpg') }}"/>
        </a>
        @endif
    @elseif(Auth::guest())
    <a href="javascript:void(0)" data-trigger="focus" data-placement="bottom" data-toggle="popover" title="Ảnh nhỏ" data-content="Đăng nhập để xem kích thước đầy đủ!">
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
    <a id="link{{$i->id}}" href="javascript:void(0)" onClick="clickImg({{$i->id}})">
        <img id="img{{$i->id}}" src="{{ URL::to('/storage/upload/' . $i->img) }}"/>
    </a>
    </div>
    @else
    <a href="javascript:void(0)" data-trigger="focus" data-placement="bottom" data-toggle="popover" title="Ảnh nhỏ" data-content="Tài khoản của bạn đang bị khóa!">
        <img id="img{{$i->id}}" class="small-img" src=""/>
        <script>
            getSrc('{{$i->id}}','{{$i->img}}');
        </script>
    </a>
    @endif
</div>
@else
<div class="col-sm-2">
    <a href="javascript:void(0)" data-trigger="focus" data-placement="bottom" data-toggle="popover" title="Ảnh riêng tư" data-content="Bạn không có quyền xem ảnh này!">
        <img id="img{{$i->id}}" class="small-img private-img rounded-circle" src="{{ URL::to('/img/private.png') }}"/>
    </a>
</div>
@endif
