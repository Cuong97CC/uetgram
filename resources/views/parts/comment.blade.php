<form action="{{ route('comment.store',$i->id) }}" method="POST" class="form-horizontal" style="margin:5px">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
        <label class="form-label" for="content">Comment:</label>
        <textarea class="form-control" row="3" placeholder="Enter your comment..." name="content" style="display:inline" required></textarea>
        <button type="submit" class="btn btn-primary" style="float:right">Post</button>
    </div>
</form>
</br>
<div id="comments-area">
@foreach($i->comments as $c)
    <div style="display:inline">
    <div class="comment">
        <p><strong><a href="#">{{ $c->user->name }}</a></strong> : {{ $c->content }}</p>
        @if($image->idUser == $idUser || $c->idUser == $idUser)
        <form method="POST" action="{{ route('comment.destroy',$c->id) }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="DELETE" >
            <input type="submit" class="btn btn-xs btn-danger" value="Delete">
        </form>
         @endif
    </div>
    </div>
 @endforeach
 </div>