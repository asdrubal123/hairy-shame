	@if(isset($user))
			<ul class="show-info">
				
			@foreach($user->links as $link)
				<li>
					<div class="form-horizontal">
			 		{{ Form::open(array('url'=>'mylinks/edit', 'class'=>'form-inline')) }}
			 		{{ $link->id }}
					{{ Form::hidden('id', $link->id) }}
					{{ Form::hidden('status', '0') }}

					{{ Form::text('name', $link->name, array('class' => 'form-control')) }}
					
					{{ Form::text('url', $link->url, array('class' => 'form-control')) }}
					{{ Form::button('<i class="fa fa-edit fa-lg"></i> Edit', array('type' => 'submit', 'class' => 'btn btn-primary')) }}
                    {{ Form::close() }}


                    {{ Form::open(array('url'=>'mylinks/destroy', 'class'=>'form-inline')) }}
					{{ Form::hidden('id', $link->id) }}
					{{ Form::button('<i class="fa fa-trash fa-lg"></i> Delete', array('type' => 'submit', 'class' => 'btn btn-warning')) }}
					{{ Form::close() }}
					</div>
				</li>
			@endforeach
		</ul>
	@endif