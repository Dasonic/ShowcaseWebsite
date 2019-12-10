@extends('layouts.main_layout')

@section('title', 'Home')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
 <div class="card-body">
	<p>This is my body content.</p>
 </div>
@endsection