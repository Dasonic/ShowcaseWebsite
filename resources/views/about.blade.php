@extends('layouts.main_layout')

@section('title', 'About')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
<div class="card p-0 mt-4">
	<div class="card-header title-background row m-0">
		<h5 class="mb-0">About</h5>
	</div>
	<div class="card-body" id="load_html">
			<div class="spinner-border text-info" role="status" id="loading_spinner">
				<span class="sr-only">Loading...</span>
			</div>
	</div>
</div>
<h2 class="mt-4 text-secondary">Latest News</h2>
@foreach($news as $news_card)
	<div class="card p-0 mt-4">
		<div class="card-header title-background row m-0">
			<div class="col-10 pl-0">
				{{$news_card->title}}
			</div>
			<div class="col-2 text-right">
				{{ \Carbon\Carbon::parse($news_card->posted_at)->format('d/m/Y')}}
			</div>
		</div>
		<div class="card-body">
			<p>{{$news_card->description}}</p>
		</div>
	</div>
@endforeach
<script type="text/javascript">
	$("document").ready(function() {
		$("#loading_spinner").remove();
		$("#load_html").load("/storage/about.html");
	});
</script>
@endsection
