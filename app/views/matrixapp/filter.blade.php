@extends('layouts.sidebar')

@section('content')
<div class="col-md-10" id="search-results">



@stop


<div class="row">

@if (count($assets))
 <h4>In Assets:</h4>

@foreach($assets as $asset)

        <div class="col-md-3">
          <div class="criticality {{ Prioritycolor::displayClass($asset->priority_id) }}">

            <h3><a href="{{ URL::to('assets/' . $asset->id) }}">{{ $asset->name }}</a><span class="search-priority">{{ $asset->priority_id }}</span></h3>
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

</div>
@stop