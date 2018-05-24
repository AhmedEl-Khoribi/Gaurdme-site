<!DOCTYPE html>
<html>
<head>
	<title>Specific Task</title>
</head>
<body>
@extends('layouts.navbar')
@section('content')
@if($flash = session('message'))
	<div class="alert alert-success" role="alert">
		{{ $flash }}
	</div>	
@endif
	<div class="jumbotron">
					<center><h2><u>{{ $task->title }}</u></h2></center>
					<br>
		<div class="container alert alert-success" style="margin:auto 10px;width: 100%">
		<div class="row">
			<div class="col-sm-4">
			<mark><b>Auther:-</b> {{ $task->user->name }}</mark>
			</div>
			<hr>	
			<div class="col-lg-10">
			<mark><b>Published at:-</b> {{ $task->created_at->toFormattedDateString() }}</mark>
			</div>
			<hr>
			@if(count($task->tag))
			<div class="col-lg-10">
				<mark><b>Tags:-</b></mark>
			@foreach($task->tag as $tag)
			<mark><a href="tags/{{ $tag->name }}">{{ $tag->name }}, </a></mark>
			@endforeach
			</div>
			@endif
			<hr>
			<hr>
		</div>
		<div class="row">
		<div class="col-sm-2">
			<mark><b>Task Body:- &nbsp;</b></mark>	
		</div>
		<div class="col-xl-10">
		<h1 class="alert alert-warning">" {{ $task->body }} "</h1>
		</div>
		@if(Auth::check())
		@if(auth()->user()->id === $task->user->id)
		<div class="col-sm-2" style="float: right;">
			<a href="/task/{{ $task->id }}/delete"><button class="btn btn-danger">Delete</button></a>
		</div>
		<div class="col-sm-2" style="float: right;">
			<a href="/task/{{ $task->id }}/edit"><button class="btn btn-success">Edit</button></a>
		</div>
		@endif
		@endif
	</div>
</div>
<hr>
<label style="margin: auto 30px">Comments:- &nbsp;</label>
@if(count($task->comments))
		<div class="container">
			@foreach($task->comments as $comment)
			<div class="row">
				<div class="col-sm-2">
					<?php $user_id=$comment->user_id;
					 $user=$task->user->where('id', $user_id)->get(['name']);?>
					 @foreach($user as $u)
					<span>Wrote by:-<br><em> {{ $u->name }}</em></span>
					@endforeach
				</div>	
			<div class="col-sm-6">	
			<div class="alert alert-primary">
				<mark> {{ $comment->created_at->diffForHumans() }}</mark>
				<p class="alert alert-danger">{{ $comment->body }}</p>
			</div>
			</div>
			</div>
			<hr>
			@endforeach
		</div>
@else
	<div class="alert alert-primary" style="margin: auto 20px">
				No comments for that task
			</div>
@endif			
	<hr>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<form method="POST" action="/tasks/{{ $task->id }}/comment">
					{{ csrf_field() }} {{-- for security --}}
					<legend>Add Comment</legend>
					<textarea type="text" name="body" rows="4" cols="50" placeholder="Type Comment.."></textarea>
					<input type="submit" value="Submit" class="btn btn-success" style="float:right;">
				</form>
		</div>
		<div class="col-md-8">
		@if(count($errors))
		<div class="alert alert-danger" style="margin: 45px auto">
			<ul>
				@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
		</div>
		</div>
	</div>	

	</div>
@include('layouts.footer')
@endsection
</body>
</html>