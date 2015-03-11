		<h2>{{ $name }}</h2>
		<p>{{ $description }}</p>
		<ul>
             <li><strong>Countries:</strong>{{ $country }}</li>
             <li><strong>Priority:</strong>{{ $priority }}</li>
             <li><strong>IMAC:</strong>{{ $imac_services }}</li>
             <li><strong>Support Services:</strong>{{ $support_services }}</li>
             <li><strong>Administration:</strong>{{ $administration }}</li>

        </ul>

	View all details:

	<a class="btn btn-small btn-success" href="{{ URL::to('applications/' . $id) }}">Show details</a>