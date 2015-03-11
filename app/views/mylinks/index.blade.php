@extends('layouts.sidebar')

@section('content')
<div class="col-md-10">

	<div id="admin">
		<h2>My Links Panel</h2>

		@if (Session::has('message'))
		<div class="alert alert-info">
			 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			{{ Session::get('message') }}</div>
		@endif
	
		 
		<div class="col-md-4">
		<h2>Add new link</h2>

		@if($errors->has())
		<div id="form-errors" class="alert alert-danger">
			<p>The following errors have occured:</p>

			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div><!--end form-errors -->
		@endif

		{{ Form::open(array('url'=>'mylinks/create', 'class'=>'')) }}
		<div class="form-group">
			{{ Form::label('name', 'Name') }}
			{{ Form::text('name','', array('class' => 'form-control', 'placeholder'=>'Name')) }}
		    </div>
			<div class="form-group">
		    {{ Form::hidden('status', '0') }}

			{{ Form::label('url', 'URL') }}
			{{ Form::text('url','', array('class' => 'form-control', 'placeholder'=>'Starting with http://')) }}
		</div>
		<div class="form-group">
			{{ Form::button('<i class="fa fa-plus fa-lg"></i> Save', array('type' => 'submit', 'class'=>'btn btn-primary')) }}
			{{ Form::close() }}
		</div>
		</div>
		<div class="col-md-8" id="links-table">
        @include('mylinks.list')
    	</div>


	</div><!--end admin-->
</div>
@stop