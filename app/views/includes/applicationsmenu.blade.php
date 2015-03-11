<div class="col-md-10">
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