<td>
	{{ Form::text('sn', $computer->sn, array('class' => 'form-control input-mysize', 'id' => 'update-sn')) }}
</td>
<td>
	{{ Form::text('cgito', $computer->cgito, array('class' => 'form-control input-mysize', 'id' => 'update-cgito')) }}
</td>
<td>
	{{ Form::text('other', $computer->other, array('class' => 'form-control input-mysize', 'id' => 'update-other')) }}
</td>
<td>

					{{ $computer->maker->name }}
					{{ Form::hidden('make', $computer->maker_id) }}
					</td>
					<td>
					{{ $computer->model->name }}
					{{ Form::hidden('model', $computer->model_id) }}
					</td>
					<td>
					{{ $computer->model->type }}
					</td>
					<td>
					{{ Owner::display($computer->ownership) }}
					{{ Form::hidden('ownership', $computer->ownership) }}
					</td>
					<td>
					{{ Form::select('user_id', array('' => '?') + $users, $user, ['class' => 'form-control comboboxe']) }}

					</td>
					<td>
					{{ Form::textarea('comments', $computer->comments, array('class' => 'form-control', 'rows' => '2', 'cols' => '10')) }}
					</td>
					@if(Auth::check()) 
					<td>
					{{ $computer->updated_at }}
					</td>
					@endif
<td style="width:15px;color:#3071A9;">
<span class="glyphicon glyphicon-floppy-disk btn btn-xs" title="Save"></span>

{{ Form::hidden('update-id', $computer->id) }}
			 		
</td>
<td style="width:15px;color:#3071A9;">
<span class="glyphicon glyphicon-ban-circle btn btn-xs" title="Cancel"></span>

</td>

<script type="text/javascript">
  $(document).ready(function(){
    $('.comboboxe').combobox();
  });


</script>