@extends('admin.admin')
@section('content')
    <div class="box-header">
        <h3 class="box-title"> {{ trans('messages.listuser') }}</h3>
        <div class="box-tools">
            <div class="input-group input-group-sm">
            </div>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
            <tbody><tr>
                <th> {{ trans('messages.id') }}</th>
                <th> {{ trans('messages.avatar') }}</th>
                <th> {{ trans('messages.email') }}</th>
                <th> {{ trans('messages.fullname') }}</th>
                <th> {{ trans('messages.created') }}</th>
            </tr>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td><img src=" {{ asset($user->getPathAvatar()) }}" with='50' height='50'></img></td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->fullname }}</td>
                <td>{{ $user->created_at->diffForHumans() }} </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
