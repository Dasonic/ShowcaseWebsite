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
					<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							{{-- Add the correct number of indicators to the bottom of the image --}}
							@php($i = 0)
							@while ($i < sizeof($project->screenshots))
								<li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}" class="<?php if($i == 0) echo "active" ?>"></li>
								@php($i++)
							@endwhile
						</ol>
						<div class="carousel-inner">
							{{-- Add the images to the carousel --}}
							@php ($i = 0)
							@foreach ($project->screenshots as $screenshot)
							<div class="carousel-item <?php if($i == 0) echo "active" ?>">
								<img src="{{$screenshot->image_src}}" class="d-block w-100" alt="...">
							</div>
							@php($i++)
							@endforeach
						</div>
						{{-- Carousel Controls --}}
						<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
							<span aria-hidden="true"><i class="fas fa-arrow-left text-dark"></i></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
							<span aria-hidden="true"><i class="fas fa-arrow-right text-dark"></i></span>
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