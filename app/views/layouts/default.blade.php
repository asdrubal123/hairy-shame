
	@include('includes.head')

<body id="demo-one">


	<div>
		@include('includes.header')
	</div>

	<div id="main">

			@yield('content')

	</div>

	<footer>
		@include('includes.footer')
	</footer>

</body>
</html>