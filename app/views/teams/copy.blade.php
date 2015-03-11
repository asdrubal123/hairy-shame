@extends('layouts.sidebar')

@section('content')

@include('includes.teamsmenu')


<h1>Edit {{ $team->name }}</h1>
<!-- if there are creation errors, they will show here -->
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

{{ Form::model($team, array('action' => array('TeamController@postCopy', $team->id))) }}
<div class="col-md-3">
<div class="form-group">
		{{ Form::label('name', 'Team') }}
		{{ Form::text('name', null, array('class' => 'form-control')) }}
	</div>
		<div class="form-group">
		{{ Form::label('status', 'Active') }}
		{{ Form::hidden('status', 0) }}
		{{ Form::checkbox('status', 1, true) }}
	</div>
		<div class="form-group">
		{{ Form::label('description', 'Description') }}
		{{ Form::text('description', null, array('class' => 'form-control')) }}
	</div>
		<div class="form-group">
		{{ Form::label('servicelevel', 'TeamSL') }}
		{{ Form::text('servicelevel', null, array('class' => 'form-control')) }}
	</div>
		<div class="form-group">
		{{ Form::label('customer', 'TeamCust') }}
		{{ Form::text('customer', null, array('class' => 'form-control')) }}
	</div>
		<div class="form-group">
		{{ Form::label('timetable', 'Working Hours') }}
		{{ Form::text('timetable', null, array('class' => 'form-control')) }}
	</div>
		<div class="form-group">
		{{ Form::label('phone', 'Phone') }}
		{{ Form::text('phone', null, array('class' => 'form-control')) }}
	</div>

		<div class="form-group">
		{{ Form::label('email', 'TeamEmail') }}
		{{ Form::text('email', null, array('class' => 'form-control')) }}
	</div>
		<div class="form-group">
		{{ Form::label('free1', 'TeamFree1') }}
		{{ Form::text('free1', null, array('class' => 'form-control')) }}
	</div>
    </div>
	<div class="col-md-3">

		<div class="form-group">
		{{ Form::label('e1_tl', 'EL1TL') }}
		{{ Form::text('e1_tl', null, array('class' => 'form-control')) }}
	</div>	<div class="form-group">
		{{ Form::label('e1_phone', 'EL1Phone') }}
		{{ Form::text('e1_phone', null, array('class' => 'form-control')) }}
	</div>
		<div class="form-group">
		{{ Form::label('e1_mobile', 'EL1Cell') }}
		{{ Form::text('e1_mobile', null, array('class' => 'form-control')) }}
	</div>
		<div class="form-group">
		{{ Form::label('e1_email1', 'EL1Email1') }}
		{{ Form::text('e1_email1', null, array('class' => 'form-control')) }}
	</div>
		<div class="form-group">
		{{ Form::label('e1_email2', 'EL1Email2') }}
		{{ Form::text('e1_email2', null, array('class' => 'form-control')) }}
	</div>
		<div class="form-group">
		{{ Form::label('e1_comments', 'EL1Comments') }}
		{{ Form::text('e1_comments', null, array('class' => 'form-control')) }}
	</div>

   


			<div class="form-group">
		{{ Form::label('e2_tl', 'EL2TL') }}
		{{ Form::text('e2_tl', null, array('class' => 'form-control')) }}
	</div>
		<div class="form-group">
		{{ Form::label('e2_phone', 'EL2Phone') }}
		{{ Form::text('e2_phone', null, array('class' => 'form-control')) }}
	</div>
	
		<div class="form-group">
		{{ Form::label('e2_mobile', 'EL2Cell') }}
		{{ Form::text('e2_mobile', null, array('class' => 'form-control')) }}
	</div>
		<div class="form-group">
		{{ Form::label('e2_email1', 'EL2Email1') }}
		{{ Form::text('e2_email1', null, array('class' => 'form-control')) }}
	</div>
		<div class="form-group">
		{{ Form::label('e2_email2', 'EL2Email2') }}
		{{ Form::text('e2_email2', null, array('class' => 'form-control')) }}
	</div>
		<div class="form-group">
		{{ Form::label('e2_comments', 'EL2Comments') }}
		{{ Form::text('e2_comments', null, array('class' => 'form-control')) }}
	</div>

    </div>
	<div class="col-md-3">

		<div class="form-group">
		{{ Form::label('e3_tl', 'EL3TL') }}
		{{ Form::text('e3_tl', null, array('class' => 'form-control')) }}
	</div>
		<div class="form-group">
		{{ Form::label('e3_phone', 'EL3Phone') }}
		{{ Form::text('e3_phone', null, array('class' => 'form-control')) }}
	</div>
	
		<div class="form-group">
		{{ Form::label('e3_mobile', 'EL3Cell') }}
		{{ Form::text('e3_mobile', null, array('class' => 'form-control')) }}
	</div>
		<div class="form-group">
		{{ Form::label('e3_email1', 'EL3Email1') }}
		{{ Form::text('e3_email1', null, array('class' => 'form-control')) }}
	</div>
		<div class="form-group">
		{{ Form::label('e3_email2', 'EL3Email2') }}
		{{ Form::text('e3_email2', null, array('class' => 'form-control')) }}
	</div>
		<div class="form-group">
		{{ Form::label('e3_comments', 'EL3Comments') }}
		{{ Form::text('e3_comments', null, array('class' => 'form-control')) }}
	</div>
   </div>
	<div class="col-md-3">


		<div class="form-group">
		{{ Form::label('global_comment', 'Comments') }}
		{{ Form::textarea('global_comment', null, array('class' => 'form-control')) }}
	</div>



	  <a href='{{URL::previous()}}' class='btn btn-default'><i class="fa fa-close fa-lg"></i> Cancel</a>
	{{ Form::button('<i class="fa fa-save fa-lg"></i> Save', array('type'=>'submit', 'class' => 'btn btn-primary')) }}


{{ Form::close() }}
</div>
</div>
</div>
</body>
</html>
@stop