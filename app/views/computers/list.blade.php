	@if(isset($computers))
	{{ Form::open(['id' => 'edit-computers-form']) }}
	<table id="bootstripped" class="table table-striped table-responsive compact">
		<thead>
			<tr>
				<th>Serial Number</th>
				<th>CG-ITO</th>
				<th>Other</th>
				<th>Make</th>
				<th>Model</th>
				<th>Type</th>
				<th>Owner</th>
				<th>Assigned To</th>
				<th>Comments</th>
				@if(Auth::check()) 
				<th>Updated at</th>
				@endif
				<th></th>
				@if(Auth::check()) 
				<th></th>
				@endif
			</tr>
		</thead>
		<tbody>
			@foreach($computers as $computer)
				<tr>
					<td>
					{{ $computer->sn }}
					</td>
					<td>
					{{ $computer->cgito }}
					</td>
					<td>
					{{ $computer->other }}
					</td>
					<td>
					{{ $computer->maker->name }}
					</td>
					<td>
					{{ $computer->model->name }}
					</td>
					<td>
					{{ $computer->model->type }}
					</td>
					<td>
					{{ Owner::display($computer->ownership) }}
					</td>
					<td>
					@if(isset($computer->user_id))		
					<a href="{{ URL::to('myassets/' .$computer->user->email) }}">{{ $computer->user->email }}</a>
					@else
					{{ $computer->user ? $computer->user->email : '?' }}
					@endif
					</td>
					<td>
					{{ $computer->comments }}
					</td>

					@if(Auth::check()) 
					<td>
					{{ $computer->updated_at }}
					</td>
					@endif
					<td style="width:15px;color:#3071A9;">
					{{ Form::open(array('class'=>'form-inline')) }}
					<span class="glyphicon glyphicon-edit btn btn-xs" title="Edit"></span>
					{{ Form::hidden('edit-id', $computer->id) }}
		
                    {{ Form::close() }}
                	</td>
                	@if(Auth::check()) 
                    <td style="width:15px;color:#C9302C;">
                    	
                    {{ Form::open(array('id'=>'remove-computer-form', 'class'=>'form-inline')) }}
					
					<span class="glyphicon glyphicon-trash btn btn-xs" title="Delete"></span>
					{{ Form::hidden('id', $computer->id) }}
					{{ Form::close() }}
						
					</td>
					@endif
				</tr>
			@endforeach
		</tbody>
	</table>

	{{ Form::close() }}
	<script>
	$(document).ready(function() {
    $('#bootstripped').dataTable({
    	"bPaginate": false,
    	"aaSorting": [],
    	"aoColumnDefs": [
          { 'bSortable': false, 'aTargets': [ 2, 3, 8, 9] }
       ]
    	});
	} );
	</script>
	{{ $computers->links() }}

	 @endif