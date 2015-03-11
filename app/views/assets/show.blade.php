@extends('layouts.sidebar')

@section('content')

@include('includes.assetsmenu')




<div class="row">
        <div class="col-md-12 criticality criticality{{ $asset->priority_id }}">
           <div class="row">
           	<div class="col-md-5">
            @if(Auth::check()) 
            <h3><a href="{{ URL::to('admin/assets/' . $asset->id) }}">{{ $asset->name }}</a></h3>
            @else
            <h3><a href="{{ URL::to('assets/' . $asset->id) }}">{{ $asset->name }}</a></h3>
            @endif
            <p>{{ $asset->description }}</p>
        </div>
        <div class="col-md-1"><h2>{{$asset->priority->priority}}</h2></div>
            <div class="col-md-6">
              <a href='{{URL::previous()}}' class='btn btn-small btn-primary'><i class="fa fa-arrow-circle-left fa-lg"></i> Back</a>
              @if(Auth::check()) 

        <a class="btn btn-small btn-danger" href="{{ URL::to('admin/assets/copy/' . $asset->id) }}"><i class="fa fa-copy fa-lg"></i> Clone</a>
        <a class="btn btn-small btn-primary" href="{{ URL::to('admin/assets/' . $asset->id . '/edit') }}"><i class="fa fa-edit fa-lg"></i> Edit</a>
          

        {{ Form::model($asset, array('action' => array('AssetsController@postSend', $asset->id), 'class' => 'form-inline')) }}
        {{ Form::button('<i class="fa fa-envelope-o fa-lg"></i> Send', array('type' => 'submit', 'class' => 'btn btn-default')) }}
        {{ Form::close() }}
  


   

				  {{ Form::open(array('url' => 'admin/assets/' . $asset->id, 'class' => 'form-inline')) }}
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
<li><strong>Active: </strong>{{$asset->status}}</li>
              @endif
<li><strong>Site: </strong>{{$asset->site}}</li>
<li><strong>Country: </strong>{{$asset->country->name}}</li>
<li><strong>Priority: </strong>{{$asset->priority->priority}}</li>
<li><strong>Responsible: </strong>{{$asset->responsible}}</li>
<li><strong>Responsible Date: </strong>{{$asset->responsible_date}}</li>
<li><strong>Categorization: </strong>{{$asset->categorization}}</li>
<li><strong>Documentation: </strong>{{$asset->documentation}}</li>
<li><strong>Procurement: </strong>{{$asset->procurement}}</li>
<li>Key user: {{$asset->procurement_ku}}</li>
<li>Receives request: {{$asset->procurement_rr}}</li>
<li>Executes request: {{$asset->procurement_er}}</li>

           </ul> 


        </div>
        <div class="col-md-4">
          <ul class="show-info">
     <li><strong>IMAC: </strong>{{$asset->imac_services}}</li>
<li>Key user: {{$asset->imac_ku}}</li>
<li>Receives request: {{$asset->imac_rr}}</li>
<li>Executes request: {{$asset->imac_er}}</li>
<li><strong>Support Services: </strong>{{$asset->support_services}}</li>
<li>Key user: {{$asset->support_ku}}</li>
<li>Receives request: {{$asset->support_rr}}</li>
<li>Level 1: {{$asset->team->name}} {{$asset->level1_more}}</li>

<li>Level 2: {{$asset->team2->name}} {{$asset->level2_more}}</li>

<li>Level 3: {{$asset->team3->name}} {{$asset->level3_more}}</li>


                                    
             </ul>      

        </div>
                <div class="col-md-4">
                  
          <ul class="show-info">
<li><strong>Administration: </strong>{{$asset->administration}}</li>
<li>Key user: {{$asset->administration_ku}}</li>
<li>Receives request: {{$asset->administration_rr}}</li>
<li>Executes request: {{$asset->administration_er}}</li>
<li><strong>Operation  Order: </strong>{{$asset->operation_order}}</li>
<li>Key user: {{$asset->oo_ku}}</li>
<li>Receives request: {{$asset->oo_rr}}</li>
<li>Executes request: {{$asset->oo_er}}</li>
<li><strong>Small Enhancement: </strong>{{$asset->small_enhancement}}</li>
<li>Key user: {{$asset->sm_ku}}</li>
          </ul>      

        </div>
<div class="clearfix"></div>
<hr>
<div class="col-md-8">
  <ul class="show-info">
  <li><strong>Comments: </strong>{{$asset->global_comment}}</li>
  </ul>
</div>   
<div class="col-md-2">
  <ul class="show-info">
  <li><strong>Created by: </strong></li>
  <li>{{$asset->usercreated->firstname}} {{$asset->usercreated->lastname}}</li>
  <li>{{$asset->created_at}}</li>
  </ul>
</div>
<div class="col-md-2">
  <ul class="show-info">
  <li><strong>Updated by: </strong></li>
  <li>{{$asset->userupdated->firstname}} {{$asset->userupdated->lastname}}</li>
  <li>{{$asset->updated_at}}</li>
  </ul>
</div>        
      </div>
      </div>
</div>



</div>

@stop