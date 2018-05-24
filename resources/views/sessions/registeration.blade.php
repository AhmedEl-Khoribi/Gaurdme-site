<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
{{-- 	<link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.css') }}">
 --}}</head>
<body>
@extends('layouts.navbar')
@section('content')

<div class="jumbotron" style="height:100%">
		<center><h2 style="border: 2px solid red; width:350px" class="alert alert-success"><em>Register</em></h2>
		</center>

	<div class="container">
	<form method="POST" action="/register">
			{{ csrf_field() }}
		<div class="alert alert-success">
			  <strong>Welcome!</strong> Please Fill Down That Information To Register.
			</div>
<div class="form-row">
    <div class="form-group col-md-6">
    	<form action="index.php?do=insert" method="POST">
      <label for="inputEmail4">Name</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Full Name" name="name">
 	</div>
 	<div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="text" name="email" class="form-control" id="inputEmail4" placeholder="Email">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Password">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password Confirmation</label>
      <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Password Confirmation">
    </div>
</div>
<div class="col-md-12">
<button type="submit" class="btn btn-primary">Sign Up</button>
</div>
</form>

<div class="col-md-4">
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
@include('layouts.footer')
@endsection
