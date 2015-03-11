	@include('includes.head')

<body>


	<header class="row">
		@include('includes.header')
	</header>

	

		<!-- sidebar content -->
		<div class="row">
		
			@include('includes.sidebaradmin')
		

		 
			@yield('content')

			@yield('pagination')
		
        </div>
	

	<footer class="row">
		@include('includes.footer')
	</footer>

</body>
</html>