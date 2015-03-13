	@if(isset($user))

				
			@foreach($user->computers as $computer)
      <div class="criticality {{ OwnershipColor::displayClass($computer->ownership) }}">
      <div class="col-md-1"><i class="fa {{ Icons::displayClass($computer->model->type) }} fa-5x"></i></div>
	    <div class="col-md-3">
          
              


              <ul>
                 <li><strong>Serial Number:</strong>{{ $computer->sn }}</li>
                 <li><strong>CG-ITO:</strong>{{ $computer->cgito }}</li>
                 <li><strong>Hostname, ext:</strong>{{ $computer->other }}</li>
                 <li><strong>Make:</strong>{{ $computer->maker->name }}</li>
                 <li><strong>Model:</strong>{{ $computer->model->name }}</li>
                 <li><strong>Comments:</strong>{{ $computer->comments }}</li>

              </ul> 
          </div>
          <div class="clearfix"></div>
        </div>

			@endforeach

	@endif





