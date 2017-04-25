@extends('admin.admin')
@section('content')
  <!-- Box Comment -->
  <div class="box box-widget">
    <div class="box-header with-border">
      <div class="box-tools">
        <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Mark as read">
          <i class="fa fa-circle-o"></i></button>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <img class="img-responsive center-block" src="{{ asset($book->path_book_image)}}" alt="Photo">

      <p>{{ $book->description }}</p>
      <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
      <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
      <span class="pull-right text-muted">127 likes - 3 comments</span>
    </div>
    <!-- /.box-body -->
    <div class="box-footer box-comments">
      <!-- /.box-comment -->
        @foreach($comments as $cm)
          <div class="box-comment">
              <img class="img-circle img-sm" src="{{ asset($cm->user->getPathAvatar()) }}" alt="User Image">
              <div class="comment-text">
                    <span class="username">
                      {{ $cm->user->fullname }}
                      <span class="text-muted pull-right">{{ $cm->created_at->diffForHumans() }}</span>
                    </span><!-- /.username -->
                    {{ $cm->comment }}
              </div>
        </div>
        @endforeach
        {{ $comments->links() }}
    </div>
    <!-- /.box-footer -->
    <div class="box-footer">
    {!! Form::open([
        'role' => 'form',
        'method' => 'POST',
        'id' => 'formComment',
        'action' => 'CommentController@store'
    ]) !!}
        <img class="img-responsive img-circle img-sm" src="{{ asset(Auth::user()->getPathAvatar()) }}" title="{{ Auth::user()->fullname }}"  alt="{{ Auth::user()->fullname }}">
        <div class="img-push">
            <div class="form-group">
            <input type='hidden' name='userId' value='{{ Auth::user()->id }}'>
            <input type='hidden' name='bookId' value='{{ $book->id }}'>
                <textarea id="comment"  name='comment' class="form-control" placeholder=""></textarea>
            </div>
        </div>
   {!! Form::close() !!}
    </div>
    <!-- /.box-footer -->
  </div>
  <!-- /.box -->
@endsection
