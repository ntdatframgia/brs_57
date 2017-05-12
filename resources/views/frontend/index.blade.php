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
        <a href="{{ route('home.detail', $book->id) }}" ><h4 class="media-heading">{{ $book->title }}</h4></a>
          <p class="text-right">{{ trans('messages.by') }} {{ $book->author }}</p>
          <p>{{ str_limit($book->description, $limit = 250, $end = '...') }}</p>
          <ul class="list-inline list-unstyled">
        <li><span><i class="glyphicon glyphicon-calendar"></i>{{ $book->public_date }}</span></li>
            <li>|</li>
            <span><i class="glyphicon glyphicon-comment"></i> 2 comments</span>
            <li>|</li>
            <li>
               <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star-empty"></span>
            </li>
            <li>|</li>
            <li>
            <!-- Use Font Awesome http://fortawesome.github.io/Font-Awesome/ -->
              <span><i class="fa fa-facebook-square"></i></span>
              <span><i class="fa fa-twitter-square"></i></span>
              <span><i class="fa fa-google-plus-square"></i></span>
            </li>
      </ul>
       </div>
    </div>
  </div>
@endforeach
{{ $books->links() }}
@endsection
