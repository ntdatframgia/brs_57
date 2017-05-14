@if($action == 'load')
    @foreach ($comments as $comment)
         <div data-id="{{ $comment->id }}" class="box-comment">
            <a href="#" ><img class="img-circle img-sm" src="{{ $comment->user->avatar }}" alt="User Image"></a>
                        <div class="comment-text">
                            <span class="username">
                            <a href="#" >{{ $comment->user->fullname }} </a>
                      <span class="text-muted pull-right">{{ $comment->created_at->diffForHumans() }}</span>
                </span>
                     @if(Auth::user()->id == $comment->user_id || Auth::user()->role == 1)
                        <a href="javascript:void(0)"><i data-id="{{ $comment->id }}" data-token="{{ csrf_token() }}" data-url="{{ route('comment.destroy',$comment->id)}}" class="deleteComment fa fa-times fa-1 pull-right"></i></a>
                        <a href="javascript:void(0)"><i data-id="{{ $comment->id }}"  data-token="{{ csrf_token() }}" class="editcomment fa fa-pencil-square-o fa-1 pull-right" ></i></a>
                      @endif
                    <p data-id="{{$comment->id}}" class="commentText">{{ $comment->comment }}
                    </p>
                  <textarea data-url={{ route('comment.update',$comment->id)}} data-method="PUT" data-token='{{csrf_token()}}' data-id="{{ $comment->id }}" class="form-control edit-comment-text hide">{{ $comment->comment }}</textarea>
            </div>
        </div>
    @endforeach
    @else
         <div data-id="{{ $comment->id }}" class="box-comment">
          <a href="#" ><img class="img-circle img-sm" src="{{ $comment->user->avatar }}" alt="User Image"></a>
                      <div class="comment-text">
                          <span class="username">
                          <a href="#" >{{ $comment->user->fullname }} </a>
                    <span class="text-muted pull-right">{{ $comment->created_at->diffForHumans() }}</span>
              </span>
                   @if(Auth::user()->id == $comment->user_id || Auth::user()->role == 1)
                          <a href="javascript:void(0)"><i data-id="{{ $comment->id }}" data-token="{{ csrf_token() }}" data-url="{{ route('comment.destroy',$comment->id)}}" class="deleteComment fa fa-times fa-1 pull-right"></i></a>
                          <a href="javascript:void(0)"><i data-id="{{ $comment->id }}"  data-token="{{ csrf_token() }}" class="editcomment fa fa-pencil-square-o fa-1 pull-right" ></i></a>
                    @endif
                  <p data-id="{{$comment->id}}" class="commentText">{{ $comment->comment }}
                  </p>
                <textarea data-url={{ route('comment.update',$comment->id)}} data-method="PUT" data-token='{{csrf_token()}}' data-id="{{ $comment->id }}" class="form-control edit-comment-text hide">{{ $comment->comment }}</textarea>
          </div>
      </div>
@endif

