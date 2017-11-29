<header class="page-header up">
  <div id="row row-flex">
    <div class="col-sm-12">
      <strong><label style="font-size: 125%">Ảnh được đăng gần đây</label></strong>
    </div>
  </div>
</header>
<section class="forms up">
  <div class="container" id="container" style="min-height: 400px">  
    <div class="row row-flex"> 
      @if($images->count() == 0)
      <p style="padding-left: 10px">Không có gì để hiển thị!</p>
      @else   
      @foreach ($images as $i)
          <div class="col-lg-4 col-md-6 sb-preview text-center">
            <div class="card h-100">
              @if(Auth::user()->lv != -1)
              <a href="javascript:void(0)" onClick="clickImg({{$i->id}})">
                <img class="small-img card-img-top" src="{{ URL::to('/storage/upload/' . $i->img) }}"/>
              </a>
              @else
              <a href="javascript:void(0)" data-trigger="focus" data-placement="left" data-toggle="popover" title="Ảnh nhỏ" data-content="Tài khoản của bạn đang bị khóa!">
                  <img id="img{{$i->id}}" class="small-img card-img-top" src=""/>
                  <script>
                      getSrc('{{$i->id}}','{{$i->img}}');
                  </script>
              </a>
              @endif
              <div class="card-footer">
              <p>Đăng bởi:
                <strong>
                  <a href="{{ route('image.userimg',[$i->user->name]) }}">{{$i->user->name}}</a>
                </strong>
              </p>
              <p>Ngày đăng:&nbsp;{{$i->created_at->format('d-m-Y H:i')}}</p>
              </div>
            </div>
          </div>
      @endforeach
      @endif
    </div>
  </div>
</section>
@include('parts.imageDetail')