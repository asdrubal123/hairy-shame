	@include('includes.head')

<body>


	<header>
		@include('includes.header')
	</header>

	

		<!-- sidebar content -->
		<div id="main_content">
		
			@include('includes.sidebar')
		
			@yield('search-keyword')
		 
			@yield('content')

			@yield('pagination')
		
        </div>
	
<div class="clearfix"></div>
	<footer>
		@include('includes.footer')
	</footer>
 {{-- placeholder for page's javascript --}}
@yield('pagejs')
</body>
</html>