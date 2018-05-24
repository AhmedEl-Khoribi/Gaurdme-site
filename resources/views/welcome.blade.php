<!DOCTYPE html>
<html>
<head>
	<title>Tasks Timeline</title>
	  <meta name="viewport" content="width=device-width, initial-scale=1">
{{-- 	<link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.css') }}">
 --}}</head>
<body>
@extends('layouts.navbar')
@section('content')
		<div class="jumbotron">
		<center><h2 style="border: 2px solid red; width:350px" class="alert alert-success"><em>All 
		Items</em></h2></center>
@if($flash = session('message'))
	<div class="alert alert-danger" role="alert">
		<b>{{ $flash }}</b>
	</div>	
@endif
	<center>
		<ul>
			@foreach($tasks as $task)
			<div class="container container-fluid">
			<li><h2> <a href="/tasks/{{ $task->id }}">{{ $task->title }}</a></h2></li>
			<span>Published At</span>
			<mark>{{ $task->created_at->toFormattedDateString() }}</mark>
			<br>
			<span> By</span>
			<mark>{{ ucfirst($task->user->name) }}</mark>
			<br>
			<blockquote class="blockquote">
			  <p>"{{ $task->body }}"</p>
			</blockquote>
			</div>
			<hr>
			@endforeach
		</ul>
			<div class="container">
		<a href="/tasks/create"><button class="btn btn-warning">Create A New Task</button></a>
			</div>
	</center>
{{-- 	<center>
		<div class="pagination">
			<li class="page-item">{!! $tasks->render() !!}</li>
		</div>
	</center>
 --}}
</div>

@include('layouts.footer')
@endsection
</body>
</html>