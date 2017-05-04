@extends('frontend.master')
@section('content')
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css"/>
@foreach ($books as $book)
  <div class="well">
      <div class="media">
        <a class="pull-left" href="{{ route('home.detail',$book->id) }}">
            <img class="media-object bookimage" src="{{ asset($book->img) }}">
        </a>
        <div class="media-body">
            <h4 class="media-heading"><a href="{{ route('home.detail',$book->id) }}" >{{ $book->name }}</a></h4>
          <p class="text-right">By {{ $book->author }}</p>
          <p>{{ str_limit($book->description, $limit = 250, $end = '...') }}</p>
          <ul class="list-inline list-unstyled">
            <li><span><i class="fa fa-calendar-check-o"></i> {{ Carbon\Carbon::createFromFormat('Y-m-d', $book->public_date)->format('d M Y')  }} </span></li>
            <li>|</li>
              {{ $book->category()->withTrashed()->get()->first()->name }}
            <li>|</li>
            <li>
            <span><i class="fa fa-comments"></i> {{ $book->count_comment_of_book }} comments</span>
            <li>|</li>
            <li>
                <span data-readStatus = "{{$book->mark['read_status']}}"
                data-type = '1' data-favoriteStatus = "{{$book->mark['favorite']}}"
                 data-readStatus = "{{$book->mark['favorite']}}"
                 data-markid="{{ $book->mark['id'] }}" data-bookId="{{ $book->id }}"
                 data-user="{{ Auth::user()->id }}" data-url="{{ route('mark.store') }}"
                 data-token={{ csrf_token() }} class="markItem btn btn-box " data-toggle="tooltip" title="" data-original-title="Mark as favorite">
                  <i data-id="{{ $book->id }}" class=" @if ( $book->mark['favorite'] == 1 && Auth::user()->id == $book->mark['user_id']) {{ "favoriteStatus" }} @endif  fa fa-fw fa-bookmark"></i></span>
            </li>
            <li>|</li>
            <li>
                <span data-readStatus = "{{$book->mark['read_status']}}"
                 data-type = '2' data-favoriteStatus = "{{$book->mark['favorite']}}"
                  data-markId="{{ $book->mark['id'] }}" data-bookId="{{ $book->id }}"
                   data-user="{{ Auth::user()->id }}" data-url="{{ route('mark.store') }}"
                   data-token={{ csrf_token() }}
                    class="markItem  btn btn-box" data-toggle="tooltip" title="" data-original-title="Mark as reading">
                  <i data-id = {{ $book->id }} class="fa fa-flag-checkered @if ( $book->mark['read_status'] == 1 && Auth::user()->id == $book->mark['user_id']) {{ "readStatus" }} @endif"></i></span>
            </li>
            <li>|</li>
             <li>
                <span data-readStatus = "{{$book->mark['read_status']}}"
                data-type = '3' data-favoriteStatus = "{{$book->mark['favorite']}}"
                data-markId="{{ $book->mark['id'] }}" data-bookId="{{ $book->id }}"
                 data-user="{{ Auth::user()->id }}" data-url="{{ route('mark.store') }}"
                  data-token={{ csrf_token() }} class="markItem btn btn-box"
                   data-toggle="tooltip" title="" data-original-title="Mark as readed">
                  <i  data-id = {{ $book->id }} class="fa fa-flag @if ( $book->mark['read_status'] == 2 && Auth::user()->id == $book->mark['user_id']) {{ "readStatus" }} @endif"></i></span>
              </li>
            <li>|</li>
              <span>Rate: {{ $book->rate}} <i class="fa fa-star-o" data-toggle="tooltip" style="color:gold" aria-hidden="true"></i></span>
            <li>
            </ul>
       </div>
    </div>
  </div>
@endforeach
{{$books->links()}}
@endsection
