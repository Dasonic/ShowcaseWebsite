@extends('layouts.main_layout')

@section('title', 'Home')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
	@foreach($news as $news_card)
	<div class="card p-0 mt-4">
		<div class="card-header title-background row m-0">
			<div class="col-10 pl-0">
				{{$news_card->title}}
			</div>
			<div class="col-2 text-right">
				{{ \Carbon\Carbon::parse($news_card->posted_at)->format('d/m/Y')}}
				{{-- {{$news_card->posted_at}} --}}
			</div>
		</div>
		<div class="card-body">
			<p>{{$news_card->description}}}</p>
		</div>
	</div>
	@endforeach
	{{-- <div class="card p-0">
		<div class="card-body">
			<p>This is my body content.</p>
		</div>
	</div> --}}
@endsection