@extends('layouts.sidebar')

@section('content')
<div class="col-md-10">

	<div id="admin">
		<h2>Users Admin Panel</h2>

		@if (Session::has('message'))
		<div class="alert alert-info">{{ Session::get('message') }}</div>
		@endif
	
		<ul class="show-info">
			@foreach($users as $user)
				<li>
			 		{{ Form::open(array('url'=>'admin/users/edit', 'class'=>'form-inline')) }}
					<div class="form-horizontal">
					{{ Form::hidden('id', $user->id) }}
					
					{{ Form::text('firstname', $user->firstname, array('class' => 'form-control')) }}
					
					
				
					{{ Form::text('lastname', $user->lastname, array('class' => 'form-control')) }}
				
					{{ Form::text('email', $user->email, array('class' => 'form-control')) }}
			
					{{ Form::select('admin', array('1'=>'Admin', '0'=>'User'), $user->admin, array('class' => 'form-control')) }}
				
					{{ Form::button('<i class="fa fa-edit fa-lg"></i> Edit', array('type' => 'submit', 'class' => 'btn btn-primary')) }}
                    {{ Form::close() }}


                    {{ Form::open(array('url'=>'admin/users/email', 'class'=>'form-inline')) }}
					{{ Form::hidden('id', $user->id) }}
					{{ Form::button('<i class="fa fa-envelope fa-lg"></i> Email', array('type' => 'submit', 'class' => 'btn btn-info')) }}
					{{ Form::close() }}

                    {{ Form::open(array('url'=>'admin/users/destroy', 'class'=>'form-inline')) }}
					{{ Form::hidden('id', $user->id) }}
					{{ Form::button('<i class="fa fa-trash fa-lg"></i> Delete', array('type' => 'submit', 'class' => 'btn btn-warning')) }}
					{{ Form::close() }}
					</div>
				</li>
			@endforeach
		</ul>
	 

		<h2>Add new user</h2>

		@if($errors->has())
		<div id="form-errors" class="alert alert-info">
			<p>The following errors have occured:</p>

			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div><!--end form-errors -->
		@endif
	
		{{ Form::open(array('url'=>'admin/users/create', 'class'=>'form-inline')) }}
			<div class="form-horizontal">

			{{ Form::text('firstname', '', array('class' => 'form-control', 'placeholder'=>'Firstname')) }}
	
			{{ Form::text('lastname', '', array('class' => 'form-control', 'placeholder'=>'Lastname')) }}
		
	
			{{ Form::text('email', '', array('class' => 'form-control', 'placeholder'=>'Email')) }}
		
		
			{{ Form::password('password', array('class' => 'form-control', 'placeholder'=>'Password')) }}
		

			{{ Form::password('password_confirmation', array('class' => 'form-control', 'placeholder'=>'Confirmation')) }}
		
	
			{{ Form::select('admin', array('1'=>'Admin', '0'=>'User'), '', array('class' => 'form-control')) }}
			
			{{ Form::button('<i class="fa fa-plus fa-lg"></i> Add User', array('type' => 'submit', 'class'=>'btn btn-primary')) }}
			</div>
		{{ Form::close() }}
	

	</div><!--end admin-->
</div>
@stop