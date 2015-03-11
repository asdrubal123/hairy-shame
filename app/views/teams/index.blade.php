@extends('layouts.sidebar')

@section('content')

@include('includes.teamsmenu')


<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

@foreach($teams as $key => $value)
<div class="row">

        <div class="col-md-12 criticality criticality3">
           <div class="row">
           	<div class="col-md-6">
            @if(Auth::check())  
            <h3><a href="{{ URL::to('admin/teams/show/' . $value->id) }}">{{ $value->name }}</a></h3>
            @else
            <h3><a href="{{ URL::to('teams/' . $value->id) }}">{{ $value->name }}</a></h3>
            @endif
            <p>{{ $value->description }}</p>
        </div>
            <div class="col-md-6">
              @if(Auth::check())
            	<a class="btn btn-small btn-success" href="{{ URL::to('admin/teams/show/' . $value->id) }}"><i class="fa fa-search-plus fa-lg"></i> Show more</a>
          		@else
              <a class="btn btn-small btn-success" href="{{ URL::to('teams/' . $value->id) }}"><i class="fa fa-search-plus fa-lg"></i> Show more</a>
              @endif
              @if(Auth::check()) 
				      <a class="btn btn-small btn-warning" href="{{ URL::to('admin/teams/edit/' . $value->id) }}"><i class="fa fa-edit fa-lg"></i> Edit</a>
              <a class="btn btn-small btn-warning" href="{{ URL::to('admin/teams/copy/' . $value->id) }}"><i class="fa fa-copy fa-lg"></i> Clone</a>


				    <!--  {{ Form::open(array('url' => 'admin/teams/' . $value->id, 'class' => 'form-inline')) }}
              {{ Form::hidden('_method', 'DELETE') }}
              {{ Form::button('<i class="fa fa-trash fa-lg"></i> Delete', array('type' => 'submit', 'class' => 'btn btn-danger')) }}
              {{ Form::close() }} -->

              {{ Form::model($value, array('action' => array('TeamController@postSend', $value->id), 'class' => 'form-inline')) }}
              {{ Form::button('<i class="fa fa-envelope-o fa-lg"></i> Send', array('type' => 'submit', 'class' => 'btn btn-default')) }}
              {{ Form::close() }}
  

              {{ Form::model($value, array('action' => array('TeamController@postDestroy', $value->id), 'class' => 'form-inline' )) }}
              {{ Form::button('<i class="fa fa-trash fa-lg"></i> Delete', array('type'=>'submit', 'class' => 'btn btn-danger')) }}
              {{ Form::close() }}
              @endif
			</div>
			</div>
    <div class="row">
        <div class="col-md-6">    
            <ul class="show-info">
                @if(Auth::check())
                <li><strong>Active:</strong>{{ $value->status }}</li>
                @endif
                <li><strong>Time table:</strong>{{ $value->timetable }}</li>
                <li><strong>Phone:</strong>{{ $value->phone }}</li>
                <li><strong>Email:</strong>{{ $value->email }}</li>
                <li><strong>Team Leader:</strong>{{ $value->e1_tl }}</li>
                <li><strong>Mobile:</strong>{{ $value->e1_mobile }}</li>
                <li><strong>Email:</strong>{{ $value->e1_email1 }}</li>

           </ul> 


        </div>
        <div class="col-md-6">
          <ul class="show-info">
                <li><strong>Escalation L2:</strong>{{ $value->e2_tl }}</li>
                <li><strong>Mobile:</strong>{{ $value->e2_mobile }}</li>
                <li><strong>Email:</strong>{{ $value->e2_email1 }}</li>
                                
                <li><strong>Escalation L3:</strong>{{ $value->e3_tl }}</li>
                <li><strong>Mobile:</strong>{{ $value->e3_mobile }}</li>
                <li><strong>Email:</strong>{{ $value->e3_email1 }}</li>
           </ul>        
        </div>
      </div>
      </div>
</div>
@endforeach
<section id="pagination">
  {{ $teams->links() }}
</section>

</div>
</body>
</html>
@stop