@extends('layouts.main_layout')

@section('content')
	<div class="card p-0 mt-4 purple_border">
		<div class="card-header title-background purple_border">{{ __('Register') }}</div>

		<div class="card-body">
			<form method="POST" action="{{ route('register') }}">
				@csrf

				<div class="form-group row">
					<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

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
					<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email Address') }}</label>

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
					<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

					<div class="col-md-6">
						<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

						@error('password')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
				</div>

				<div class="form-group row">
					<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

					<div class="col-md-6">
						<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
					</div>
				</div>

				<div class="form-group row">
					<label for="captcha" class="col-md-4 col-form-label text-md-right">{{ __('Captcha') }}</label>
					<div class="col-md-6 captcha"> {{-- Align Right --}}
						<div class="row">
							<div class="col-12">
								<button type="button" class="btn btn-danger mr-2" class="reload" id="reload">
									&#x21bb;
								</button>
								<span>{!! captcha_img() !!}</span>
							</div>
							<div class="col-12 mt-2">
								<input id="captcha" type="text" class="form-control @error('captcha') is-invalid @enderror" name="captcha" required>
								@error('captcha')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>
					</div>
				</div>	

				<div class="form-group row mb-0">
					<div class="col-md-6 offset-md-4">
						<button type="submit" class="btn btn-primary">
							{{ __('Register') }}
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection
