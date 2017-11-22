<div class="sidebar-header d-flex align-items-center">
    <div class="avatar">
      @if(Auth::guest())
      <img src="{{ URL::to('/img/not-logged.jpg') }}" alt="avatar" class="img-fluid rounded-circle">
      @else
      @if(Auth::user()->lv==1)
      <img src="{{ URL::to('/img/ad-avatar.png') }}" alt="avatar" class="img-fluid rounded-circle">
      @elseif(Auth::user()->lv==0)
      <img src="{{ URL::to('/img/avatar.png') }}" alt="avatar" class="img-fluid rounded-circle">
      @elseif(Auth::user()->lv==-1)
      <img src="{{ URL::to('/img/banned.png') }}" alt="avatar" class="img-fluid rounded-circle">
      @endif

      @endif
    </div>
        <div class="title">
        @if(Auth::guest())
          <h1 class="h4">Ẩn danh</h1>
          <p>???</p>
        @else
          <h1 class="h4">{{Auth::user()->name}}</h1>
          @if(Auth::user()->lv > 0)
          <p>Quản trị</p>
          @elseif(Auth::user()->lv==0)
          <p>Người dùng</p>
          @elseif(Auth::user()->lv==-1)
          <p style="color: red">Bị khóa</p>
          @endif
        @endif
    </div>
</div>
