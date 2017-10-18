<div class="sidebar-header d-flex align-items-center">
    <div class="avatar">
      @if(Auth::guest())
      <img src="{{ URL::to('/storage/other/not-logged.jpg') }}" alt="avatar" class="img-fluid rounded-circle">
      @else
      @if(Auth::user()->lv==1)
      <img src="{{ URL::to('/storage/other/ad-avatar.png') }}" alt="avatar" class="img-fluid rounded-circle">
      @else
      <img src="{{ URL::to('/storage/other/avatar.png') }}" alt="avatar" class="img-fluid rounded-circle">
      @endif
      @endif
    </div>
        <div class="title">
        @if(Auth::guest())
          <h1 class="h4">None</h1>
          <p>None</p>
        @else
          <h1 class="h4">{{Auth::user()->name}}</h1>
          @if(Auth::user()->lv > 0)
          <p>Admin</p>
          @else
          <p>User</p>
          @endif
        @endif
    </div>
</div>