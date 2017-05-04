@extends('admin.admin')
@section('content')
    <div class="box-header">
      <h3 class="box-title">{{ trans('messages.list_comment') }}</h3>
      <a href="{{ route('comment.create') }}" ><button class="btn btn-primary pull-right">Add comment</button></a>
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
          <th>{{ trans('messages.comment') }}</th>
          <th>{{ trans('messages.user') }}</th>
          <th>{{ trans('messages.created') }}</th>
          <th>{{ trans('messages.updated_at') }}</th>
          <th>{{ trans('messages.delete') }}</th>
        </tr>
        <?php $stt = 0;?>
        @foreach ($comments as $comment)
        <?php $stt++;?>
        <tr>
          <td>{{ $stt }}</td>
          <td>{{str_limit($comment->comment, $limit = 50, $end = '...') }}</td>
          <td> {{ $comment->user->fullname }} </td>
          <td> {{ $comment->created_at->diffForHumans() }} </td>
          <td> {{ $comment->updated_at->diffForHumans() }} </td>
          <td>   {{ Form::open(array('url' => 'comment/' . $comment->id, )) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::button('<i class="deleteu fa fa-times"></i>', array('type' =>'submit','onclick' => 'return confirm("Do you want to delete ?")', 'class' => ' deleteu btn-link')) }}
                {{ Form::close() }}

          </td>
        </tr>
        @endforeach
      </tbody></table>
      {{ $comments->links() }}
    </div>
@endsection
