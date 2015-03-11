@extends('layouts.sidebar')

@section('content')

@include('includes.applicationsmenu')

<h1>Copy {{ $application->name }}</h1>

<!-- if there are creation errors, they will show here -->
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
<div class="row">
{{ Form::model($application, array('action' => array('ApplicationController@postCopy', $application->id))) }}


@include('applications.partials._copyeditform')

@stop
@section('pagejs')
<script type="text/javascript">
  $(document).ready(function(){
    $('.combobox').combobox();
  });


</script>
@stop