@foreach ($comments as $comment)
    <div class="box-comment">
      <img class="img-circle img-sm" src="{{ asset($comment->user->path_avatar) }}" alt="User Image">
      <div class="comment-text">
            <span class="username">
              {{ $comment->user->fullname }}
              <span class="text-muted pull-right">{{ $comment->created_at->diffForHumans() }}</span>
            </span><!-- /.username -->
            <p data-id="{{ $comment->id }}" class="commentText">{{ $comment->comment }}
            @if(Auth::user()->id == $comment->user_id)
                <i data-id="{{ $comment->id }}" class="editcomment fa fa-pencil-square-o fa-1 pull-right" aria-hidden="true"></i>
            @endif
            </p>
            <textarea data-url={{ route('comment.update',$comment->id)}} data-token='{{csrf_token()}}' data-mehtod="PUT" data-id="{{ $comment->id }}" class="form-control edit-comment-text hide">{{ $comment->comment }}</textarea>
      </div>
      <!-- /.comment-text -->
    </div>
@endforeach
