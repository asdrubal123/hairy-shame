<!DOCTYPE html>
<html>
<head>
	<title>Look! I'm CRUDding</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
 
<h1>Showing {{ $name }}</h1>


	<div class="jumbotron text-center">
		<h2>{{ $name }}</h2>
		<p>
			<strong>Email:</strong> {{ $email }}<br>
			<strong>Level:</strong> {{ $nerd_level }}
		</p>

		View all details:

	
	</div>
</body>
</html>