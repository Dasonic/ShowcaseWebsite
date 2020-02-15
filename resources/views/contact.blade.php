@extends('layouts.main_layout')

@section('title', 'Contact')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
<div class="card p-0 mt-4">
	<div class="card-header title-background row m-0">
		<h5 class="mb-0">Contact</h5>
	</div>
	<div class="card-body">
		<form method="GET" action="/contact/send">
			{{-- {{ method_field('POST') }} --}}
			@csrf
			<div class="form-group row">
				<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label>
				<div class="col-md-6">
					<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
					@error('name')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
			</div>

			<div class="form-group row">
				<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
				<div class="col-md-6">
					<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
					@error('email')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
			</div>

			<div class="form-group row">
				<label for="message" class="col-md-4 col-form-label text-md-right">{{ __('Message') }}</label>

				<div class="col-md-6">
					<textarea id="message" type="text" class="form-control @error('message') is-invalid @enderror" name="message" required></textarea>

					@error('message')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
			</div>
			
			<div class="form-group row mb-0">
				<div class="col-md-6 offset-md-4">
					<button type="submit" class="btn btn-primary">
						{{ __('Send') }}
					</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection