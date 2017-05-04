@extends('frontend.master')
@section('content')
    <div class="box-header">
      <h3 class="box-title">{{ trans('messages.list_readding_book') }}</h3>
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
          <th>{{ trans('messages.readed') }}</th>
        </tr>
        <?php $stt = 0; ?>
        @foreach ($marks as $mark)
        <?php $stt++ ?>
        <tr>
          <td>{{$stt}}</td>
          <td><img src=" {{ asset($mark->book->img)}}" class="imagess" ></img></td>
          <td>{{ $mark->book->name }}</td>
          <td> {{ $mark->book->author }} </td>
          <td> {{ str_limit($mark->book->description, $limit = 100, $end = '...') }} </td>
          <td> {{ $mark->book->number_of_page }}</td>
          <td> {{ $mark->book->category->name }} </td>
          <td> {{ $mark->book->public_date }} </td>
          <td>   {{ Form::open(array('method' => 'GET','url' => 'mark/deletereadding/' . $mark->id, )) }}
                    {{ Form::button('<i class="deleteu fa fa-check-square-o"></i>', array('type' =>'submit','onclick' => 'return confirm("Do you want to delete ?")', 'class' => ' deleteu btn-link')) }}
                {{ Form::close() }}
          </td>
        </tr>
        @endforeach
      </tbody></table>
    </div>
@endsection
