@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="error-template">
                    <h1>
                        {{ trans('messages.oops') }}</h1>
                    <h2>
                        {{ trans('messages.404') }}</h2>
                    <div class="error-details">
                        {{ trans('messages.err_message') }}
                    </div>
                    <div class="error-actions">
                        <a href="http://www.jquery2dotnet.com" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
                            {{ trans('messages.take_me_home') }} </a><a href="http://www.jquery2dotnet.com" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-envelope"></span> {{ trans('messages.contact_support') }} </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

