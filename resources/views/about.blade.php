@extends('layouts.main_layout')

@section('title', 'About')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
<h2 class="mt-4 ml-3 text-secondary">About</h2>
<div class="card p-0 purple_border">
	<div class="card-body p-0" id="load_html_about_project">
			<div class="spinner-border text-info" role="status" id="loading_spinner_about_project">
				<span class="sr-only">Loading...</span>
			</div>
	</div>
</div>

<div class="card p-0 purple_border mt-4">
	<div class="card-body p-0" id="load_html_about_me">
			<div class="spinner-border text-info" role="status" id="loading_spinner_about_me">
				<span class="sr-only">Loading...</span>
			</div>
	</div>
</div>


<h2 class="mt-4 text-secondary mb-2">Latest News</h2>
@foreach($news as $news_card)
	<div class="card p-0 mt-2 mb-2 purple_border">
		<div class="card-header title-background row m-0 purple_border">
			<div class="col-12 col-lg-10 pl-0">
				{{$news_card->title}}
			</div>
			<div class="col-12 col-lg-2 text-right">
				{{ \Carbon\Carbon::parse($news_card->posted_at)->format('d/m/Y')}}
			</div>
		</div>
		<div class="card-body" style="white-space: pre-line">
			<p>{{$news_card->description}}</p>
		</div>
	</div>
@endforeach
<script type="text/javascript">
	$("document").ready(function() {
		$("#loading_spinner_about_project").remove();
		$("#load_html_about_project").load("/storage/about-project.html");
		$("#loading_spinner_about_me").remove();
		$("#load_html_about_me").load("/storage/about-me.html");
	});
</script>
@endsection
