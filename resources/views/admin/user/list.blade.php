@extends('admin.admin')
@section('content')
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
@endsection
