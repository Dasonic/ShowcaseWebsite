@extends('layouts.main_layout')

@section('title', 'Home')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
{{-- Create new news post if admin --}}
	@if (!Auth::guest() && Auth::user()->role == "admin")
	<form method="POST" action="/news" class="card p-0 mt-4 purple_border input-group" >
		@csrf
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
					<input type="date" name="posted_at" id="posted_at" class="form-control col-lg-7" @error('posted_at') is-invalid @enderror value="{{ old('posted_at') }}" required>
					<div class="input-group-append">
						<span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
					</div>
					@error('posted_at')
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
		</div>
		<div class="card-footer row m-0 justify-content-end">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
	</form>
	@endif
{{-- End create new news post if admin --}}
{{-- Display news cards --}}
	@foreach($news as $news_card)
		<div class="card p-0 mt-4 purple_border">
			<div class="card-header title-background row m-0 purple_border">
				<div class="col-12 col-lg-10 pl-0">
					{{$news_card->title}}
				</div>
				<div class="col-12 col-lg-2 text-right">
					{{ \Carbon\Carbon::parse($news_card->posted_at)->format('d/m/Y')}}
					@if (!Auth::guest() && Auth::user()->role == "admin")
						<form action="/news/{{$news_card->id}}" method="POST" style="display:inline;" class="ml-3">
							@method('DELETE')
							@csrf
							<button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
						</form>
					@endif
				</div>
			</div>
			<div class="card-body" style="white-space: pre-line">
				<p>{{$news_card->description}}</p>
			</div>
		</div>
	@endforeach
{{-- End display news cards --}}
	<div class="mt-4 row justify-content-center">
		{{ $news->render() }}
	</div>
@endsection