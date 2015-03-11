
					
					

					<td>
					{{ Form::text('name', $link->name, array('class' => 'form-control', 'id' => 'update-name')) }}
					
					</td>
					<td>
					{{ Form::text('url', $link->url, array('class' => 'form-control', 'id' => 'update-url')) }}
					</td>
					<td style="width:15px;color:#3071A9;">
					<span class="glyphicon glyphicon-floppy-disk btn btn-xs" title="Save"></span>

					{{ Form::hidden('status', '1') }}
			 		{{ Form::hidden('update-id', $link->id) }}
			 		
                	</td>
                    <td style="width:15px;color:#3071A9;">
                    <span class="glyphicon glyphicon-ban-circle btn btn-xs" title="Cancel"></span>

                    </td>
					
					

