@extends('admin.admin')
@section('content')
<div class="container">
    <h1>@lang('messages.add_book')</h1>
    <hr>
    <div class="row">
            <div class="col-md-7 personal-info">
              {!! Form::open([
                  'class' => 'form-horizontal',
                  'role' => 'form',
                  'files' => true,
                  'method' => 'POST',
                  'action' => 'BookController@store',
              ]) !!}

                  <div class="{!! Form::showErrClass('parent') !!}">
                      {!! Form::label('parent_id', trans('messages.parent_category'), ['class'=> 'col-md-4 control-label']) !!}
                      <div class="col-md-7">
                          {!! Form::select('category_id', $listCate, null,['class' => 'form-control']) !!}
                          {{ Form::showErrField('parent') }}
                      </div>
                  </div>
                  <div class="{!! Form::showErrClass('title') !!}">
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
                      {!! Form::label('public_date', trans('messages.public_date'), ['required' => 'required', 'class'=> 'col-md-4 control-label']) !!}
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
                  <div class="{!! Form::showErrClass('number') !!}">
                      {!! Form::label('number_of_page', trans('messages.number_of_page'),
                          ['class' => 'col-md-4 control-label']) !!}
                      <div class="col-md-7">
                          {!! Form::input('number','number_of_page',null,[
                              'class' => 'form-control',
                              'id' => 'number_of_page',
                          ]) !!}
                          {!! Form::showErrField('number_of_page') !!}
                      </div>
                  </div>
                  <div class="{!! Form::showErrClass('img') !!}">
                      {!! Form::label('img', trans('messages.img'),
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
                          {!! Form::submit(trans('messages.add_book'), ['class' => 'btn btn-primary']) !!}
                      </div>
                  </div>
                  {!! Form::close() !!}
              </div>
          </div>
    <hr>
</div>
@endsection
