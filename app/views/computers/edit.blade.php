<td>
	{{ Form::text('sn', $computer->sn, array('class' => 'form-control', 'id' => 'update-sn')) }}
</td>
<td>
	{{ Form::text('cgito', $computer->cgito, array('class' => 'form-control', 'id' => 'update-cgito')) }}
</td>
<td>
	{{ Form::text('other', $computer->other, array('class' => 'form-control', 'id' => 'update-other')) }}
</td>
<td>

					{{ Form::select('make-edit', array('' => '') + $makers, null, ['class' => 'form-control', 'id'=>'make-edit']) }}
					</td>
					<td>
					{{ Form::select('model-edit', array(''=>'Please choose manufacturer first'), '', array('class' => 'form-control', 'id'=>'model-edit')) }}
					</td>
					<td>
					{{ $computer->model->type }}
					</td>
					<td>
					{{ Form::select('ownership', array('0'=>'Capgemini', '1' => 'Schneider'), $computer->ownership, array('class' => 'form-control')) }}
					</td>
					<td>
					{{ Form::select('user_id', array('' => '?') + $users, null, ['class' => 'form-control']) }}

					</td>
					<td>
					{{ Form::textarea('comments', $computer->comments, array('class' => 'form-control')) }}
					</td>
<td style="width:15px;color:#3071A9;">
<span class="glyphicon glyphicon-floppy-disk btn btn-xs" title="Save"></span>

{{ Form::hidden('update-id', $computer->id) }}
			 		
</td>
<td style="width:15px;color:#3071A9;">
<span class="glyphicon glyphicon-ban-circle btn btn-xs" title="Cancel"></span>

</td>