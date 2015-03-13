@extends('layouts.sidebar')

@section('content')
<div class="col-md-10">

	<div id="admin">

		@if (Session::has('message'))
		<div class="alert alert-info">
			 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			{{ Session::get('message') }}</div>
		@endif
	
		 
		<h2>{{ $user->firstname }} {{ $user->lastname }}</h2>

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
		<div class="col-md-4">
			{{ $user->email }}
		</div>
		<div class="col-md-8">
        @include('computers.listmy')
    	</div>


	</div><!--end admin-->
</div>
@stop