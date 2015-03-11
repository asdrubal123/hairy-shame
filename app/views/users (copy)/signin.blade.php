@extends('layouts.default')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Sign in to admin panel</h1>
            @if (Session::has('message'))
             <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif
            <div class="account-wall">
                {{ HTML::image('img/WP_20141009_005.jpg', '', array('class'=>'profile-img')) }}
                {{ Form::open(array('url'=>'admin/users/signin', 'class'=>'form-signin')) }}
                {{ Form::text('email', '', array('class'=>'form-control', 'placeholder'=>'Email')) }}
                {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
                {{ Form::button('Sign In', array('type'=>'submit', 'class'=>'btn btn-lg btn-primary btn-block')) }}
                {{ Form::close() }}
        </div>
        </div>
    </div>
</div>
@stop