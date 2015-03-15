@extends('layouts.sidebar')

@section('content')
<div class="col-md-10">

	<div id="admin">
		<h2>Users Admin Panel</h2>

		<div id="info-errors" class="alert alert-danger hidden">
			

		</div><!--end form-errors -->



		<div id="info-success" class="alert alert-info hidden"></div>
	

	 
		<div class="col-md-4">
		<h2>Add new user</h2>


	
		{{ Form::open(array('class'=>'', 'id'=>'create-user-form')) }}
			<div class="form-group">

			{{ Form::text('firstname', '', array('class' => 'form-control', 'placeholder'=>'Firstname')) }}
			</div>
			<div class="form-group">
			{{ Form::text('lastname', '', array('class' => 'form-control', 'placeholder'=>'Lastname')) }}
			</div>
			<div class="form-group">
	
			{{ Form::text('email', '', array('class' => 'form-control', 'placeholder'=>'Email')) }}
			</div>
			<div class="form-group">
		
			{{ Form::password('password', array('class' => 'form-control', 'placeholder'=>'Password')) }}
			</div>
			<div class="form-group">

			{{ Form::password('password_confirmation', array('class' => 'form-control', 'placeholder'=>'Confirmation')) }}
			</div>
			<div class="form-group">
	
			{{ Form::select('admin', array('1'=>'Admin', '0'=>'User'), '', array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
			{{ Form::button('<i class="fa fa-save fa-lg"></i> Add User', array('type' => 'submit', 'class'=>'btn btn-primary')) }}
			</div>
		{{ Form::close() }}
			</div>
		<div class="col-md-8" id="users-table">
			 @include('users.list')
    	</div>

	</div><!--end admin-->
</div>
{{ HTML::script('js/users.js') }}
@stop