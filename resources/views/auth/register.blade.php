@extends('layouts.app')

@section('content')
<<<<<<< HEAD
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
                            <label for="fullname" class="col-md-4 control-label">Full Name</label>

                            <div class="col-md-6">
                                <input id="fullname" type="text" class="form-control" name="fullname" value="{{ old('fullname') }}" required autofocus>

                                @if ($errors->has('fullname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fullname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="avatar" class="col-md-4 control-label">Avatar</label>

                            <div class="col-md-6">
                                <input id="avatar" type="file" class="form-control" name="avatar" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
=======
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
>>>>>>> 56a320d84410206638ab526a7c1020d24e733688
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD
</div>
=======
>>>>>>> 56a320d84410206638ab526a7c1020d24e733688
@endsection
