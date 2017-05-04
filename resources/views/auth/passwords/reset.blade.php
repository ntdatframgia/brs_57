@extends('layouts.app')

@section('content')
<<<<<<< HEAD
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

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

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
=======
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('messages.reset_password') }}</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        {!! Form::open([
                            'class' => 'form-horizontal',
                            'role' => 'form',
                            'method' => 'POST',
                            'action' => 'Auth\ResetPasswordController@reset',
                        ]) !!}
                        {!! Form::hidden('tokem', $token) !!}
                        <div class="{!! Form::showErrClass('email') !!}">
                            {!! Form::label('email', trans('messages.email'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::email('email', old('value'), [
                                    'class' => 'form-control',
                                    'id' => 'email',
                                    'required', 'autofocus',
                                ]) !!}
                                {!! Form::showErrField('email') !!}
                            </div>
                        </div>

                        <div class="{!! Form::showErrClass('password') !!}">
                            {!! Form::label('email', trans('email'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::password('password', null, [
                                    'class' => 'form-control',
                                    'id' => 'password',
                                    'required',
                                ]) !!}
                                {!! Form::showErrField('password') !!}
                            </div>
                        </div>

                        <div class="{!! Form::showErrClass('password_confirmation') !!}">
                            {!! Form::label('confirm_password', trans('messages.confirm_password'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::password('password_confirmation', null, [
                                    'class' => 'form-control',
                                    'id' => 'password_confirm',
                                    'required',
                                ]) !!}
                                {!! Form::showErrField('password_confirmation') !!}
>>>>>>> 56a320d84410206638ab526a7c1020d24e733688
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
<<<<<<< HEAD
                                <button type="submit" class="btn btn-primary">
                                    Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
=======
                                {!! Form::submit(trans('messages.reset_password'), ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                        {{ Form::close() }}
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
