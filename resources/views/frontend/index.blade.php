@extends('frontend.master')
@section('content')
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css"/>
@foreach($books as $book)
  <div class="well">
      <div class="media">
        <a class="pull-left" href="#">
        <img class="media-object image-book" src="{{ $book->img }}">
      </a>
      <div class="media-body">
        <h4 class="media-heading"><a href="{{ route('home.detail', $book->id) }}" >{{ $book->title }}</a></h4>
          <p class="text-right">{{ trans('messages.by') }} {{ $book->author }}</p>
          <p>{{ str_limit($book->description, $limit = 250, $end = '...') }}</p>
          <ul class="list-inline list-unstyled">
            <li><span><i class="fa fa-calendar-check-o"></i> {{ Carbon\Carbon::createFromFormat('Y-m-d', $book->public_date)->format('d M Y')  }} </span></li>
            <li>|</li>
              {{ $book->category()->withTrashed()->get()->first()->name }}
            <li>|</li>
            <li>
            <span><i class="fa fa-comments"></i> {{ count($book->comments) }} {{ trans('messages.comments') }}</span>
            <li>|</li>
            <span id="markBook"
                data-markId="{{ $book->mark['id'] }}" data-bookId="{{ $book->id }}"
                data-user="{{ Auth::user()->id }}" data-url="{{ route('mark.store') }}"
                data-favorite="@empty($book->mark['favorite']) 0 @else {{ $book->mark['favorite'] }} @endempty" data-read_status="@empty($book->mark['read_status']) 0 @else {{ $book->mark['read_status'] }} @endempty"
                data-token={{ csrf_token() }}>
            </span>
            <li>
                <span data-type = '1' class=" markItem btn btn-box " data-toggle="tooltip" title="" data-original-title="Mark as favorite">
                    <i  class="@if ( $book->mark['favorite'] == 1 && Auth::user()->id == $book->mark['user_id']) {{ "favoriteStatus" }} @endif  fa fa-fw fa-bookmark"></i>
                </span>
            </li>
            <li>|</li>
            <li>
                <span  data-type = '2' class="markItem btn btn-box" data-toggle="tooltip" title="" data-original-title="Mark as reading">
                    <i class="fa fa-flag-checkered @if ( $book->mark['read_status'] == 1 && Auth::user()->id == $book->mark['user_id']) {{ "readStatus" }} @endif"></i>
                </span>
            </li>
            <li>|</li>
            <li>
                <span data-type = '3' class="markItem btn btn-box " data-toggle="tooltip" title="" data-original-title="Mark as readed">
                    <i class="fa fa-flag @if ( $book->mark['read_status'] == 2 && Auth::user()->id == $book->mark['user_id']) {{ "readStatus" }} @endif"></i>
                </span>
            </li>

                </span>
            <li>|</li>
              <span>Rate: {{ $book->rate}} <i class="fa fa-star-o" data-toggle="tooltip" style="color:gold" aria-hidden="true"></i></span>
            <li>
        </ul>
       </div>
    </div>
  </div>
@endforeach
{{ $books->links() }}
@endsection
