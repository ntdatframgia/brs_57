@extends('admin.admin')
@section('content')
    <div class="box-header">
        <h3 class="box-title"> @lang('messages.list_category') </h3>
        <a href="{{ route('category.create') }}" ><button class="btn btn-primary pull-right">Add category</button></a>
        @if (session('status'))
        <div class="fixsome alert {{session('flag')}} alert-dismissable col-sm-7 pull-right ">
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
            <tbody>
                <tr>
                    <th> @lang('messages.category_name') </th>
                    <th> @lang('messages.deleted_at') </th>
                    <th> @lang('messages.restore') </th>
                </tr>
                 @foreach ($items as $item)
                    @if($item->deleted_at)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->deleted_at}}</td>
                            <td><a href="{{ route('category.restore',$item->id)}}"><i class="fa fa-upload" aria-hidden="true"></i></td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
