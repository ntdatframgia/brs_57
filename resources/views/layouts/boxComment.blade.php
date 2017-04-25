    <div class="box-comment">
      <img class="img-circle img-sm" src="{{ asset($comment->user->path_avatar }}" alt="User Image">
      <div class="comment-text">
            <span class="username">
              {{ $user->fullname }}
              <span class="text-muted pull-right">{{ $comment->created_at->diffForHumans() }}</span>
            </span><!-- /.username -->
            {{ $comment->comment }}
      </div>
      <!-- /.comment-text -->
    </div>
