<nav class="navbar navbar-expand-lg navbar-light main-header fixed-top row">
	<span class="col-2">
		<a class="navbar-brand m-0 ml-4" style= href="#"><img style="height: 2em;" src="/storage/icon.png"></a>
	</span>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	
	<div class="collapse navbar-collapse row justify-content-center justify-content-lg-start" id="navbarSupportedContent">
		{{-- Pages --}}
		<div class="col-8 col-lg-1 pl-0 pr-0 nav-item active">
			<a class="nav-link text-light text-center" href="/">Home<span class="sr-only">(current)</span></a>
		</div>
		<div class="col-8 col-lg-1 pl-0 pr-0">
			<a class="nav-link text-light text-center" href="/news">News</a>
		</div>
		<div class="col-8 col-lg-1 pl-0 pr-0 nav-item">
			<a class="nav-link text-light text-center" href="/projects">Projects</a>
		</div>
		<div class="col-8 col-lg-1 pl-0 pr-0">
			<a class="nav-link text-light text-center" href="/contact">Contact</a>
		</div>
		{{-- End Pages --}}
		{{-- Search Bar --}}
		<div class="input-group col-6 col-lg-3 offset-lg-1 mr-lg-4">
			<input type="text" class="form-control" placeholder="Search..." aria-label="Recipient's username" aria-describedby="basic-addon2">
			<div class="input-group-append">
				<span class="input-group-text" id="basic-addon2">
					<i class="fas fa-search"></i>
				</span>
			</div>
		</div>
		{{-- End Search Bar --}}
		{{-- Log in --}}
		<div class="nav-item dropdown col-8 col-lg-1 ml-lg-4">
			<a class="nav-link dropdown-toggle text-light text-center" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				@if (Auth::guest())
					Profile
				@else
					{{Auth::user()->name}}
				@endif
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				@if (Auth::guest())
					<a class="dropdown-item" href="/register">Sign up</a>
					<a class="dropdown-item" href="/login">Log-in</a>
				@else
					<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
						Log out
					</a>    
					<form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
						{{ csrf_field() }}
					</form>
				@endif
			{{-- <div class="dropdown-divider"></div>
				<a class="dropdown-item" href="#">Something else here</a>
			</div> --}}
		</div>
		{{-- End Log in --}}
	</div>
</nav>
