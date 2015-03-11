<!DOCTYPE html>
<html>
<head>
	<title>Look! I'm CRUDding</title>



              
<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css">
<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="//cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js"></script> 
      {{ HTML::script('js/nerds/create.js')}} 
<body>
<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('nerds') }}">Nerd Alert</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('nerds') }}">View All Nerds</a></li>
		<li><a id="create" href="{{ URL::to('nerds/create') }}">Create a Nerd</a></li>
		<li><a href="{{ URL::to('nerds/table') }}">Show as table</a></li>
		<li><a href="{{ URL::to('nerds/dtable') }}">Show as datatable</a></li>
        <li><a href="{{ URL::to('nerds/active') }}">active</a></li>
        <li><a href="{{ URL::to('/export-to-csv') }}">Export</a></li>
        <li><a href="{{ URL::to('/export-to-csv') }}">Import</a></li>

	</ul>
</nav>

<div id="for-form"></div>

	<h3 class="inline"> {{ Nerd::all()->count() }}</h3>

{{-- Specify datatable with custom title and first column (id) hidden --}}
{{ Datatable::table()
->addColumn('id','name', 'email', 'nerd_level', 'action')
->setUrl(route('api.nerds'))
->setOptions('bProcessing', true)
->setOptions('aoColumnDefs',array(
array(
"bSortable" => false,
'sTitle' => 'No',
'aTargets' => [0]
)))
->render('datatable.basic') }}

</body>
</html>