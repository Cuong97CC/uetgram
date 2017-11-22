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
      @foreach ($images as $image)
          <div class="col-lg-4 col-md-6 sb-preview text-center">
            <div class="card h-100">
              <a href="#">
                <img class="card-img-top" src="{{ URL::to('/storage/upload/' . $image->img) }}"/>
              </a>
              <div class="card-footer">
                @if($image->title != '')
                  <label>Tiêu đề: {{$image->title}}</label>
                @endif
              </div>
            </div>
          </div>
      @endforeach
    </div>
  </div>
</section>
