@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('messages.register') }}</div>
                    <div class="panel-body">
                        {!! Form::open([
                            'class' => 'form-horizontal',
                            'role' => 'form',
                            'files' => true,
                            'method' => 'POST',
                            'action' => 'Auth\RegisterController@register'
                        ]) !!}
                            <div class="{!! Form::showErrClass('fullname') !!}">
                                {!! Form::label('fullname', trans('messages.full_name'), ['class'=> 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
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

                                <div class="col-md-6">
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
                                {!! Form::label('password-confirm', trans('messages.confirm_password'),
                                    ['class' => 'col-md-4 control-label']) !!}

                                <div class="col-md-6">
                                    {!! Form::password('password_confirmation', [
                                        'class' => 'form-control',
                                        'id' => 'password-confirm',
                                        'required',
                                    ]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('Avatar', trans('messages.avatar'),
                                    ['class' => 'col-md-4 control-label']) !!}

                                <div class="col-md-6">
                                    {!! Form::file('avatar', [
                                        'class' => 'form-control',
                                        'id' => 'avatar',
                                        'required',
                                    ]) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    {!! Form::submit(trans('messages.register'), ['class' => 'btn btn-primary']) !!}
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
