@section('header')
<header class="page-header">
  <div id="row row-flex">
    <div class="col-xs-12 col-md-12">
      <div class="row row-flex">
        <div class="col-xs-12 col-md-8 form-group">
          <strong><label style="font-size: 125%">Title of image</label></strong>
        </div>
        <div class="col-xs-12 col-md-4">
          <a href="#" class="btn navbar-btn btn-outline-primary mt-3 mt-lg-0 ml-lg-3">Edit</a>
          <a href="#" class="btn navbar-btn btn-outline-primary mt-3 mt-lg-0 ml-lg-3">Download</a>
        </div>
      </div> 
    </div>
  </div>
</header>
@stop

@section('content')
<!-- section -->
<section class="forms">
  <div class="container" id="container" style="min-height: 400px">
    <div class="row row-flex" style="border-bottom: 1px ridge grey; margin-top: 10px; padding: 15px;"> 
      <div class="col-xs-12 col-md-8">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <center><img class="d-block img-fluid" src="{{ URL::to('/img/abc.jpg') }}" alt="First slide"></center>
            </div>
            <div class="carousel-item">
              <center><img class="d-block img-fluid" src="{{ URL::to('/img/abc.jpg') }}" alt="Second slide"></center>
            </div>
            <div class="carousel-item">
              <center><img class="d-block img-fluid" src="{{ URL::to('/img/abc.jpg') }}" alt="Third slide"></center>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
    <!-- comment -->
    <div class="row row-flex" style="padding-top: 15px">
      <div class="col-xs-12 col-md-12 form-inline">
        <div class="col-xs-12 col-md-1 align-items-center">
          <div class="avatar_comment">
            <img src="{{ URL::to('/img/abc.jpg') }}" alt="avatar" class="img-thumbnail rounded-circle">
          </div>
        </div>
        <div class="col-xs-12 col-md-8">
          <textarea class="form-group" placeholer="Viết bình luận" style="width: 100%" required>
          </textarea>
        </div>
      </div>
    </div>
  </div>
</section>
@stop
