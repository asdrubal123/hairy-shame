@extends('layouts.sidebar')

@section('content')

@include('includes.teamsmenu')

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

@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

{{ Form::open(array('url'=>'admin/teams/import','files'=>true)) }}
<div class="form-group">
{{ Form::label('file', 'Upload') }}
{{ Form::file('file') }}

{{ Form::button('<i class="fa fa-save fa-lg"></i> Save', array('type'=>'submit', 'class' => 'btn btn-primary')) }}

{{ Form::button('<i class="fa fa-close fa-lg"></i> Reset', array('type'=>'reset', 'class' => 'btn btn-primary')) }}

  
{{ Form::close() }}
</div>
@stop