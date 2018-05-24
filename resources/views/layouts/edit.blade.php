<!DOCTYPE html>
<html>
<head>
	<title>Edit</title>
</head>
<body>
@extends('layouts.navbar')
@section('content')

	<div class="jumbotron">
		<div class="container">
				<CENTER>
					<span class="alert alert-warning h2">Edit Task</span>
				</CENTER>
		<form action="/edit/{{ $task->id }}" method="POST">
			{!! csrf_field() !!}
			<input type="hidden" name="_method" value="PATCH">
			<div class="form-group row">
  				<label for="title-input" class="col-2 col-form-label">Title</label>
 			<div class="col-10">
    			<input class="form-control" type="text" name='title' value="{{ $task->title }}" id="example-text-input">
  			</div>
			</div>
			<div class="form-group row">
				<div class="col-10">
   			  	<label for="editBody">Edit task body</label>
   				<textarea class="form-control" name="body" id="taskBody" rows="3">{{ $task->body }}</textarea>
   				</div>
  			</div>
  			<div class="col-10">
  			<button type="submit" class="btn btn-primary">Submit</button>
  			</div>
		</form>
		</div>
	</div>

@include('layouts.footer')
@endsection
</body>
</html>