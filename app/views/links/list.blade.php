	@if(isset($links))
	{{ Form::select('pages', array('5'=>'5', '10' => '10', '20' => '20'), '', array('class' => 'form-control')) }}
	{{ Form::open(['id' => 'edit-links-form']) }}
	<table class="table table-striped table-responsive">
		<thead>
			<tr>
				<th>Name</th>
				<th>URL</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($links as $link)
				<tr>
					<td>
					{{ $link->name }}
					</td>
					<td>
					{{ $link->url }}
					</td>
					<td style="width:15px;color:#3071A9;">
					{{ Form::open(array('class'=>'form-inline')) }}
					<span class="glyphicon glyphicon-edit btn btn-xs" title="Edit"></span>
					{{ Form::hidden('edit-id', $link->id) }}
					{{ Form::hidden('status', '1') }}
					
                    {{ Form::close() }}
                	</td>
                    <td style="width:15px;color:#C9302C;">

                    {{ Form::open(array('id'=>'remove-link-form', 'class'=>'form-inline')) }}
					
					<span class="glyphicon glyphicon-trash btn btn-xs" title="Delete"></span>
					{{ Form::hidden('id', $link->id) }}
					{{ Form::close() }}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{{ Form::close() }}
	{{ $links->links() }}
	 @endif