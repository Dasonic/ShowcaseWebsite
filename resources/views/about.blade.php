@extends('layouts.main_layout')

@section('title', 'About')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
	<div class="card-body">
		<p>About page</p>
	</div>
@endsection