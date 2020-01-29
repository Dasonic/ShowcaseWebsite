@extends('layouts.main_layout')

@section('title', 'Projects')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
	<div class="card p-0">
		<div class="card-body">
			<p>Projects Page</p>
		</div>
	</div>
@endsection