<title>Login</title>
@extends('layouts.navbar')
@section('content')

<div class="jumbotron" style="height:100%">
		<center><h2 style="border: 2px solid red; width:350px" class="alert alert-success"><em>login</em></h2>
		</center>

<div class="container">
	<div class="alert alert-success">
		  <strong>Welcome to that area!</strong> Please Enter Your login Information.</div>
<form method="POST" action="/login">
{{ csrf_field() }}
<div class="form-row">
	<div class="form-group col-md-6">
	  <label for="inputEmail4">Email</label>
	  <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email" required>
	</div>
	<div class="form-group col-md-6">
	  <label for="inputPassword4">Password</label>
	  <input type="password" name="password" class="form-control" id="inputPassword4" required placeholder="Password">
	</div>
</div>
<button type="submit" class="btn btn-success" style="margin:auto 20px">Login</button>
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



