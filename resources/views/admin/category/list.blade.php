@extends('admin.admin')
@section('content')
    <div class="box-header">
        <h3 class="box-title"> {{ trans('messages.list_category') }}</h3>
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
            <tbody><tr>
                <th> {{ trans('messages.category_name') }}</th>
                <th> {{ trans('messages.created') }}</th>
                <th> {{ trans('messages.edit') }}</th>
                <th> {{ trans('messages.delete') }}</th>
                </tr>
                @include('admin.category.recursive', [
                    'categories' => $categories,
                    'parentId' => 0,
                    'str' => '',
                ])
            </tbody>
        </table>
    </div>
@endsection
