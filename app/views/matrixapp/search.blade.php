@extends('layouts.sidebar')

@section('content')
<div class="col-md-10" id="search-results">
@section('search-keyword')

  <section id="search-keyword">
        <h3>Search Results for <span>{{ $keyword }}</span></h3>
    </section><!-- end search-keyword -->

@stop

<div class="row">
  @if (count($applications))
 <h4>In Applications:</h4>
@foreach($applications as $application)

        <div class="col-md-3">
          <div class="criticality {{ Prioritycolor::displayClass($application->priority_id) }}">

            <h3><a href="{{ URL::to('applications/' . $application->id) }}">{{ $application->name }}</a><span class="search-priority">{{ $application->priority->priority }}</span></h3>
            <p>{{ $application->description }}</p>
              <ul class="show-info">
                 <li><strong>Countries:</strong>{{ $application->country->name }}</li>
                 <li><strong>Priority:</strong>{{ $application->priority->priority }}</li>
                 <li><strong>IMAC:</strong>{{ $application->imac_services }}</li>
                 <li><strong>Support Services:</strong>{{ $application->support_services }}</li>
                 <li><strong>Administration:</strong>{{ $application->administration }}</li>

              </ul> 
          </div>
        </div>



@endforeach
@else
    <h4>Nothing found in Applications</h4>
@endif 
</div>



<div class="row">

@if (count($assets))
 <h4>In Assets:</h4>

@foreach($assets as $asset)

        <div class="col-md-3">
          <div class="criticality {{ Prioritycolor::displayClass($asset->priority_id) }}">

            <h3><a href="{{ URL::to('assets/' . $asset->id) }}">{{ $asset->name }}</a><span class="search-priority">{{ $asset->priority->priority }}</span></h3>
            <p>{{ $asset->description }}</p>
              <ul class="show-info">
                 <li><strong>Countries:</strong>{{ $asset->country->name }}</li>
                 <li><strong>Priority:</strong>{{ $asset->priority->priority }}</li>
                 <li><strong>IMAC:</strong>{{ $asset->imac_services }}</li>
                 <li><strong>Support Services:</strong>{{ $asset->support_services }}</li>
                 <li><strong>Administration:</strong>{{ $asset->administration }}</li>

              </ul> 
          </div>
        </div>



@endforeach
@else
    <h4>Nothing found in Assets</h4>
@endif 
</div>
<div class="row">
  @if (count($teams))
 <h4>In Teams:</h4>
@foreach($teams as $team)

        <div class="col-md-3">
          <div class="criticality criticality3">

            <h3><a href="{{ URL::to('teams/' . $team->id) }}">{{ $team->name }}</a></h3>
            <p>{{ $team->description }}</p>
              <ul class="show-info">
                   <li><strong>Time table:</strong>{{ $team->timetable }}</li>
                   <li><strong>Phone:</strong>{{ $team->phone }}</li>
                   <li><strong>Email:</strong>{{ $team->email }}</li>
                   <li><strong>Team Leader:</strong>{{ $team->e1_tl }}</li>
                   <li><strong>Mobile:</strong>{{ $team->e1_mobile }}</li>
                   <li><strong>Email:</strong>{{ $team->e1_email1 }}</li>

              </ul> 
          </div>
        </div>



@endforeach
@else
    <h4>Nothing found in Teams</h4>
@endif 
</div>
</div>
@stop