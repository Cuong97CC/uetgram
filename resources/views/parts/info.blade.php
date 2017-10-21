                <form id="tag-form" action="{{ route('tag.store',$i->id) }}" method="POST" class="form-inline" idImg="{{ $i->id }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label class="form-label" for="tag">Tag:</label>
                        <input class="form-control" type="text" placeholder="Tag..." name="tag" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" id="add-tag" class="btn btn-primary">Add</button>
                    </div>
                </form>
                @if(Auth::user()->lv == 1 || $idUser == $image->idUser)               
                <form id="delete-img-bt" method="post" action="{{ route('image.destroy',$i->id) }}" class="form-inline">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="DELETE" >
                    <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                </form>
                <button id="edit-img-bt" class="btn btn-xs btn-info">
                    <a style="color:#FFF">Edit</a>
                </button>
                @endif
             </br>
            <h1 style="text-align:center">{{$i->title}}</h1></br>
            <p>From: <strong><a href="#">{{$i->user->name}}</a></strong></p>
            <p>{{$i->content}}</p>
            <p>
            @foreach($i->tags as $t)
                <div id="tag">
                <div id="tag{{$t->id}}" style="display:inline">
                    <a href="{{ route('tag.findimages',$t->content) }}">#{{$t->content}}</a>
                    @if(Auth::user()->lv == 1 || $i->idUser == $idUser)
                        <form method="POST" style="display:inline" action="{{ route('tag.destroy',[$i->id,$t->id]) }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="DELETE" >
                            <button type="submit" class="btn btn-xs btn-warning">x</button>
                        </form>
                    @endif
                </div> 
                </div>
            @endforeach
            </p>
            <img src="{{ URL::to('/storage/upload/' . $i->img) }}"/>