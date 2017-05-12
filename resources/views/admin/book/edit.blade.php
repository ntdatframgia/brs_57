@extends('admin.admin')
@section('content')
<div class="container">
    <h1>@lang('messages.edit_book')</h1>
    <hr>
    <div class="row">
            <div class="col-md-7 personal-info">
              {!! Form::model($book,[
                  'class' => 'form-horizontal',
                  'role' => 'form',
                  'files' => true,
                  'method' => 'PUT',
                  'action' => ['BookController@update',$book->id],
              ]) !!}

                  <div class="{!! Form::showErrClass('category_id') !!}">
                      {!! Form::label('category_id', trans('messages.parent_category'), ['class'=> 'col-md-4 control-label']) !!}
                      <div class="col-md-7">
                          {!! Form::select('category_id', $listCate, null,['placeholder' => '-- Root --', 'class' => 'form-control']) !!}
                          {!! Form::showErrField('category_id') !!}
                      </div>
                  </div>
                  <div class="{!! Form::showErrClass('name') !!}">
                      {!! Form::label('title', trans('messages.book_name'), ['class'=> 'col-md-4 control-label']) !!}
                      <div class="col-md-7">
                          {!! Form::text('title', null, [
                              'class' => 'form-control',
                              'id' => 'title',
                              'required',
                              'autofocus'
                          ]) !!}
                          {{ Form::showErrField('title') }}
                      </div>
                  </div>
                  <div class="{!! Form::showErrClass('author') !!}">
                      {!! Form::label('author', trans('messages.author'), ['class'=> 'col-md-4 control-label']) !!}
                      <div class="col-md-7">
                          {!! Form::text('author', null, [
                              'class' => 'form-control',
                              'id' => 'author',
                              'required',
                              'autofocus'
                          ]) !!}
                          {{ Form::showErrField('author') }}
                      </div>
                  </div>
                  <div class="{!! Form::showErrClass('description') !!}">
                      {!! Form::label('description', trans('messages.book_description'), ['class'=> 'col-md-4 control-label']) !!}
                      <div class="col-md-7">
                          {!! Form::textarea('description', null, [
                              'class' => 'form-control',
                              'id' => 'description',
                              'required',
                              'autofocus'
                          ]) !!}
                          {{ Form::showErrField('description') }}
                      </div>
                  </div>
                  <div class=" {!! Form::showErrClass('public_date') !!}">
                      {!! Form::label('public_date', trans('messages.public_date'), ['class'=> 'col-md-4 control-label']) !!}
                        <div class="col-md-7 ">
                          {!! Form::text('public_date', null, [
                              'class' => 'form-control',
                              'id' => 'datepicker',
                              'required',
                              'autofocus'
                          ]) !!}
                          {{ Form::showErrField('public_date') }}
                      </div>
                  </div>
                  <div class="{!! Form::showErrClass('number_of_page') !!}">
                      {!! Form::label('number_of_page', trans('messages.number_of_page'),
                          ['class' => 'col-md-4 control-label']) !!}
                      <div class="col-md-7">
                          {!! Form::input('number','number_of_page', null,[
                              'class' => 'form-control',
                              'id' => 'number_of_page',
                          ]) !!}
                          {!! Form::showErrField('number_of_page') !!}
                      </div>
                  </div>
                  <div class="{!! Form::showErrClass('img') !!}">
                      {!! Form::label('Image', trans('messages.img'),
                          ['class' => 'col-md-4 control-label']) !!}
                      <div class="col-md-7">
                          {!! Form::file('img', [
                              'class' => 'form-control',
                              'id' => 'img',
                          ]) !!}
                          {!! Form::showErrField('img') !!}
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
