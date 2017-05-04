@extends('admin.admin')
@section('content')
<<<<<<< HEAD
            <div class="box-header">
              <h3 class="box-title">List User</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>ID</th>
                  <th>Avatar</th>
                  <th>Email</th>
                  <th>Full Name</th>
                  <th>Create At</th>
                </tr>
                @foreach($users as $user)
                <tr>
                  <td>{{$user->id}}</td>
                  <td><img src="{{ asset("../storage/app/avatar/$user->avatar")}}" with='50' height='50'></img></td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->fullname}}</td>
                  <td>{{$user->created_at->diffForHumans()}}</td>
                </tr>
                @endforeach
              </tbody></table>
            </div>
=======
    <div class="box-header">
        <h3 class="box-title"> {{ trans('messages.listuser') }}</h3>
      <a href="{{ route('users.create') }}" ><button class="btn btn-primary pull-right">Add User</button></a>
      @if (session('status'))
         <div class="alert alert-success alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a>
          {{ session('status') }}
        </div>
      @endif
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
>>>>>>> 56a320d84410206638ab526a7c1020d24e733688
@endsection
