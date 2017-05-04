@extends('frontend.master')
@section('content')
  <!-- Box Comment -->
  <div class="box box-widget">
    <div class="box-header with-border">
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    <h1 class="text-center">{{ $book->name}}</h1>
      <img class="img-responsive center-block" src="{{ asset($book->img)}}" alt="Photo"></br>

      <p>{{ $book->description }}</p>
        <h1>Rate for book</h1>
        <fieldset class="rating"  data-id="{{ $book->id}}" data-url="{{ route('book.update',$book->id)}}" data-userId={{ Auth::user()->id }} data-token ="{{ csrf_token() }}" data-type ="vote">
        @for($i =10; $i > 0; $i--)
            <input class="star1" type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" @if (ceil($book->rate) == $i)) {{"checked"}} @endif  /><label class = "full" for="star{{ $i }}" title=" {{$i}} stars"></label>
        @endfor
        <p id="totalPoint">Point: {{round($book->rate,1)}}/ 10 - {{$book->countvote}} Vote</p>
        <p id="totalPoint1"></p>
        </fieldset>
        <span class="pull-right text-muted"> <span id="countItem" data-sum="{{ $comments->count() }}" >{{ $comments->count() }}</span>/{{ $comments->total() }} comments</span>
    </div>
    <!-- /.box-body -->
    <div class="box-footer box-comments">
      <!-- /.box-comment -->

        @foreach($comments as $cm)
          <div data-id={{ $cm->id }} class="box-comment">
               <a href="{{route('home.profile',$cm->user->id)}}" ><img class="img-circle img-sm" src="{{ asset($cm->user->path_avatar) }}" alt="User Image"></a>
                <div class="comment-text">
                    <span class="username">
                    <a href="{{route('home.profile',$cm->user->id)}}" >{{ $cm->user->fullname }} </a>
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
