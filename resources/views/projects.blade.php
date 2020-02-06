@extends('layouts.main_layout_sidebar')

@section('title', 'Projects')

@section('sidebar-title', 'Sort by Tag')
{{-- @section('sidebar-body')
	@parent
	<p>Select a tag from the following list to filter the projects.</p>
@endsection --}}
@section('sidebar')
	<div class="list-group list-group-flush">
		@foreach($tags_list as $tag)
			<button type="button" class="list-group-item list-group-item-action">{{$tag->title}}</button>
		@endforeach
	</div>
@endsection

@section('content')
	{{-- @foreach($news as $news_card) --}}
	<div class="card p-0 mt-4">
		<div class="card-header title-background row m-0">
			<div class="col-10 pl-0">
				Project Title
				{{-- {{$news_card->title}} --}}
			</div>
			<div class="col-2 text-right">
				1/1/20
				{{-- {{ \Carbon\Carbon::parse($news_card->posted_at)->format('d/m/Y')}} --}}
				{{-- {{$news_card->posted_at}} --}}
			</div>
		</div>
		<div class="card-body">
			<p>Project Description...</p>
			{{-- <p>{{$news_card->description}}}</p> --}}
		</div>
		<div class="card-footer text-muted">
			2 days ago
		</div>
	</div>
	{{-- @endforeach --}}
@endsection