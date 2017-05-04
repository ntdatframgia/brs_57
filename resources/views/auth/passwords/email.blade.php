<<<<<<< HEAD
@extends('layouts.app')

@section('content')
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

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
=======

@extends('layouts.app')

@section('content')
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
                            'method'=> 'POST',
                            'role' => 'form',
                            'class' => 'form-horizontal',
                            'action' => 'Auth\ForgotPasswordController@sendResetLinkEmail',
                        ]) !!}
                        <div class="{!! Form::showErrClass('email') !!}">
                            {!! Form::label('email', trans('messages.email'),
                                [ 'class' => 'col-md-4 control-label', ]) !!}
                            <div class="col-md-6">
                                {!! Form::email('email', old('email'), [
                                    'class' => 'form-control',
                                    'id' => 'email',
                                    'required',
                                ]) !!}
                                {!! Form::showErrField('email') !!}
>>>>>>> 56a320d84410206638ab526a7c1020d24e733688
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
<<<<<<< HEAD
                                <button type="submit" class="btn btn-primary">
                                    Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </form>
=======
                                {!! Form::submit(trans('messages.send_reset_link'), ['class' => 'btn btn-primary']) !!}
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
