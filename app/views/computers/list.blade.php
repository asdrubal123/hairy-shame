	@if(isset($computers))
	{{ Form::open(['id' => 'edit-computers-form']) }}
	<table class="table table-striped table-responsive">
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
				<th></th>
				<th></th>
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
					{{ $computer->ownership }}
					</td>
					<td>
					{{ $computer->user ? $computer->user->email : '?' }}
					</td>
					<td>
					{{ $computer->comments }}
					</td>
					<td style="width:15px;color:#3071A9;">
					{{ Form::open(array('class'=>'form-inline')) }}
					<span class="glyphicon glyphicon-edit btn btn-xs" title="Edit"></span>
					{{ Form::hidden('edit-id', $computer->id) }}
		
                    {{ Form::close() }}
                	</td>
                    <td style="width:15px;color:#C9302C;">

                    {{ Form::open(array('id'=>'remove-computer-form', 'class'=>'form-inline')) }}
					
					<span class="glyphicon glyphicon-trash btn btn-xs" title="Delete"></span>
					{{ Form::hidden('id', $computer->id) }}
					{{ Form::close() }}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{{ Form::close() }}
	{{ $computers->links() }}
	 @endif