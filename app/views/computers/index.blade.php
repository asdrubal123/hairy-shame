@extends('layouts.sidebar')

@section('content')
<div class="col-md-10">

	<div id="admin">
		<h2>sdAssets Admin Panel</h2>
		<div id="info-errors" class="alert alert-danger hidden">
			

		</div><!--end form-errors -->



		<div id="info-success" class="alert alert-info hidden"></div>


    	<div class="col-md-4">
		<h2>Add new</h2>




		{{ Form::open(array('id'=>'create-computer-form')) }}
	
		<div class="form-group">
			{{ Form::label('sn', 'Serial Number') }}
			{{ Form::text('sn','', array('class' => 'form-control', 'placeholder'=>'Serial Number')) }}
		</div>
		<div class="form-group">
			{{ Form::label('cgito', 'CG-ITO') }}
			{{ Form::text('cgito','', array('class' => 'form-control', 'placeholder'=>'CG-ITO')) }}
		</div>
		<div class="form-group">
			{{ Form::label('other', 'Other') }}
			{{ Form::text('other','', array('class' => 'form-control', 'placeholder'=>'extension, hostname etc')) }}
		</div>
		<div class="form-group">
			{{ Form::label('make', 'Make') }}
			<!--{{ Form::text('make','', array('class' => 'form-control', 'placeholder'=>'Make')) }}-->
			{{ Form::select('make', array('' => '') + $makers, null, ['class' => 'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::label('model', 'Model') }}
			<!--{{ Form::text('model','', array('class' => 'form-control', 'placeholder'=>'Model')) }}-->
			{{ Form::select('model', array(''=>'Please choose manufacturer first'), '', array('class' => 'form-control')) }}
		</div>
<!--		<div class="form-group">
			{{ Form::label('type', 'Type') }}
			{{ Form::select('type', array('0'=>'VDI', '1' => 'Laptop', '2' => 'Desktop'), '', array('class' => 'form-control')) }}
		</div>
	-->
		<div class="form-group">
			{{ Form::label('ownership', 'Owner') }}
			{{ Form::select('ownership', array('0'=>'Capgemini', '1' => 'Schneider'), '', array('class' => 'form-control combobox')) }}
		</div>
		<div class="form-group">
			{{ Form::label('user_id', 'Assigned To') }}
			{{ Form::select('user_id', array('' => '') + $users, null, ['class' => 'form-control combobox']) }}
		</div>
		<div class="form-group">
			{{ Form::label('comments', 'Comments') }}
			{{ Form::textarea('comments','', array('class' => 'form-control')) }}

		</div>

		<div class="form-group">
			{{ Form::button('<i class="fa fa-save fa-lg"></i> Save', array('type' => 'submit', 'class'=>'btn btn-primary')) }}
			{{ Form::close() }}
		</div>
	

		</div>
		<div class="col-md-8" id="computers-table">
        @include('computers.list')
    	</div>
	</div><!--end admin-->
</div>

{{ HTML::script('js/computers.js') }}
@stop