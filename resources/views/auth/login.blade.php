@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('messages.login') }}</div>
                    <div class="panel-body">
                        {!! Form::open([
                            'class' => 'form-horizontal',
                            'role' => 'form',
                            'method' => 'POST',
                            'action' => 'Auth\LoginController@login',
                        ]) !!}

                            <div class="{!! Form::showErrClass('email') !!}">
                                {!! Form::label('email', trans('messages.email'), ['class' => 'col-md-4 control-label', ]) !!}
                                <div class="col-md-6">
                                    {!! Form::email('email', old('email'), [
                                        'class' => 'form-control',
                                        'id' => 'email',
                                        'required',
                                        'autofocus',
                                    ]) !!}
                                    {!! Form::showErrField('email') !!}
                                </div>
                            </div>

                            <div class="{!! Form::showErrClass('password') !!}">
                                {!! Form::label('password', trans('messages.password'), ['class' => 'col-md-4 control-label', ]) !!}
                                <div class="col-md-6">
                                    {!! Form::password('password', [
                                        'class' => 'form-control',
                                        'id' => 'password',
                                        'required',
                                    ]) !!}
                                    {!! Form::showErrField('password') !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            {!! Form::checkbox('remember') !!} {{ trans('messages.remember_me') }}
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-offset-7">
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ trans('messages.forgot_password') }}
                                    </a>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    {!! Form::submit('Login', ['class' => 'btn btn-primary btn-raised']) !!}
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
