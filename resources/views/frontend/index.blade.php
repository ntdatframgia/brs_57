@extends('admin.admin')
@section('content')
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css"/>
@foreach ($books as $book)
  <div class="well">
      <div class="media">
        <a class="pull-left" href="{{ route('home.detail',$book->id) }}">
            <img class="media-object bookimage" src="{{ asset($book->path_book_image) }}">
        </a>
        <div class="media-body">
            <h4 class="media-heading"><a href="{{ route('home.detail',$book->id) }}" >{{ $book->name }}</a></h4>
          <p class="text-right">By {{ $book->author }}</p>
          <p>{{ str_limit($book->description, $limit = 250, $end = '...') }}</p>
          <ul class="list-inline list-unstyled">
            <li><span><i class="glyphicon glyphicon-calendar"></i> {{ Carbon\Carbon::createFromFormat('Y-m-d', $book->public_date)->format('d M Y')  }} </span></li>
            <li>|</li>
            <span><i class="fa fa-link"></i> {{ $book->category->name }}</span>
            <li>|</li>
            <li>
            <span><i class="fa fa-comments"></i> 2 comments</span>
            <li>|</li>
            <li>
               <span class="fa fa-star"></span>
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
@endsection
