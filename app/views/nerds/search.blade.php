<div class="search">
	    {{ Form::model(null, array('route' => array('nerds.search'))) }}
	    {{ Form::text('query', null, array( 'placeholder' => 'Search query...' )) }}
	    {{ Form::submit('Search') }}
	    {{ Form::close() }}
</div>