@extends('layouts.main_layout_sidebar')

@section('title', 'Projects')
{{-- Sidebar --}}
@section('sidebar-title', 'Sort by Tag')
@section('sidebar')
	<div class="list-group list-group-flush">
		@foreach($tags_list as $tag)
			<button type="button" class="list-group-item list-group-item-action" onclick="location.href='/projects/sorted/{{$tag->title}}';">{{$tag->title}}</button>
		@endforeach
	</div>
@endsection
{{-- End Sidebar --}}
@section('content')
	@foreach($projects as $project)
	<div class="card p-0 mt-4">
		<div class="card-header title-background row m-0">
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
@endsection