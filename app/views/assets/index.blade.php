@extends('layouts.sidebar')

@section('content')

@include('includes.assetsmenu')

<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

@include('includes.assetsfilter')

@foreach($assets as $key => $value)
<div class="row">
        <div class="col-md-12 criticality {{ Prioritycolor::displayClass($value->priority_id) }}">
           <div class="row">
           	<div class="col-md-5">
            @if(Auth::check()) 
            <h3><a href="{{ URL::to('admin/assets/' . $value->id) }}">{{ $value->name }}</a></h3>
            @else
            <h3><a href="{{ URL::to('assets/' . $value->id) }}">{{ $value->name }}</a></h3>
            @endif
            <p>{{ $value->description }}</p>
        </div>
            <div class="col-md-1"><h2>{{$value->priority->priority}}</h2></div>
            <div class="col-md-6">
              @if(Auth::check())
            	<a class="btn btn-small btn-success" href="{{ URL::to('admin/assets/' . $value->id) }}"><i class="fa fa-search-plus fa-lg"></i> Show more</a>
          		@else
              <a class="btn btn-small btn-success" href="{{ URL::to('assets/' . $value->id) }}"><i class="fa fa-info-circle fa-lg"></i> Show more</a>
				      @endif
              @if(Auth::check()) 

        <a class="btn btn-small btn-danger" href="{{ URL::to('admin/assets/copy/' . $value->id) }}"><i class="fa fa-copy fa-lg"></i> Clone</a>
        <a class="btn btn-small btn-primary" href="{{ URL::to('admin/assets/' . $value->id . '/edit') }}"><i class="fa fa-edit fa-lg"></i> Edit</a>
          

        {{ Form::model($value, array('action' => array('AssetsController@postSend', $value->id), 'class' => 'form-inline')) }}
        {{ Form::button('<i class="fa fa-envelope-o fa-lg"></i> Send', array('type' => 'submit', 'class' => 'btn btn-default')) }}
        {{ Form::close() }}
  


   

				  {{ Form::open(array('url' => 'admin/assets/' . $value->id, 'class' => 'form-inline')) }}
          {{ Form::hidden('_method', 'DELETE') }}
          {{ Form::button('<i class="fa fa-trash fa-lg"></i> Delete', array('type' => 'submit', 'class' => 'btn btn-warning')) }}
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
<li><strong>Categorization: </strong>{{$value->categorization}}</li>
<li><strong>Documentation: </strong>{{$value->documentation}}</li>
<li><strong>Procurement: </strong>{{$value->procurement}}</li>
<li>Key user: {{$value->procurement_ku}}</li>
<li>Receives request: {{$value->procurement_rr}}</li>
<li>Executes request: {{$value->procurement_er}}</li>

           </ul> 


        </div>
        <div class="col-md-6">
          <ul class="show-info">
     <li><strong>IMAC: </strong>{{$value->imac_services}}</li>
<li>Key user: {{$value->imac_ku}}</li>
<li>Receives request: {{$value->imac_rr}}</li>
<li>Executes request: {{$value->imac_er}}</li>
<li><strong>Support Services: </strong>{{$value->support_services}}</li>
<li>Key user: {{$value->support_ku}}</li>
<li>Receives request: {{$value->support_rr}}</li>
<li>Level 1: {{$value->team->name}} {{$value->level1_more}}</li>

<li>Level 2: {{$value->team2->name}} {{$value->level2_more}}</li>

<li>Level 3: {{$value->team3->name}} {{$value->level3_more}}</li>



                                    
             </ul>      

        </div>
      
      </div>
      </div>
</div>
@endforeach
<section id="pagination">
  {{ $assets->links() }}
</section>

</div>

@stop
@section('pagejs')
<script type="text/javascript">


</script>
@stop