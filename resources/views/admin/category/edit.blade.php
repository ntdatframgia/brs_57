@extends('admin.admin')
@section('content')
<div class="container">
    <h1>@lang('messages.edit') : {{ $category->name }}</h1>
    <hr>
    <div class="row">
            <div class="col-md-7 personal-info">
              {!! Form::model($category,[
                  'class' => 'form-horizontal',
                  'role' => 'form',
                  'method' => 'PUT',
                  'action' => ['CategoryController@update',$category->id],
              ]) !!}
                  <div class="{!! Form::showErrClass('parent') !!}">
                      {!! Form::label('parent', trans('messages.parent_category'), ['class'=> 'col-md-4 control-label']) !!}
                      <div class="col-md-7">
                          <select name="parent" class ="form-control" id="parent" autofocus >
                              <option value="0">Please Choose Parent Category</option>
                              <?php saiki_category($listcate, 0, '--', $category->parent_id);?>
                          </select>
                          {{ Form::showErrField('parent') }}
                      </div>
                  </div>

                  <div class="{!! Form::showErrClass('name') !!}">
                      {!! Form::label('name', trans('messages.category_name'), ['class'=> 'col-md-4 control-label']) !!}
                      <div class="col-md-7">
                          {!! Form::text('name', null, [
                              'class' => 'form-control',
                              'id' => 'name',
                              'required',
                              'autofocus'
                          ]) !!}
                          {{ Form::showErrField('name') }}
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="col-md-7 col-md-offset-4">
                          {!! Form::submit(trans('messages.update'), ['class' => 'btn btn-primary']) !!}
                      </div>
                  </div>
                  {!! Form::close() !!}
              </div>
          </div>
    <hr>
</div>
@endsection
