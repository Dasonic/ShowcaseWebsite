@extends('layouts.main_layout')

@section('title', 'Contact')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
	<div class="card-body">
		<p>Contact page</p>
	</div>
@endsection