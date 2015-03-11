	@include('includes.head')

<body>


	<header>
		@include('includes.header')
	</header>

	

		<!-- sidebar content -->
		<div id="main_content">
		

		
			
		 
			@yield('content')


		
        </div>
	
<div class="clearfix"></div>
	<footer>
		@include('includes.footer')
	</footer>
 {{-- placeholder for page's javascript --}}
@yield('pagejs')
</body>
</html>