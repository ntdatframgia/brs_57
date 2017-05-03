@foreach ($comments as $comment)
    <div class="box-comment">
      <a href="{{route('home.profile',$comment->user->id)}}" ><img class="img-circle img-sm" src="{{ asset($comment->user->path_avatar) }}" alt="User Image"></a>
                <div class="comment-text">
                    <span class="username">
                    <a href="{{route('home.profile',$comment->user->id)}}" >{{ $comment->user->fullname }} </a>
              <span class="text-muted pull-right">{{ $comment->created_at->diffForHumans() }}</span>
            </span><!-- /.username -->
             @if(Auth::user()->id == $comment->user_id || Auth::user()->role == 1)
                <a href="javascript:void(0)"><i data-id="{{ $comment->id }}" data-token="{{ csrf_token() }}" data-url="{{ route('comment.destroy',$comment->id)}}" class="deleteComment fa fa-times fa-1 pull-right"></i></a>
                <a href="javascript:void(0)"><i data-id="{{ $comment->id }}" class="editcomment fa fa-pencil-square-o fa-1 pull-right" ></i></a>
              @endif
            <p data-id="{{ $comment->id }}" class="commentText">{{ $comment->comment }}
            </p>
            <textarea data-url={{ route('comment.update',$comment->id)}} data-token='{{csrf_token()}}' data-mehtod="PUT" data-id="{{ $comment->id }}" class="form-control edit-comment-text hide">{{ $comment->comment }}</textarea>
      </div>
      <!-- /.comment-text -->
    </div>
@endforeach
