@extends('layouts.sidebar')

@section('content')

@include('includes.teamsmenu')



<div class="row">
        <div class="col-md-12 criticality criticality3">
           <div class="row">
           	<div class="col-md-6">
            <h3>{{ $team->name }}</h3>
            <p>{{ $team->description }}</p>
        </div>
          <div class="col-md-6">
        <a href='{{URL::previous()}}' class='btn btn-small btn-primary'><i class="fa fa-arrow-circle-left fa-lg"></i> Back</a>
        @if(Auth::check())  
        <a class="btn btn-small btn-warning" href="{{ URL::to('admin/teams/edit/' . $team->id) }}"><i class="fa fa-edit fa-lg"></i> Edit</a>
        <a class="btn btn-small btn-warning" href="{{ URL::to('admin/teams/copy/' . $team->id) }}"><i class="fa fa-copy fa-lg"></i> Clone</a>
          {{ Form::open(array('url' => 'admin/teams/' . $team->id, 'class' => 'form-inline')) }}
          {{ Form::hidden('_method', 'DELETE') }}
          {{ Form::button('<i class="fa fa-trash fa-lg"></i> Delete', array('type' => 'submit', 'class' => 'btn btn-danger')) }}
          {{ Form::close() }}
        @endif
      </div>


			</div>
    <div class="row">
        <div class="col-md-6">    
            <ul class="show-info">
                @if(Auth::check())
                <li><strong>Status:</strong>{{ $team->status }}</li>
                @endif
                <li><strong>Service Level:</strong>{{ $team->servicelevel }}</li>
                <li><strong>Customer:</strong>{{ $team->customer }}</li>
                <li><strong>Time table:</strong>{{ $team->timetable }}</li>
                <li><strong>Phone:</strong>{{ $team->phone }}</li>
                <li><strong>Email:</strong>{{ $team->email }}</li>
                <li>{{ $team->free1 }}</li>
                <li><strong>Team Leader:</strong>{{ $team->e1_tl }}</li>
                <li><strong>Phone:</strong>{{ $team->e1_phone }}</li>
                <li><strong>Mobile:</strong>{{ $team->e1_mobile }}</li>
                <li><strong>Email:</strong>{{ $team->e1_email1 }}</li>
                <li><strong>Email2:</strong>{{ $team->e1_email2 }}</li>
                <li><strong>Additional info:</strong>{{ $team->e1_comments }}</li>

           </ul> 


        </div>
        <div class="col-md-6">
          <ul class="show-info">
                <li><strong>Escalation L2:</strong>{{ $team->e2_tl }}</li>
                <li><strong>Phone:</strong>{{ $team->e2_phone }}</li>
                <li><strong>Mobile:</strong>{{ $team->e2_mobile }}</li>
                <li><strong>Email:</strong>{{ $team->e2_email1 }}</li>
                <li><strong>Email2:</strong>{{ $team->e2_email2 }}</li>
                <li><strong>Additional info:</strong>{{ $team->e2_comments }}</li>
                <li><strong>Escalation L3:</strong>{{ $team->e3_tl }}</li>
                <li><strong>Phone:</strong>{{ $team->e3_phone }}</li>
                <li><strong>Mobile:</strong>{{ $team->e3_mobile }}</li>
                <li><strong>Email:</strong>{{ $team->e3_email1 }}</li>
                <li><strong>Email2:</strong>{{ $team->e3_email2 }}</li>
                <li><strong>Additional info:</strong>{{ $team->e3_comments }}</li>


           </ul>        
        </div>


<div class="clearfix"></div>
<hr>
<div class="col-md-8">
  <ul class="show-info">
  <li><strong>Comments: </strong>{{$team->global_comment}}</li>
  </ul>
</div>   
<div class="col-md-2">
  <ul class="show-info">
  <li><strong>Created by: </strong></li>
  <li>{{$team->usercreated->firstname}} {{$team->usercreated->lastname}}</li>
  <li>{{$team->created_at}}</li>
  </ul>
</div>
<div class="col-md-2">
  <ul class="show-info">
  <li><strong>Updated by: </strong></li>
  <li>{{$team->userupdated->firstname}} {{$team->userupdated->lastname}}</li>
  <li>{{$team->updated_at}}</li>
  </ul>
</div>
      </div>
</div>
      </div>
</div>




</body>
</html>
@stop





