@extends('layouts.main_layout')

@section('title', 'Projects')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <p>Projects page</p>
@endsection