		<h2>{{ $name }}</h2>
		<p>{{ $description }}</p>
		<ul>
             <li><strong>Time table:</strong>{{ $timetable }}</li>
             <li><strong>Phone:</strong>{{ $phone }}</li>
             <li><strong>Email:</strong>{{ $email }}</li>
             <li><strong>Team Leader:</strong>{{ $e1_tl }}</li>
             <li><strong>Mobile:</strong>{{ $e1_mobile }}</li>
             <li><strong>Email:</strong>{{ $e1_email1 }}</li>
        </ul>

	View all details:

	<a class="btn btn-small btn-success" href="{{ URL::to('teams/show/' . $id) }}">Show details</a>
