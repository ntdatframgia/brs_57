@extends('frontend.master')
@section('content')
<div class="box box-widget">
    <div class="box-body">
      <img class="img-responsive pad center-block" src="{{ $book->img }}" alt="Photo">

      <p>{{ $book->description }}</p>
      <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
      <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
      <span class="pull-right text-muted"> <span id="countItem" data-sum="{{ $comments->count() }}" >{{ $comments->count() }}</span>/<span id ="totalComment">{{ $comments->total() }}</span> {{ trans('messages.comments') }}</span>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      {!! Form::open([
        'role' => 'form',
        'method' => 'POST',
        'id' => 'formComment',
        'action' => 'CommentController@store'
        ]) !!}
        <img class="img-responsive img-circle img-sm" src="{{ Auth::user()->avatar }}" title="{{ Auth::user()->fullname }}"  alt="{{ Auth::user()->fullname }}"/>
        <div class="img-push">
            <div class="form-group">
                <input type='hidden' name='user_id' value='{{ Auth::user()->id }}' >
                <input type='hidden' name='book_id' value='{{ $book->id }}' >
                <textarea id="comment"  name='comment' placeholder="press enter to post comment" class="form-control"></textarea>
            </div>
        </div>
   {!! Form::close() !!}

    </div>
    <div class="box-footer box-comments">

        @foreach($comments as $comment)
            <div data-id="{{ $comment->id }}" class="box-comment">
               <a href="#" ><img class="img-circle img-sm" src="{{ $comment->user->avatar }}" alt="User Image"></a>
                <div class="comment-text">
                    <span class="username">
                    <a href="#" >{{ $comment->user->fullname }} </a>
                      <span data-id="{{$comment->id}}" class="text-muted pull-right">
                        @if (@ $comment->updated_at != $comment->created_at)
                            {{  $comment->updated_at->diffForHumans() . " - Edited" }}
                        @else
                            {{ $comment->created_at->diffForHumans() }}
                        @endif
                      </span>
                    </span><!-- /.username -->
                    @if(Auth::user()->id == $comment->user_id || Auth::user()->role == 1)
                        <a href="javascript:void(0)"><i data-id="{{ $comment->id }}" data-token="{{ csrf_token() }}" data-url="{{ route('comment.destroy',$comment->id)}}" class="deleteComment fa fa-times fa-1 pull-right"></i></a>
                        <a href="javascript:void(0)"><i data-id="{{ $comment->id }}"  data-token="{{ csrf_token() }}" class="editcomment fa fa-pencil-square-o fa-1 pull-right" ></i></a>
                    @endif
                    <p data-id="{{$comment->id}}" data-userId ="{{ Auth::user()->id }}"  class="commentText">{{ $comment->comment }}</p>
                    <textarea data-url="{{ route('comment.update',$comment->id) }}" data-token="{{ csrf_token() }}"  data-id="{{ $comment->id }}" class="form-control edit-comment-text hide" >{{ $comment->comment }} </textarea>
                </div>
            </div>
      @endforeach
      <!-- /.box-comment -->
    </div>
    @if($comments->total() > $comments->perPage())
        <a href="javscript:void()"  id="loadComment" data-token={{ csrf_token() }} data-nextPage={{ $comments->nextPageUrl() }}>Load More...</a>
    @endif
    <!-- /.box-footer -->

    <!-- /.box-footer -->
  </div>
@endsection
