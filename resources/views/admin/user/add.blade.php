@extends('admin.admin')
@section('content')
<div class="container">
    <h1>@lang('messages.register')</h1>
    <hr>
    <div class="row">
            <div class="col-md-7 personal-info">
              {!! Form::open([
                  'class' => 'form-horizontal',
                  'role' => 'form',
                  'files' => true,
                  'method' => 'POST',
                  'action' => 'UserController@store',
              ]) !!}
                  <div class="{!! Form::showErrClass('fullname') !!}">
                      {!! Form::label('fullname', trans('messages.full_name'), ['class'=> 'col-md-4 control-label']) !!}
                      <div class="col-md-7">
                          {!! Form::text('fullname', null, [
                              'class' => 'form-control',
                              'id' => 'fullname',
                              'required',
                              'autofocus'
                          ]) !!}
                          {{ Form::showErrField('fullname') }}
                      </div>
                  </div>

                  <div class="{!! Form::showErrClass('email') !!}">
                      {!! Form::label('email', trans('messages.email'), ['class'=> 'col-md-4 control-label']) !!}

                      <div class="col-md-7">
                          {!! Form::email('email', null, [
                              'class' => 'form-control',
                              'id' => 'email',
                              'required',
                          ]) !!}
                          {!! Form::showErrField('email') !!}
                      </div>
                  </div>

                  <div class="{!! Form::showErrClass('password') !!}">
                      {!! Form::label('password', trans('messages.password'),
                          ['class' => 'col-md-4 control-label']) !!}
                      <div class="col-md-7">
                          {!! Form::password('password', [
                              'class' => 'form-control',
                              'id' => 'password',
                          ]) !!}
                          {!! Form::showErrField('password') !!}
                      </div>
                  </div>

                  <div class="form-group">
                      {!! Form::label('password-confirm', trans('messages.confirm_password'),
                          ['class' => 'col-md-4 control-label']) !!}

                      <div class="col-md-7">
                          {!! Form::password('password_confirmation', [
                              'class' => 'form-control',
                              'id' => 'password-confirm',
                          ]) !!}
                      </div>
                  </div>
                  <div class="form-group">
                      {!! Form::label('Avatar', trans('messages.avatar'),
                          ['class' => 'col-md-4 control-label']) !!}

                      <div class="col-md-7">
                          {!! Form::file('avatar', [
                              'class' => 'form-control',
                              'id' => 'avatar',
                          ]) !!}
                      </div>
                  </div>

                  <div class="form-group">
                      <div class="col-md-7 col-md-offset-4">
                          {!! Form::submit(trans('messages.register'), ['class' => 'btn btn-primary']) !!}
                      </div>
                  </div>
                  {!! Form::close() !!}
              </div>
          </div>
    <hr>
</div>
@endsection
