@extends('layouts.main_layout_sidebar')

@section('title', 'Projects')
{{-- Sidebar --}}
@section('sidebar-title', 'Sort by Tag')
@section('sidebar')
	<div class="list-group list-group-flush">
		@foreach($tags_list as $tag)
			<button type="button" class="list-group-item list-group-item-action" onclick="location.href='/projects/sorted/{{$tag->title}}';">{{$tag->title}}</button>
		@endforeach
		<button type="button" class="list-group-item list-group-item-action text-primary pt-1 pb-1" onclick="location.href='/projects/';">Clear Tags</button>
	</div>
@endsection
{{-- End Sidebar --}}
@section('content')
{{-- Create new project if admin --}}
	@if (!Auth::guest() && Auth::user()->role == "admin")
	<form method="POST" action="/projects" class="card p-0 mt-4 purple_border input-group" >
		@csrf
		<div class="card">
			<div class="card-header title-background row m-0 purple_border">
				<div class="form-group col-lg-9 p-0">
					<input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Title" value="{{ old('title') }}" required>
					@error('title')
						<span class="invalid-feedback" role="alert">
							<div class="alert alert-danger">{{ $message }}</div>
						</span>
					@enderror
				</div>
				<div class="form-group col-lg-3 p-0">
					<div class="input-group row justify-content-end">
						<input type="date" name="last_updated_at" id="last_updated_at" class="form-control col-lg-7" @error('last_updated_at') is-invalid @enderror value="{{ old('last_updated_at') }}" required>
						<div class="input-group-append">
							<span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
						</div>
						@error('last_updated_at')
						<span class="invalid-feedback" role="alert">
							<div class="alert alert-danger">{{ $message }}</div>
						</span>
						@enderror
					</div>
				</div>
			</div>
			<div class="card-body">
				<textarea name="description" id="description" rows="3" placeholder="Description" class="col-12 form-control @error('description')  is-invalid @enderror" required>{{ old('description') }}</textarea>
				@error('description')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
				@enderror
				<div class="input-group mt-3">
					<div class="input-group-prepend">
					  <span class="input-group-text"><i class="fab fa-github"></i></span>
					</div>
					<input name="link" id="link" type="text" class="form-control @error('link') is-invalid @enderror" placeholder="Link" value="{{ old('link') }}" required>
					@error('link')
						<span class="invalid-feedback" role="alert">
							<div class="alert alert-danger">{{ $message }}</div>
						</span>
					@enderror
				  </div>
			</div>
			<div class="card-footer row m-0 justify-content-end">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</div>
	</form>
	@endif
{{-- End create new project if admin --}}
	@if (sizeof($projects) < 1)
		<p class="mt-4 text-muted">No Matching Projects</p>
	@else
		@foreach($projects as $project)
		<div class="card p-0 mt-4 purple_border">
			<div class="card-header title-background row m-0 purple_border">
				<div class="col-10 pl-0">
					{{$project->title}}
				</div>
				<div class="col-2 text-right">
					{{-- Convert date into Australian format --}}
					{{ \Carbon\Carbon::parse($project->last_updated_at)->format('d/m/Y')}}
				</div>
			</div>
			<div class="card-body">
				<p>{{$project->description}}</p>
				{{-- If there is images for the project, display them in a carousel --}}
				@if (sizeof($project->screenshots) > 1)
					<div id="carouselProjects<?php  echo $project->id ?>" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">
							{{-- Add the images to the carousel --}}
							@php ($i = 0)
							@foreach ($project->screenshots as $screenshot)
							<div class="carousel-item <?php if($i == 0) echo "active" ?>">
								<img src="{{$screenshot->image_src}}" class="d-block col-10 offset-1 p-2 border rounded" alt="...">
							</div>
							@php($i++)
							@endforeach
						</div>
						<ol class="carousel-indicators">
							{{-- Add the correct number of indicators to the bottom of the image --}}
							@php($i = 0)
							@while ($i < sizeof($project->screenshots))
								<li data-target="#carouselProjects<?php  echo $project->id ?>" data-slide-to="{{$i}}" class="<?php if($i == 0) echo "active" ?>"></li>
								@php($i++)
							@endwhile
						</ol>
						{{-- Carousel Controls --}}
						<a class="carousel-control-prev" href="#carouselProjects<?php  echo $project->id ?>" role="button" data-slide="prev">
							<span aria-hidden="true"><i class="fas fa-chevron-left text-dark"></i></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carouselProjects<?php  echo $project->id ?>" role="button" data-slide="next">
							<span aria-hidden="true"><i class="fas fa-chevron-right text-dark"></i></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				@endif
				{{-- End Carousel --}}
				<a href="{{$project->link}}" target="_blank">
					<img src="/images/GitHub-Mark/PNG/GitHub-Mark-32px.png">
					Github Repository
				</a>
			</div>
			<div class="card-footer text-muted">
				@foreach ($project->applied_tags as $tag)
					<span class="tag_highlight">{{$tag->tagslist->title}}</span>
				@endforeach
			</div>
		</div>
		@endforeach
		<div class="mt-4 row justify-content-center">
			{{ $projects->render() }}
		</div>
	@endif
@endsection