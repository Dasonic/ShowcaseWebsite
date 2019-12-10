
<html>
	{{-- Scripts --}}
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<head>
	{{-- End Scripts --}}
		<title>DascoProjects - @yield('title')</title>
	</head>
	<body class="bg-light">
		<nav class="navbar navbar-expand-lg navbar-light bg-secondary">
			<a class="navbar-brand m-0" href="#">Dasco Projects</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				{{-- Pages --}}
				<div class="col-1 text-center nav-item active">
					<a class="nav-link text-light" href="/">Home <span class="sr-only">(current)</span></a>
				</div>
				<div class="col-1 text-center nav-item">
					<a class="nav-link text-light" href="/projects">Projects</a>
				</div>
				<div class="col-1 text-center">
					<a class="nav-link text-light" href="/about">About</a>
				</div>
				<div class="col-1 text-center">
					<a class="nav-link text-light" href="/contact">Contact</a>
				</div>
				{{-- End Pages --}}
				{{-- Search Bar --}}
				<div class="input-group col-3 offset-1">
					<input type="text" class="form-control" placeholder="Search..." aria-label="Recipient's username" aria-describedby="basic-addon2">
					<div class="input-group-append">
						<span class="input-group-text" id="basic-addon2">?</span>
					</div>
				</div>
				{{-- End Search Bar --}}
				{{-- Log in --}}
				<div class="nav-item dropdown offset-1">
					<a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Profile
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="#">Sign up</a>
						<a class="dropdown-item" href="#">Log-in</a>
					<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#">Something else here</a>
					</div>
				</div>
				{{-- End Log in --}}
			</div>
		</nav>
		{{-- Main Content --}}
		<div class="row mt-4">
			<div class="col-1"></div>
			<div class="card col-7">
				@yield('content')
			</div>
			<div class="card col-2 mr-5 p-0 offset-1">
				<div class="card-header">
					Sidebar
				</div>
				<div class="card-body">
					@section('sidebar')
						This is the master sidebar.
					@show
				</div>
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