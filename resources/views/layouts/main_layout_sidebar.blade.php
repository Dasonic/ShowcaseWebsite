<html>
	{{-- Scripts --}}
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/1a760d6e5a.js" crossorigin="anonymous"></script>
	<link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
	<head>
	{{-- End Scripts --}}
		<title>DascoProjects - @yield('title')</title>
	</head>
	<body class="bg-light">
		@include('layouts.partials.navbar') {{-- Navbar --}}
		{{-- Main Content --}}
		<div class="row header_spacer">
			<div class="col-2 mr-5 p-0 offset-1 mt-4">
				{{-- <div class="" style="position: fixed; top: 5em;"> --}}
					<div class="card col-8 p-0">
						<div class="card-header title-background">
							@yield('sidebar-title')
						</div>
						@yield('sidebar')
					</div>
				{{-- </div> --}}
			</div>
			<div class="col-7">
				@yield('content')
			</div>
		</div>
		{{-- End Main Content --}}

		<footer class="text-muted pl-2" style="position: fixed; bottom: 0;">
			@section('footer')
			Copyright 2019
			@show
		</footer>	
	</body>
</html>