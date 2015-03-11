@extends('layouts.sidebar')

@section('content')

@include('includes.applicationsmenu')

<div class="row">
        <div class="col-md-12 criticality criticality{{ $application->priority_id }}">
           <div class="row">
           	<div class="col-md-5">
            @if(Auth::check()) 
            <h3><a href="{{ URL::to('admin/applications/' . $application->id) }}">{{ $application->name }}</a></h3>
            @else
            <h3><a href="{{ URL::to('applications/' . $application->id) }}">{{ $application->name }}</a></h3>
            @endif
            <p>{{ $application->description }}</p>
        </div>
        <div class="col-md-1"><h2>{{$application->priority->priority}}</h2></div>
            <div class="col-md-6">
              <a href='{{URL::previous()}}' class='btn btn-small btn-primary'><i class="fa fa-arrow-circle-left fa-lg"></i> Back</a>
              @if(Auth::check()) 

        <a class="btn btn-small btn-danger" href="{{ URL::to('admin/applications/copy/' . $application->id) }}"><i class="fa fa-copy fa-lg"></i> Clone</a>
        <a class="btn btn-small btn-primary" href="{{ URL::to('admin/applications/edit/' . $application->id) }}"><i class="fa fa-edit fa-lg"></i> Edit</a>
          

        {{ Form::model($application, array('action' => array('ApplicationController@postSend', $application->id), 'class' => 'form-inline')) }}
        {{ Form::button('<i class="fa fa-envelope-o fa-lg"></i> Send', array('type' => 'submit', 'class' => 'btn btn-default')) }}
        {{ Form::close() }}
  


   

				  {{ Form::open(array('url' => 'admin/applications/' . $application->id, 'class' => 'form-inline')) }}
          {{ Form::hidden('_method', 'DELETE') }}
          {{ Form::button('<i class="fa fa-trash fa-lg"></i> Delete', array('type' => 'submit', 'class' => 'btn btn-warning')) }}
          {{ Form::close() }}

          @endif
			</div>
			</div>
    <div class="row">
        <div class="col-md-4">    
            <ul class="show-info">
               @if(Auth::check())
<li><strong>Active: </strong>{{$application->status}}</li>
              @endif
<li><strong>Site: </strong>{{$application->site}}</li>
<li><strong>Country: </strong>{{$application->country->name}}</li>
<li><strong>Priority: </strong>{{$application->priority->priority}}</li>
<li><strong>Responsible: </strong>{{$application->responsible}}</li>
<li><strong>Responsible Date: </strong>{{$application->responsible_date}}</li>
<li><strong>Nb user:</strong>{{ $application->nbuser }}</li>
<li><strong>Key user:</strong>{{ $application->key_user }}</li>
<li><strong>Constructor:</strong>{{ $application->constructor }}</li>
<li><strong>Documentation:</strong>{{ $application->documentation }}</li>

           </ul> 


        </div>
        <div class="col-md-4">
          <ul class="show-info">
      <li><strong>IMAC: </strong>{{$application->imac_services}}</li>
      <li>Key user: {{$application->imac_ku}}</li>
      <li>Receives request: {{$application->imac_rr}}</li>
      <li>Executes request: {{$application->imac_er}}</li>
      <li><strong>Support Services: </strong>{{$application->support_services}}</li>
      <li>Key user: {{$application->support_ku}}</li>
      <li>Receives request: {{$application->support_rr}}</li>
      <li>Level 1: <a href="{{ URL::to('teams/' . $application->team->id) }}">{{$application->team->name}}</a> {{$application->level1_more}}</li>

      <li>Level 2: {{$application->team2->name}} {{$application->level2_more}}</li>

      <li>Level 3: {{$application->team3->name}} {{$application->level3_more}}</li>
                                   
             </ul>      

        </div>
                <div class="col-md-4">
                  
          <ul class="show-info">
      <li><strong>Administration: </strong>{{$application->administration}}</li>
      <li>Key user: {{$application->administration_ku}}</li>
      <li>Receives request: {{$application->administration_rr}}</li>
      <li>Executes request: {{$application->administration_er}}</li>
      <li><strong>Operation  Order: </strong>{{$application->operation_order}}</li>
      <li>Key user: {{$application->oo_ku}}</li>
      <li>Receives request: {{$application->oo_rr}}</li>
      <li>Executes request: {{$application->oo_er}}</li>
      <li><strong>License provisioning:</strong>{{ $application->license_provisioning }}</li>
      <li>License key user: {{ $application->license_ku }}</li>
      <li>License receives request: {{ $application->license_rr }}</li>
      <li>License executes request: {{ $application->license_er }}</li>
      <li><strong>Project:</strong>{{ $application->project }}</li>
      <li>Project key user: {{ $application->project_ku }}</li>
          </ul>      

        </div>
        <div class="clearfix"></div>
        <hr>
<div class="col-md-8">
  <ul class="show-info">
  <li><strong>Comments: </strong>{{$application->global_comment}}</li>
  </ul>
</div>   
<div class="col-md-2">
  <ul class="show-info">
  <li><strong>Created by: </strong></li>
  <li>{{$application->usercreated->firstname}} {{$application->usercreated->lastname}}</li>
  <li>{{$application->created_at}}</li>
  </ul>
</div>
<div class="col-md-2">
  <ul class="show-info">
  <li><strong>Updated by: </strong></li>
   <li>{{$application->userupdated->firstname}} {{$application->userupdated->lastname}}</li>
  <li>{{$application->updated_at}}</li>
  </ul>
</div>     
      </div>
      </div>
</div>



</div>

@stop