@extends('layouts.sidebar')

@section('content')
<div class="col-md-10">

	<div id="admin">
		<h2>Countries Admin Panel</h2>

		@if (Session::has('message'))
		<div class="alert alert-info">{{ Session::get('message') }}</div>
		@endif
	
		<ul class="show-info">
			@foreach($countries as $country)
				<li>
					<div class="form-horizontal">
			 		{{ Form::open(array('url'=>'admin/countries/edit', 'class'=>'form-inline')) }}
			 		{{ $country->id }}
					{{ Form::hidden('id', $country->id) }}

					{{ Form::text('name', $country->name, array('class' => 'form-control')) }}
			
					{{ Form::button('<i class="fa fa-edit fa-lg"></i> Edit', array('type' => 'submit', 'class' => 'btn btn-primary')) }}
                    {{ Form::close() }}


                    {{ Form::open(array('url'=>'admin/countries/destroy', 'class'=>'form-inline')) }}
					{{ Form::hidden('id', $country->id) }}
					{{ Form::button('<i class="fa fa-trash fa-lg"></i> Delete', array('type' => 'submit', 'class' => 'btn btn-warning')) }}
					{{ Form::close() }}
					</div>
				</li>
			@endforeach
		</ul>
	 

		<h2>Add new country</h2>

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

		{{ Form::open(array('url'=>'admin/countries/create', 'class'=>'form-inline')) }}
		<div class="form-horizontal">
			{{ Form::label('name') }}
			{{ Form::text('name','', array('class' => 'form-control')) }}
		
			{{ Form::button('<i class="fa fa-plus fa-lg"></i> Create Country', array('type' => 'submit', 'class'=>'btn btn-primary')) }}
			{{ Form::close() }}
		</div>


	</div><!--end admin-->
</div>
@stop