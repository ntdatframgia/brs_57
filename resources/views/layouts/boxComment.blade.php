<div class="box-comment">
  <img class="img-circle img-sm" src="{{ asset($user->getPathAvatar()) }}" alt="User Image">
  <div class="comment-text">
        <span class="username">
          {{ $user->fullname }}
          <span class="text-muted pull-right">{{ \Carbon\Carbon::now()->diffForHumans() }}</span>
        </span><!-- /.username -->
        {{ $comment }}
  </div>
  <!-- /.comment-text -->
</div>
