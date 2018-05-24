<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
@extends('layouts.navbar')
@section('content')
<center>
<div class="jumbotron">
	<span class="h1 alert alert-success"><strong>Welcome!</strong> to Tasks Fetcher Site..</span>
	<hr>
<div class="img">
	<p class="h2" style="padding:40px 5px;word-spacing: 3px;letter-spacing: 5px">Make your self a cup of tea and enjoy!</p> 
 </div>
<iframe width="560" height="300" src="https://www.youtube.com/embed/OuFwYZNKMNg" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>    
<iframe width="560" height="300" src="https://www.youtube.com/embed/ARpn_6rFIjM" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
<iframe width="560" height="315" src="https://www.youtube.com/embed/OSqkP955SXI" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
</center>
</div>


@include('layouts.footer')
@endsection
</body>
</html>