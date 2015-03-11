<!DOCTYPE html>
<html>
<head>
	<title>Look! I'm CRUDding</title>

                <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
                <!--{{ HTML::style('css/dataTables.bootstrap.css')}}-->
                <link rel="stylesheet" type="text/css" href="http://datatables.github.com/Plugins/integration/bootstrap/2/dataTables.bootstrap.css">

                <script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
                <!--<script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10-dev/js/jquery.dataTables.js"></script>-->
                <script type="text/javascript" language="javascript" src="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/jquery.dataTables.js"></script>
                {{ HTML::script('js/dataTables.bootstrap.js')}}
</head>
<body>
 <div class="table-responsive">
{{-- Specify datatable with custom title and first column (id) hidden --}}
{{ Datatable::table()
->addColumn('id','name', 'email', 'nerd_level')
->setUrl(route('api.nerds'))
->setOptions('bProcessing', true)
->setOptions('aoColumnDefs',array(
array(
"bSortable" => false,
'sTitle' => 'No',
'aTargets' => [0]
)))
->render('datatable.basic') }}
</div>
</body>
</html>