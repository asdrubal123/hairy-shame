@extends('layouts.fullscreentable')
@section('content')

@if(Auth::check())
<div class="row" id="adminmenu">
<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('admin/assets') }}">Assets Directory <span class="badge">{{ Asset::all()->count() }}</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('admin/assets/create') }}"><i class="fa fa-plus-square-o"></i> Add new</a></li>
		<li><a href="{{ URL::to('admin/assets/datatable') }}"><i class="fa fa-table"></i> Show as Table</a></li>
		<li><a href="{{ URL::to('admin/assets/import') }}"><i class="fa fa-upload"></i> Import</a></li>
		<li><a href="{{ URL::route('admin.assets.exportassets') }}"><i class="fa fa-download"></i> Export</a></li>
		<li><a href="{{ URL::to('admin/assets/trash') }}"><i class="fa fa-trash"></i> Trash <span class="badge">{{ Asset::onlyTrashed()->count() }}</span></a></li>

	</ul>

  
</nav>
</div>
@endif



<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif






{{ Datatable::table()
->addColumn('id',
 			'name',
			'status',
			'description',
			'site',
			'country_id',
			'priority_id',
			'responsible',
			'responsible_date',
			'categorization',
			'documentation',
			'procurement',
			'procurement_ku',
			'procurement_rr',
			'procurement_er',
			'imac_services',
			'imac_ku',
			'imac_rr',
			'imac_er',
			'support_services',
			'support_ku',
			'support_rr',
			'team_id',	
			'level1_more',
			'team2_id',
			'level2_more',
			'team3_id',
			'level3_more',
			'administration',
			'administration_ku',
			'administration_rr',
			'administration_er',
			'operation_order',
			'oo_ku',
			'oo_rr',
			'oo_er',
			'small_enhancement',
			'sm_ku',
			'global_comment', 
				'action')
->setUrl(route('admin.assets.api.datatable'))
->setOptions('bProcessing', true)
->setOptions('aoColumnDefs',array(
array(
"bSortable" => false,
'sTitle' => 'No',
'aTargets' => [0]
)))
->render('datatable.basic') }}

@stop