@extends('admin.admin')
@section('content')
    <div class="box-header">
      <h3 class="box-title">{{ trans('messages.list_user') }}</h3>
      <a href="{{ route('user.create') }}" ><button class="btn btn-primary pull-right">Add User</button></a>
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
          <th>{{ trans('messages.avatar') }}</th>
          <th>{{ trans('messages.email') }}</th>
          <th>{{ trans('messages.full_name') }}</th>
          <th>{{ trans('messages.created') }}</th>
          <th>{{ trans('messages.edit') }}</th>
          <th>{{ trans('messages.delete') }}</th>
        </tr>
        @foreach ($users as $user)
        <tr>
          <td>{{ $user->id}}</td>
          <td><img src=" {{ asset($user->path_avatar) }}" class="imagess" ></img></td>
          <td> {{ $user->email }} </td>
          <td> {{ $user->fullname }} </td>
          <td> {{ $user->created_at->diffForHumans() }} </td>
          <td><a href="{{ route("user.edit",$user->id)}}" ><button class="btn btn-link" ><i class="editu fa fa-edit"></i></button></a> </td>
          <td>  @if($user->id != Auth::user()->id)
                    {{ Form::open(array('url' => 'user/' . $user->id, )) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::button('<i class="deleteu fa fa-times"></i>', array('type' =>'submit','onclick' => 'return confirm("Do you want to delete ?")', 'class' => ' deleteu btn-link')) }}
                    {{ Form::close() }}
                @endif
          </td>
        </tr>
        @endforeach
        </tbody></table>
       {{ $users->links() }}
    </div>
@endsection
