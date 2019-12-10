@extends('layouts.main_layout')

@section('title', 'Projects')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
	<div class="card-body">
		<p>Projects page</p>
	</div>
@endsection