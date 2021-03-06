@extends('layouts.default')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Password remider</h1>
            @if (Session::has('message'))
             <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif
            <div class="account-wall">
                <form action="{{ action('RemindersController@postRemind') }}" method="POST">
                    <input type="email" name="email">
                    <input type="submit" value="Send Reminder">
                </form>
        </div>
        </div>
    </div>
</div>
@stop