@extends('frontend.master')
@section('content')
    <div class="box-header">
      <h3 class="box-title">{{ trans('messages.list_request') }}</h3>
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
          <th>{{ trans('messages.stt') }}</th>
          <th>{{ trans('messages.book_name') }}</th>
          <th>{{ trans('messages.author') }}</th>
          <th>{{ trans('messages.public_date') }}</th>
          <th>{{ trans('messages.cancel') }}</th>
        </tr>
        <?php $stt = 0; ?>
        @foreach ($requests as $request)
        <?php $stt++ ?>
        <tr>
            <td>{{$stt}}</td>
            <td>{{ $request->book_name }}</td>
            <td> {{ $request->author }} </td>
            <td> {{ $request->public_date }} </td>
            <td> {{ Form::open(array('url' => 'request/' . $request->id, )) }}
                 {{ Form::hidden('_method', 'DELETE') }}
                 {{ Form::button('<i class="deleteu fa fa-times"></i>', array('type' =>'submit','onclick' => 'return confirm("Do you want to delete ?")', 'class' => ' deleteu btn-link')) }}
                 {{ Form::close() }}
          </td>
        </tr>
        @endforeach
      </tbody></table>
    </div>
@endsection
