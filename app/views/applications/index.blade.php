@extends('layouts.sidebar')

@section('content')

@include('includes.applicationsmenu')

<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

@include('includes.applicationsfilter')

@foreach($applications as $key => $value)
<div class="row">

        <div class="col-md-12 criticality {{ Prioritycolor::displayClass($value->priority_id) }}">
           <div class="row">
           	<div class="col-md-5">
            @if(Auth::check())  
            <h3><a href="{{ URL::to('admin/applications/show/' . $value->id) }}">{{ $value->name }}</a></h3>
            @else
            <h3><a href="{{ URL::to('applications/' . $value->id) }}">{{ $value->name }}</a></h3>
            @endif
            <p>{{ $value->description }}</p>
        </div>
        <div class="col-md-1"><h2>{{$value->priority->priority}}</h2></div>
            <div class="col-md-6">
              @if(Auth::check())
            	<a class="btn btn-small btn-success" href="{{ URL::to('admin/applications/show/' . $value->id) }}"><i class="fa fa-search-plus fa-lg"></i> Show more</a>
          		@else
              <a class="btn btn-small btn-success" href="{{ URL::to('applications/' . $value->id) }}"><i class="fa fa-search-plus fa-lg"></i> Show more</a>
              @endif
              @if(Auth::check()) 
				      <a class="btn btn-small btn-warning" href="{{ URL::to('admin/applications/edit/' . $value->id) }}"><i class="fa fa-edit fa-lg"></i> Edit</a>
              <a class="btn btn-small btn-warning" href="{{ URL::to('admin/applications/copy/' . $value->id) }}"><i class="fa fa-copy fa-lg"></i> Clone</a>


				    <!--  {{ Form::open(array('url' => 'admin/teams/' . $value->id, 'class' => 'form-inline')) }}
              {{ Form::hidden('_method', 'DELETE') }}
              {{ Form::button('<i class="fa fa-trash fa-lg"></i> Delete', array('type' => 'submit', 'class' => 'btn btn-danger')) }}
              {{ Form::close() }} -->

              {{ Form::model($value, array('action' => array('ApplicationController@postSend', $value->id), 'class' => 'form-inline')) }}
              {{ Form::button('<i class="fa fa-envelope-o fa-lg"></i> Send', array('type' => 'submit', 'class' => 'btn btn-default')) }}
              {{ Form::close() }}
  

              {{ Form::model($value, array('action' => array('ApplicationController@postDestroy', $value->id), 'class' => 'form-inline' )) }}
              {{ Form::button('<i class="fa fa-trash fa-lg"></i> Delete', array('type'=>'submit', 'class' => 'btn btn-danger')) }}
              {{ Form::close() }}
              @endif
			</div>
			</div>
    <div class="row">
        <div class="col-md-6">    
            <ul class="show-info">
                            @if(Auth::check())
                <li><strong>Active: </strong>{{$value->status}}</li>
                              @endif
                <li><strong>Site: </strong>{{$value->site}}</li>
                <li><strong>Country: </strong>{{$value->country->name}}</li>
                <li><strong>Priority: </strong>{{$value->priority->priority}}</li>
                <li><strong>Responsible: </strong>{{$value->responsible}}</li>
                <li><strong>Responsible Date: </strong>{{$value->responsible_date}}</li>
                <li><strong>IMAC: </strong>{{$value->imac_services}}</li>
                <li>Key user: {{$value->imac_ku}}</li>
                <li>Receives request: {{$value->imac_rr}}</li>
                <li>Executes request: {{$value->imac_er}}</li>


           </ul> 


        </div>
        <div class="col-md-6">
          <ul class="show-info">

              <li><strong>Support Services: </strong>{{$value->support_services}}</li>
              <li>Key user: {{$value->support_ku}}</li>
              <li>Receives request: {{$value->support_rr}}</li>
              <li>Level 1: {{isset($value->team->name) ? $value->team->name : 'N\A'}} {{$value->level1_more}}</li>

              <li>Level 2: {{isset($value->team2->name) ? $value->team2->name : 'This team has been deleted!'}} {{$value->level2_more}}</li>

              <li>Level 3: {{isset($value->team3->name) ? $value->team3->name : 'This team has been deleted!'}} {{$value->level3_more}}</li>

              <li><strong>Administration:</strong>{{ $value->administration }}</li>
              <li>Key user: {{ $value->administration_ku }}</li>
              <li>Receives request: {{ $value->administration_rr }}</li>
              <li>Executes request: {{ $value->administration_er }}</li>
                                    
             </ul>          
        </div>
      </div>
      </div>
</div>
@endforeach
<section id="pagination">
  {{ $applications->links() }}
</section>

</div>
</body>
</html>
@stop