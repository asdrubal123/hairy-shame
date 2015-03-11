@extends('layouts.sidebar')

@section('content')
<div class="col-md-10">

	<div id="admin">
		<h2>Links Admin Panel</h2>
		<div id="info-errors" class="alert alert-danger hidden">
			

		</div><!--end form-errors -->



		<div id="info-success" class="alert alert-info hidden"></div>


    	<div class="col-md-4">
		<h2>Add new link</h2>




		{{ Form::open(array('id'=>'create-link-form')) }}
	
		<div class="form-group">
			{{ Form::label('name', 'Name') }}
			{{ Form::text('name','', array('class' => 'form-control', 'placeholder'=>'Name')) }}
		    </div>
			<div class="form-group">
		    {{ Form::hidden('status', '1') }}

			{{ Form::label('url', 'URL') }}
			{{ Form::text('url','', array('class' => 'form-control', 'placeholder'=>'Starting with http://')) }}
		</div>
		<div class="form-group">
			{{ Form::button('<i class="fa fa-save fa-lg"></i> Save', array('type' => 'submit', 'class'=>'btn btn-primary')) }}
			{{ Form::close() }}
		</div>
	

		</div>
		<div class="col-md-8" id="links-table">
        @include('links.list')
    	</div>
	</div><!--end admin-->
</div>

{{ HTML::script('js/links.js') }}
@stop