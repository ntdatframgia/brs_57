@extends('admin.admin')
@section('content')
    <div class="box-header">
      <h3 class="box-title">{{ trans('messages.book_list') }}</h3>
      <a href="{{ route('book.create') }}" ><button class="btn btn-primary pull-right">Add book</button></a>
      @if (session('status'))
         <div class="alert alert-success alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a>
          {{ session('status') }}
        </div>
      @endif
      <div class="box-tools">
        <div class="input-group input-group-sm">
        </div>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
      <table class="table table-hover">
        <tbody><tr>
          <th>{{ trans('messages.id') }}</th>
          <th>{{ trans('messages.book_image') }}</th>
          <th>{{ trans('messages.book_name') }}</th>
          <th>{{ trans('messages.author') }}</th>
          <th>{{ trans('messages.description') }}</th>
          <th>{{ trans('messages.number_of_page') }}</th>
          <th>{{ trans('messages.category') }}</th>
          <th>{{ trans('messages.public_date') }}</th>
          <th>{{ trans('messages.edit') }}</th>
          <th>{{ trans('messages.delete') }}</th>
        </tr>
        @foreach ($books as $book)
        <tr>
          <td>{{ $book->id }}</td>
          <td><img src=" {{ asset($book->getPathBookImage())}}" class="imagess img-circle" ></img></td>
          <td>{{ $book->name }}</td>
          <td> {{ $book->author }} </td>
          <td> {{ str_limit($book->description, $limit = 100, $end = '...') }} </td>
          <td> {{ $book->number_of_page }}</td>
          <td> {{ $book->category->name }} </td>
          <td> {{ $book->public_date }} </td>
          <td><a href="{{ route("book.edit",$book->id)}}" ><button class="btn btn-link" ><i class="editu fa fa-edit"></i></button></a> </td>
          <td>   {{ Form::open(array('url' => 'book/' . $book->id, )) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::button('<i class="deleteu fa fa-times"></i>', array('type' =>'submit','onclick' => 'return confirm("Do you want to delete ?")', 'class' => ' deleteu btn-link')) }}
                {{ Form::close() }}

          </td>
        </tr>
        @endforeach
      </tbody></table>
    </div>
@endsection
