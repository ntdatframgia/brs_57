@extends('frontend.master')
@section('content')
<div class="box box-widget">
    <div class="box-body">
      <img class="img-responsive pad center-block" src="{{ $book->img }}" alt="Photo">

      <p>{{ $book->description }}</p>
      <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
      <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
      <span class="pull-right text-muted">127 likes - 3 comments</span>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      {!! Form::open([
        'role' => 'form',
        'method' => 'POST',
        'id' => 'formComment',
        'action' => 'BookController@index'
        ]) !!}
        <img class="img-responsive img-circle img-sm" src="{{ Auth::user()->avatar }}" title="{{ Auth::user()->fullname }}"  alt="{{ Auth::user()->fullname }}"/>
        <div class="img-push">
            <div class="form-group">
                <input type='hidden' name='userId' value='{{ Auth::user()->id }}' >
                <input type='hidden' name='bookId' value='{{ $book->id }}' >
                <textarea id="comment"  name='comment' placeholder="press enter to post comment" class="form-control"></textarea>
            </div>
        </div>
   {!! Form::close() !!}

    </div>
    <div class="box-footer box-comments">
      <div class="box-comment">
        <!-- User image -->
        <img class="img-circle img-sm" src="../dist/img/user3-128x128.jpg" alt="User Image">

        <div class="comment-text">
              <span class="username">
                Maria Gonzales
                <span class="text-muted pull-right">8:03 PM Today</span>
              </span><!-- /.username -->
          It is a long established fact that a reader will be distracted
          by the readable content of a page when looking at its layout.
        </div>
        <!-- /.comment-text -->
      </div>
      <!-- /.box-comment -->
      <div class="box-comment">
        <!-- User image -->
        <img class="img-circle img-sm" src="../dist/img/user4-128x128.jpg" alt="User Image">

        <div class="comment-text">
              <span class="username">
                Luna Stark
                <span class="text-muted pull-right">8:03 PM Today</span>
              </span><!-- /.username -->
          It is a long established fact that a reader will be distracted
          by the readable content of a page when looking at its layout.
        </div>
        <!-- /.comment-text -->
      </div>
      <!-- /.box-comment -->
    </div>
    <!-- /.box-footer -->

    <!-- /.box-footer -->
  </div>
@endsection
