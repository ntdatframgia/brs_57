@extends('admin.admin')
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
          <th>{{ trans('messages.created') }}</th>
          <th>{{ trans('messages.from_email') }}</th>
        </tr>
        <?php $stt = 0; ?>
        @foreach ($requests as $request)
        <?php $stt++ ?>
        <tr>
            <td>{{$stt}}</td>
            <td>{{ $request->book_name }}</td>
            <td> {{ $request->author }} </td>
            <td> {{ $request->public_date }} </td>
            <td> {{ $request->created_at->diffForHumans() }} </td>
            <td> {{ $request->user->email }} </td>
        </tr>
        @endforeach
      </tbody></table>
      {{ $requests->links() }}
    </div>
@endsection
