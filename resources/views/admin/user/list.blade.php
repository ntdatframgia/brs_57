@extends('admin.admin')
@section('content')
    <div class="box-header">
      <h3 class="box-title"> @lang('messages.list_user') </h3>
      <a href="{{ route('users.create') }}" ><button class="btn btn-primary pull-right">Add User</button></a>
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
          <th> @lang('messages.id') </th>
          <th> @lang('messages.avatar') </th>
          <th> @lang('messages.email') </th>
          <th> @lang('messages.full_name') </th>
          <th> @lang('messages.created') </th>
          <th> @lang('messages.edit') </th>
          <th> @lang('messages.delete') </th>
        </tr>
        @foreach ($users as $user)
        <tr>
          <td>{{$user->id}}</td>
          <td><img src=" {{ asset($user->getPathAvatar())}}" class="imagess" ></img></td>
          <td> {{$user->email}} </td>
          <td> {{$user->fullname}} </td>
          <td> {{$user->created_at->diffForHumans()}} </td>
          <td><a href="{{ route("users.edit",$user->id)}}" ><button class="btn btn-link" ><i class="editu fa fa-edit"></i></button></a> </td>
          <td>   {{ Form::open(array('url' => 'users/' . $user->id, )) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::button('<i class="deleteu fa fa-times"></i>', array('type' =>'submit','onclick' => 'return confirm("Do you want to delete ?")', 'class' => ' deleteu btn-link')) }}
                {{ Form::close() }}

          </td>
        </tr>
        @endforeach
      </tbody></table>
    </div>
@endsection
