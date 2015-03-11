@extends('layouts.sidebar')

@section('content')

@include('includes.assetsmenu')



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
	<div class='row'>
		
			{{ Form::open(array('url' => 'admin/assets')) }}
			<div class='col-md-3'>
			<div class='form-group'>
				<!-- `Name` Field -->
				{{ Form::label('name', 'Name') }}
				{{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
			</div>
			<div class='form-group'>
				<!-- `Status` Field -->
				{{ Form::label('status', 'Active') }}
				{{ Form::hidden('status', 0) }}
				{{ Form::checkbox('status', 1, true) }}
			</div>
			<div class='form-group'>
				<!-- `Description` Field -->
				{{ Form::label('description', 'Description') }}
				{{ Form::text('description', Input::old('description'), array('class'=>'form-control')) }}
			</div>
			<div class='form-group'>
				<!-- `Site` Field -->
				{{ Form::label('site', 'Site') }}
				{{ Form::text('site', Input::old('site'), array('class'=>'form-control')) }}
			</div>
			<div class='form-group'>
				<!-- `Country id` Field -->
				{{ Form::label('country_id', 'Country') }}
				{{ Form::select('country_id', array('' => '') + $countries, null, array('class' => 'form-control combobox')) }}
			</div>
			<div class='form-group'>
				<!-- `Priority id` Field -->
				{{ Form::label('priority_id', 'Priority') }}
				{{ Form::select('priority_id', array('' => '') + $priorities, null, array('class' => 'form-control combobox')) }}
			</div>
			<div class='form-group'>
				<!-- `Responsible` Field -->
				{{ Form::label('responsible', 'Responsible') }}
				{{ Form::text('responsible', Input::old('responsible'), array('class'=>'form-control')) }}
			</div>
			<div class='form-group'>
				<!-- `Responsible date` Field -->
				{{ Form::label('responsible_date', 'Responsible date') }}
				{{ Form::text('responsible_date', Input::old('responsible_date'), array('class'=>'form-control', 'placeholder'=>'yyyy/mm/dd')) }}
			</div>
			<div class='form-group'>
				<!-- `Categorization` Field -->
				{{ Form::label('categorization', 'Categorization') }}
				{{ Form::text('categorization', Input::old('categorization'), array('class'=>'form-control')) }}
			</div>
			<div class='form-group'>
				<!-- `Documentation` Field -->
				{{ Form::label('documentation', 'Documentation') }}
				{{ Form::text('documentation', Input::old('documentation'), array('class'=>'form-control')) }}
			</div>
			</div>
			<div class='col-md-3'>
			<div class='form-group'>
				<!-- `Procurement` Field -->
				{{ Form::label('procurement', 'Procurement') }}
				{{ Form::text('procurement', Input::old('procurement'), array('class'=>'form-control')) }}
			</div>
			<div class='form-group'>
				<!-- `Procurement ku` Field -->
				{{ Form::label('procurement_ku', 'Procurement key user') }}
				{{ Form::text('procurement_ku', Input::old('procurement_ku'), array('class'=>'form-control')) }}
			</div>
			<div class='form-group'>
				<!-- `Procurement rr` Field -->
				{{ Form::label('procurement_rr', 'Procurement receives request') }}
				{{ Form::text('procurement_rr', Input::old('procurement_rr'), array('class'=>'form-control')) }}
			</div>
			<div class='form-group'>
				<!-- `Procurement er` Field -->
				{{ Form::label('procurement_er', 'Procurement executes request') }}
				{{ Form::text('procurement_er', Input::old('procurement_er'), array('class'=>'form-control')) }}
			</div>
			<div class='form-group'>
				<!-- `Imac services` Field -->
				{{ Form::label('imac_services', 'Imac services') }}
				{{ Form::text('imac_services', Input::old('imac_services'), array('class'=>'form-control')) }}
			</div>
			<div class='form-group'>
				<!-- `Imac ku` Field -->
				{{ Form::label('imac_ku', 'Imac key user') }}
				{{ Form::text('imac_ku', Input::old('imac_ku'), array('class'=>'form-control')) }}
			</div>
			<div class='form-group'>
				<!-- `Imac rr` Field -->
				{{ Form::label('imac_rr', 'Imac receives request') }}
				{{ Form::text('imac_rr', Input::old('imac_rr'), array('class'=>'form-control')) }}
			</div>
			<div class='form-group'>
				<!-- `Imac er` Field -->
				{{ Form::label('imac_er', 'Imac executes request') }}
				{{ Form::text('imac_er', Input::old('imac_er'), array('class'=>'form-control')) }}
			</div>
			</div>
			<div class='col-md-3'>
			<div class='form-group'>
				<!-- `Support services` Field -->
				{{ Form::label('support_services', 'Support services') }}
				{{ Form::text('support_services', Input::old('support_services'), array('class'=>'form-control')) }}
			</div>
			<div class='form-group'>
				<!-- `Support ku` Field -->
				{{ Form::label('support_ku', 'Support key user') }}
				{{ Form::text('support_ku', Input::old('support_ku'), array('class'=>'form-control')) }}
			</div>
			<div class='form-group'>
				<!-- `Support rr` Field -->
				{{ Form::label('support_rr', 'Support receives request') }}
				{{ Form::text('support_rr', Input::old('support_rr'), array('class'=>'form-control')) }}
			</div>
			<div class='form-group'>
				<!-- `Level1 id` Field -->
				{{ Form::label('team_id', 'Level 1') }}
				{{ Form::select('team_id', array('' => '') + $teams, null, array('class' => 'form-control combobox')) }}
			</div>
			<div class='form-group'>
				<!-- `Level1 more` Field -->
				{{ Form::label('level1_more', 'Level 1 more') }}
				{{ Form::text('level1_more', Input::old('level1_more'), array('class'=>'form-control')) }}
			</div>
			<div class='form-group'>
				<!-- `Level2 id` Field -->
				{{ Form::label('team2_id', 'Level 2') }}
				{{ Form::select('team2_id', array('' => '') + $teams, null, array('class' => 'form-control combobox')) }}
			</div>
			<div class='form-group'>
				<!-- `Level2 more` Field -->
				{{ Form::label('level2_more', 'Level 2 more') }}
				{{ Form::text('level2_more', Input::old('level2_more'), array('class'=>'form-control')) }}
			</div>
			<div class='form-group'>
				<!-- `Level3 id` Field -->
				{{ Form::label('team3_id', 'Level 3') }}
				{{ Form::select('team3_id', array('' => '') + $teams, null, array('class' => 'form-control combobox')) }}
			</div>
			<div class='form-group'>
				<!-- `Level3 more` Field -->
				{{ Form::label('level3_more', 'Level 3 more') }}
				{{ Form::text('level3_more', Input::old('level3_more'), array('class'=>'form-control')) }}
			</div>
			<div class='form-group'>
				<!-- `Administration` Field -->
				{{ Form::label('administration', 'Administration') }}
				{{ Form::text('administration', Input::old('administration'), array('class'=>'form-control')) }}
			</div>
			<div class='form-group'>
				<!-- `Administration ku` Field -->
				{{ Form::label('administration_ku', 'Administration key user') }}
				{{ Form::text('administration_ku', Input::old('administration_ku'), array('class'=>'form-control')) }}
			</div>
			<div class='form-group'>
				<!-- `Administration rr` Field -->
				{{ Form::label('administration_rr', 'Administration receives request') }}
				{{ Form::text('administration_rr', Input::old('administration_rr'), array('class'=>'form-control')) }}
			</div>
			<div class='form-group'>
				<!-- `Administration er` Field -->
				{{ Form::label('administration_er', 'Administration executes request') }}
				{{ Form::text('administration_er', Input::old('administration_er'), array('class'=>'form-control')) }}
			</div>
			</div>
			<div class='col-md-3'>
			<div class='form-group'>
				<!-- `Operation order` Field -->
				{{ Form::label('operation_order', 'Operation order') }}
				{{ Form::text('operation_order', Input::old('operation_order'), array('class'=>'form-control')) }}
			</div>
			<div class='form-group'>
				<!-- `Oo ku` Field -->
				{{ Form::label('oo_ku', 'Operation Order key user') }}
				{{ Form::text('oo_ku', Input::old('oo_ku'), array('class'=>'form-control')) }}
			</div>
			<div class='form-group'>
				<!-- `Oo rr` Field -->
				{{ Form::label('oo_rr', 'Operation Order receives request') }}
				{{ Form::text('oo_rr', Input::old('oo_rr'), array('class'=>'form-control')) }}
			</div>
			<div class='form-group'>
				<!-- `Oo er` Field -->
				{{ Form::label('oo_er', 'Operation Order executes request') }}
				{{ Form::text('oo_er', Input::old('oo_er'), array('class'=>'form-control')) }}
			</div>
			<div class='form-group'>
				<!-- `Small enhancement` Field -->
				{{ Form::label('small_enhancement', 'Small enhancement') }}
				{{ Form::text('small_enhancement', Input::old('small_enhancement'), array('class'=>'form-control')) }}
			</div>
			<div class='form-group'>
				<!-- `Sm ku` Field -->
				{{ Form::label('sm_ku', 'Small enhancement key user') }}
				{{ Form::text('sm_ku', Input::old('sm_ku'), array('class'=>'form-control')) }}
			</div>
			<div class='form-group'>
				<!-- `Global comment` Field -->
				{{ Form::label('global_comment', 'Global comment') }}
				{{ Form::textarea('global_comment', Input::old('global_comment'), array('class'=>'form-control')) }}
			</div>





		
	<a href='{{URL::previous()}}' class='btn btn-default'><i class="fa fa-close fa-lg"></i> Cancel</a>
	{{ Form::button('<i class="fa fa-save fa-lg"></i> Add new Asset', array('type' => 'submit', 'class' => 'btn btn-primary')) }}
</div>
{{ Form::close() }}

</div>


</div>


@stop
@section('pagejs')
<script type="text/javascript">
  $(document).ready(function(){
    $('.combobox').combobox();
  });


</script>
@stop