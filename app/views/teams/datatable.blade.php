@extends('layouts.fullscreentable')
@section('content')

@if(Auth::check())
<div class="row" id="adminmenu">
	<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('admin/teams') }}">Teams Directory <span class="badge">{{ Team::all()->count() }}</span></a>
	</div>
	<ul class="nav navbar-nav">

		<li><a href="{{ URL::to('admin/teams/create') }}"><i class="fa fa-plus-square-o"></i> Add new</a></li>
		<li><a href="{{ URL::to('admin/teams/datatable') }}"><i class="fa fa-table"></i> Show as Table</a></li>
		<li><a href="{{ URL::to('admin/teams/import') }}"><i class="fa fa-upload"></i> Import</a></li>
		<li><a href="{{ URL::route('admin.teams.exportteams') }}"><i class="fa fa-download"></i> Export</a></li>
		<li><a href="{{ URL::to('admin/teams/trash') }}"><i class="fa fa-trash"></i> Trash <span class="badge">{{ Team::onlyTrashed()->count() }}</span></a></li>

	</ul>

  
</nav>
</div>
@endif
<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif



{{ Datatable::table()
->addColumn('id', 				'Name',	
				'status', 
				'description', 
				'servicelevel', 
				'customer', 
				'timetable', 
				'phone', 
				'email', 
				'free1',  
				'e1_tl',
				'e1_phone',
				'e1_mobile',
				'e1_email1',
				'e1_email2',
				'e1_comments',
				'e2_tl',
				'e2_phone',
				'e2_mobile',
				'e2_email1',
				'e2_email2',
				'e2_comments',
				'e3_tl',
				'e3_phone',
				'e3_mobile',
				'e3_email1',
				'e3_email2',
				'e3_comments',
				'global_comment', 'action')
->setUrl(route('admin.teams.api.datatable'))
->setOptions('bProcessing', true)
->setOptions('aoColumnDefs',array(
array(
"bSortable" => false,
'sTitle' => 'No',
'aTargets' => [0]
)))
->render('datatable.basic') }}

@stop