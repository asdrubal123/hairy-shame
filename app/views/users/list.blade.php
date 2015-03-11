	@if(isset($users))
	{{ Form::open(['id' => 'edit-users-form']) }}
	<table class="table table-striped table-responsive">
		<thead>
			<tr>
				<th>Firstname</th>
				<th>Lastname</th>
				<th>Email</th>
				<th>Role</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $user)
				<tr>
					<td>
					{{ $user->firstname }}
					</td>
					<td>
					{{ $user->lastname }}
					</td>
					<td>
					{{ $user->email }}
					</td>
					<td>
					{{ $user->admin }}
					</td>
					<td style="width:15px;color:#3071A9;">
					{{ Form::open(array('class'=>'form-inline')) }}
					<span class="glyphicon glyphicon-edit btn btn-xs" title="Edit"></span>
					{{ Form::hidden('edit-id', $user->id) }}
					{{ Form::close() }}
                	</td>
                    <td style="width:15px;color:#C9302C;">

                    {{ Form::open(array('id'=>'remove-user-form', 'class'=>'form-inline')) }}
					
					<span class="glyphicon glyphicon-trash btn btn-xs" title="Delete"></span>
					{{ Form::hidden('id', $user->id) }}
					{{ Form::close() }}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{{ Form::close() }}
	{{ $users->links() }}
	 @endif