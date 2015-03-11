@extends('layouts.fullscreentable')
@section('content')


@if(Auth::check())
<div class="row" id="adminmenu">
<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('admin/applications') }}">Applications <span class="badge">{{ Application::all()->count() }}</span></a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('admin/applications/create') }}"><i class="fa fa-plus-square-o"></i> Add new</a></li>
		<li><a href="{{ URL::to('admin/applications/datatable') }}"><i class="fa fa-table"></i> Show as Table</a></li>
		<li><a href="{{ URL::to('admin/applications/import') }}"><i class="fa fa-upload"></i> Import</a></li>
  		<li><a href="{{ URL::route('admin.applications.exportapplications') }}"><i class="fa fa-download"></i> Export</a></li>
		<li><a href="{{ URL::to('admin/applications/trash') }}"><i class="fa fa-trash"></i> Trash <span class="badge">{{ Application::onlyTrashed()->count() }}</span></a></li>

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
			'country',
			'priority',
			'responsible',
			'responsible_date',
			'nbuser',
			'key_user',
			'constructor',
			'documentation',
			'imac_services',
			'imac_ku',
			'imac_rr',
			'imac_er',
			'support_services',
			'support_ku',
			'support_rr',
			'team',	
			'level1_more',
			'team2',
			'level2_more',
			'team3',
			'level3_more',
			'administration',
			'administration_ku',
			'administration_rr',
			'administration_er',
			'operation_order',
			'oo_ku',
			'oo_rr',
			'oo_er',
			'license_provisioning',
			'license_ku',
			'license_rr',
			'license_er',
			'project',
			'project_ku',
			'global_comment', 
				'action')
->setUrl(route('admin.applications.api.datatable'))
->setOptions('bProcessing', true)
->setOptions('aoColumnDefs',array(
array(
"bSortable" => false,
'sTitle' => 'No',
'aTargets' => [0]
)))
->render('datatable.basic') }}

@stop
@section('pagejs')
    <script>
    $(function() {
        $('#DataTables_Table_0_length').css('display','inline-block');
        $('<div id="filter_status" class="dataTables_length" style="display: inline-block;"><label>Status: <select size="1" name="filter_status" aria-controls="filter_status" class="form-control"><option value="all" selected="selected">Status</option><option value="active">Active</option><option value="notactive">Not Active</option></select></label></div>').insertAfter('#DataTables_Table_0_length');
        $('select[name="filter_status"]').change(function() {
            var $oTable = $('#DataTables_Table_0').dataTable();
            switch (this.value) {
                case 'all' :
                    $oTable.fnFilter('');
                    break;
                case 'active' :
                    $oTable.fnFilter('checked="checked"', 2, false, false, false, false);
                    break;
                case 'notactive' :
                    $oTable.fnFilter('<input disabled="disabled" name="status" type="checkbox" value="status">', null, false, false, false, false);
                    break;
            }
        });
    });
    </script>
@stop