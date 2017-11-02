@if(!Auth::guest() && $images && $images->total()>0)
<div id="image-detail" style="display:none; margin-bottom: 10px; min-height: 500px">
  <div class="container" id="container">
    <div id="carouselDetail" class="carousel slide" data-ride="carousel" data-interval="false">
      <div class="row">
      <div class="col-sm-4">
      <a class="btn btn-primary carousel-control pull-left" href="#carouselDetail" role="button" data-slide="prev">
        <i class="fa fa-chevron-left" aria-hidden="true"></i>
      </a>
      </div>
      <div class="col-sm-4">
      <button onClick="hide()" class="btn btn-primary btn-block"><i class="fa fa-th" aria-hidden="true"></i></button>
      </div>
      <div class="col-sm-4">
      <a class="btn btn-primary carousel-control pull-right" href="#carouselDetail" role="button" data-slide="next">
        <i class="fa fa-chevron-right" aria-hidden="true"></i>
      </a>
      </div>
      </div>
      <div class="carousel-inner" role="listbox">
        @foreach($images as $i)
        <div class="carousel-item">
          <div class="row" id="detail">
            <div class="col-md-8">
              <img style="width: 100%; height: 100%" src="{{ URL::to('/storage/upload/' . $i->img) }}" alt="{{$i->title}}">
            </div>
            <div class="col-md-4">
              <div id="title{{$i->id}}" class="detail">
              @if($i->title && $i->title != '')
              <h1 id="img-title{{$i->id}}" class="inline">{{$i->title}}     </h1>
              @if(Auth::user()->lv==1 || Auth::user()->id == $i->idUser) 
              <h1 class="inline"><a href="javascript:void(0)" onClick="editTitle({{$i->id}})"><i class="fa fa-pencil" aria-hidden="true"></i></a></h1>
              <h1 class="inline"><a href="javascript:void(0)" onClick="deleteTitle({{$i->id}})" class="del"><i class="fa fa-times" aria-hidden="true"></i></a></h1>
              @endif
              @else
              @if(Auth::user()->lv==1 || Auth::user()->id == $i->idUser) 
              <a href="javascript:void(0)" onClick="editTitle({{$i->id}})" class="btn btn-info btn-sm">Thêm tiêu đề</a>
              @endif
              @endif
              </div>
              <div id="content{{$i->id}}" class="detail">
              @if($i->content)
              <p id="img-content{{$i->id}}" class="inline">{{$i->content}}     </p>  
              @if(Auth::user()->lv==1 || Auth::user()->id == $i->idUser) 
              <a href="javascript:void(0)" onClick="editDescription({{$i->id}})"><i class="fa fa-pencil" aria-hidden="true"></i></a>
              <a href="javascript:void(0)" onClick="deleteDescription({{$i->id}})" class="del"><i class="fa fa-times" aria-hidden="true"></i></a>
              @endif
              @else
              @if(Auth::user()->lv==1 || Auth::user()->id == $i->idUser) 
              <a href="javascript:void(0)" onClick="editDescription({{$i->id}})" class="btn btn-info btn-sm">Thêm mô tả</a>
              @endif
              @endif
              </div>
              <p>Đăng bởi:
                <strong>
                  <a href="{{ route('image.userimg',[$i->user->name]) }}">{{$i->user->name}}</a>
                </strong>
              </p>
              <div id="tag-area{{$i->id}}" style="margin-bottom: 5px">
              @foreach($i->tags as $t)
              <div class="inline tag" id="tag{{$t->id}}">
                <a href="{{ route('tag.findimages',$t->content) }}" class="tag-content">#{{$t->content}}</a>
                @if(Auth::user()->lv==1 || Auth::user()->id == $i->user->id || Auth::user()->id == $t->idUser($i->id,$t->id))
                <a href="javascript:void(0)" onClick="deleteTag({{$i->id}},{{$t->id}})" class="tag-del"><i class="fa fa-times" aria-hidden="true"></i></a>
                @endif
              </div>
              @endforeach
              </div>
              <div id="add-tag-area{{$i->id}}">
              </div>
              <button onClick="downloadSingle('{{ URL::to('/storage/upload/' . $i->img) }}')" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="bottom" title="Tải xuống"><i class="fa fa-download" aria-hidden="true"></i></button>
              <button onClick="addTag({{$i->id}})" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="Gán nhãn"><i class="fa fa-tag" aria-hidden="true"></i></button>
              @if(Auth::user()->lv==1 || Auth::user()->id == $i->idUser) 
              <span data-toggle="modal" data-target="#deleteSingleModal{{$i->id}}">
              <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Xóa"><i class="fa fa-trash" aria-hidden="true"></i></button>
              </span>
              @endif
              <a id="single-hidden-link" download="" href="" style="display:none"></a>
            </div>
            <div class="col-md-12 comment-area" id="comment-area{{$i->id}}">
              <div style="margin:5px" id="form-cmt{{$i->id}}">
                    <label class="form-label" for="content">Bình luận:</label>
                    <textarea class="form-control" row="3" placeholder="Nhập bình luận..." name="content" style="display:inline" required oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Trường này không được để trống')"></textarea>
                    @if(Auth::user()->lv==1 || Auth::user()->id==$i->idUser)
                    <button onClick="comment({{$i->id}},'{{Auth::user()->name}}',1)" class="btn btn-primary" style="float:right">Đăng</button>
                    @else
                    <button onClick="comment({{$i->id}},'{{Auth::user()->name}}',0)" class="btn btn-primary" style="float:right">Đăng</button>
                    @endif
              </div></br></br>
              @foreach($i->comments as $c)
                  <div class="comment" id="comment{{$c->id}}">
                      <p class="inline"><strong><a href="{{ route('image.userimg',[$c->user->name]) }}">{{ $c->user->name }}</a></strong> : {{ $c->content }}</p></br>
                      @if($i->idUser == Auth::user()->id || $c->idUser == Auth::user()->id || Auth::user()->lv==1)
                          <button onClick="deleteCmt({{$c->id}})" class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                      @endif
                      @if(Auth::user()->lv==1 || Auth::user()->id==$i->idUser)
                          <button onClick="makeDescription({{$c->id}},{{$i->id}})" class="btn btn-sm btn-info"><i class="fa fa-check-square-o" aria-hidden="true"></i></button>
                      @endif
                  </div>
              @endforeach
            </div>
          </div>
        </div>
        @endforeach
        @foreach($images as $i)
          @include('modals.deleteSingleModal')
        @endforeach
      </div>
    </div>
  </div>
</div>
@endif