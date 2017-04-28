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
    <h1 class="text-center">{{ $book->name}}</h1>
      <img class="img-responsive center-block" src="{{ asset($book->path_book_image)}}" alt="Photo">

      <p>{{ $book->description }}</p>
        <h1>Rate for book</h1>
        <fieldset class="rating" @if ($book->user_id == Auth::user()->id) {{ 'disabled="disable"' }} @endif data-id="{{ $book->id}}" data-url="{{ route('book.update',$book->id)}}" data-userId={{ Auth::user()->id }} data-token ="{{ csrf_token() }}" data-type ="vote">
            <input class="star1" type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
            <input class="star1" type="radio" id="star4half" name="rating" value="4.5" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
            <input class="star1" type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
            <input class="star1" type="radio" id="star3half" name="rating" value="3.5" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
            <input class="star1" type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
            <input class="star1" type="radio" id="star2half" name="rating" value="2.5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
            <input class="star1" type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
            <input class="star1" type="radio" id="star1half" name="rating" value="1.5" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
            <input class="star1" type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
            <input class="star1" type="radio" id="starhalf" name="rating" value="0.5" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
        </fieldset>
        <span class="pull-right text-muted"> <span id="countItem" data-sum="{{ $comments->count() }}" >{{ $comments->count() }}</span>/{{ $comments->total() }} comments</span>
    </div>
    <!-- /.box-body -->
    <div class="box-footer box-comments">
      <!-- /.box-comment -->

        @foreach($comments as $cm)
          <div data-id={{ $cm->id }} class="box-comment">
              <img class="img-circle img-sm" src="{{ asset($cm->user->path_avatar) }}" alt="User Image">
              <div class="comment-text">
                    <span class="username">
                    {{ $cm->user->fullname }}
                      <span data-id="{{$cm->id}}" class="text-muted pull-right">
                        @if (@ $cm->updated_at != $cm->created_at)
                            {{  $cm->updated_at->diffForHumans() . " - Edited" }}
                        @else
                            {{ $cm->created_at->diffForHumans() }}
                        @endif
                      </span>
                    </span><!-- /.username -->
                    @if(Auth::user()->id == $cm->user_id || Auth::user()->role == 1)
                        <a href="javascript:void(0)"><i data-id="{{ $cm->id }}" data-token="{{ csrf_token() }}" data-url="{{ route('comment.destroy',$cm->id)}}" class="deleteComment fa fa-times fa-1 pull-right"></i></a>
                        <a href="javascript:void(0)"><i data-id="{{ $cm->id }}"  data-token="{{ csrf_token() }}" class="editcomment fa fa-pencil-square-o fa-1 pull-right" ></i></a>
                    @endif
                    <p data-id="{{$cm->id}}" data-userId ="{{ Auth::user()->id }}"  class="commentText">{{ $cm->comment }}</p>
                    <textarea data-url="{{ route('comment.update',$cm->id) }}" data-token="{{ csrf_token() }}"  data-id="{{ $cm->id }}" class="form-control edit-comment-text hide" >{{ $cm->comment }} </textarea>
              </div>
        </div>
        @endforeach
    </div>
    @if($comments->total() > $comments->perPage())
      <a href="javscript:void()"  id="loadComment" data-token={{ csrf_token() }} data-nextPage={{ $comments->nextPageUrl() }}>Load More...</a>
    @endif
    <!-- /.box-footer -->
    <div class="box-footer">
    {!! Form::open([
        'role' => 'form',
        'method' => 'POST',
        'id' => 'formComment',
        'action' => 'CommentController@store'
    ]) !!}
        <img class="img-responsive img-circle img-sm" src="{{ asset(Auth::user()->path_avatar) }}" title="{{ Auth::user()->fullname }}"  alt="{{ Auth::user()->fullname }}"/>
        <div class="img-push">
            <div class="form-group">
                <input type='hidden' name='userId' value='{{ Auth::user()->id }}' >
                <input type='hidden' name='bookId' value='{{ $book->id }}' >
                <textarea id="comment"  name='comment' placeholder="press enter to post comment" class="form-control"></textarea>
            </div>
        </div>
   {!! Form::close() !!}
    </div>
    <!-- /.box-footer -->
  </div>
  <!-- /.box -->
@endsection
