<nav class="navbar navbar-expand-lg navbar-light main-header fixed-top">
	<a class="navbar-brand m-0" style= href="#"><img class="" style="height: 2em;" src="/storage/me_square.png"></a>
	<a class="navbar-brand m-0" style= href="#"><img src="/storage/logo.png"></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		{{-- Pages --}}
		<div class="col-1 text-center nav-item active">
			<a class="nav-link text-light" href="/">Home <span class="sr-only">(current)</span></a>
		</div>
		<div class="col-1 text-center">
			<a class="nav-link text-light" href="/news">News</a>
		</div>
		<div class="col-1 text-center nav-item">
			<a class="nav-link text-light" href="/projects">Projects</a>
		</div>
		<div class="col-1 text-center">
			<a class="nav-link text-light" href="/contact">Contact</a>
		</div>
		{{-- End Pages --}}
		{{-- Search Bar --}}
		<div class="input-group col-3 offset-3">
			<input type="text" class="form-control" placeholder="Search..." aria-label="Recipient's username" aria-describedby="basic-addon2">
			<div class="input-group-append">
				<span class="input-group-text" id="basic-addon2">
					<i class="fas fa-search"></i>
				</span>
			</div>
		</div>
		{{-- End Search Bar --}}
		{{-- Log in --}}
		<div class="nav-item dropdown offset-1">
			<a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Profile
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				<a class="dropdown-item" href="/register">Sign up</a>
				<a class="dropdown-item" href="/login">Log-in</a>
			<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="#">Something else here</a>
			</div>
		</div>
		{{-- End Log in --}}
	</div>
</nav>
