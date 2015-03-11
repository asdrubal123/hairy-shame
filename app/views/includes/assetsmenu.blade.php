<div class="col-md-10">
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
