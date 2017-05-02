@extends('frontend.master')
@section('content')
<div class="container">
    <h1>{{trans('messages.request_new_book')}}</h1>
    <hr>
    <div class="row">
            <div class="col-md-7 personal-info">
              {!! Form::open([
                  'class' => 'form-horizontal',
                  'role' => 'form',
                  'files' => true,
                  'method' => 'POST',
                  'action' => 'RequestBookController@store',
              ]) !!}

                  <div class="{!! Form::showErrClass('name') !!}">
                        {!! Form::label('name', trans('messages.book_name'), ['class'=> 'col-md-4 control-label']) !!}
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
                  <input name="userId" type="hidden" value="{{Auth::user()->id }}">
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

