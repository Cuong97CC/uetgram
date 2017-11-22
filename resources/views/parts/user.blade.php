<div class="col-sm-3 text-center">
    <div class="folder">
		<a href="{{ route('image.userimg',[$u->name]) }}">
        	<div class="folder-header">
                @if($u->lv==1)
                <img class="img-fluid rounded-circle" style="margin-top:5px" src="{{ URL::to('/img/ad-avatar.png') }}" alt="avatar">
                @elseif($u->lv == 0)
                <img class="img-fluid rounded-circle" style="margin-top:5px" src="{{ URL::to('/img/avatar.png') }}" alt="avatar">
                @else
                <img class="img-fluid rounded-circle" style="margin-top:5px" src="{{ URL::to('/img/banned.png') }}" alt="avatar">
                @endif
          	</div>
          	<div class="user folder-section">
            	<h3>{{$u->name}}</h3>
                @if($u->lv > 0)
                <p>Quản trị</p>
                @elseif($u->lv == 0)
                <p>Người dùng</p>
                @else
                <p style="color: red">Bị khóa</p>
                @endif
          	</div>
		</a>
    </div>   
</div>

