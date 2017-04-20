@extends('admin.admin')
@section('content')
    <div class="box-header">
      <h3 class="box-title"> @lang('messages.listuser') </h3>
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
          <th> @lang('messages.fullname') </th>
          <th> @lang('messages.created') </th>
        </tr>
        @foreach ($users as $user)
        <tr>
          <td>{{$user->id}}</td>
          <td><img src=" {{ asset($user->getPathAvatar())}}" with='50' height='50'></img></td>
          <td> {{$user->email}} </td>
          <td> {{$user->fullname}} </td>
          <td> {{$user->created_at->diffForHumans()}} </td>
        </tr>
        @endforeach
      </tbody></table>
    </div>
@endsection
