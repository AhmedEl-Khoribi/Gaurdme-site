<title>Add a task</title>
@extends('layouts.navbar')
@section('content')

<div class="jumbotron">
		<center><h2 style="border: 2px solid red; width:350px" class="alert alert-success"><em>Add Task</em></h2></center>
<center>
<div class="row">
		<form action="/tasks" method="POST">
			{{ csrf_field() }} {{-- for security --}}
				<div class="col-md-4">
					<label>Add Title:- </label>
				</div>
		<div class="col-md-1">
			<input type="text" name="title" placeholder="Title">
		</div>
</div>		
<hr>
<div class="row">
				<div class="col-md-4">
					<label>Add Task Body:- </label>
				</div>
		<div class="col-md-1">		
			<textarea name="body" placeholder="Task.." cols="50" rows="5"></textarea>
		</div>
</div>
<hr>
<div class="row">
		<div class="col-md-4">
			<label>Add Tags sparated by "comma":- </label>
		</div>
		<div class="col-md-1">
			<input type="text" name="tags" placeholder="Tags">
		</div>
		<hr>
		<hr>
</div>			
<hr>
<div class="row">
		<div class="col-md-8">
			<input class="btn btn-success" type="submit" value="Create new task">
		</div>
</form>
		<div class="col-md-12">
		@if(count($errors))
		<div class="alert alert-danger" style="margin: 45px auto">
			<ul>
				@foreach($errors->all() as $error)
				<li><b>{{ $error }}</b></li>
				@endforeach
			</ul>
		</div>
		@endif
		</div>
	</div>

</div>
@include('layouts.footer')
@endsection