<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{ asset('css/stylesheet.css') }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="/homepage"><button class="btn btn-link"><b><em>Reda's Task Manager</em></b></button></a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="/homepage"><button class="btn btn-link">Home</button></a></li>
      <li class="active"><a href="/"><button class="btn btn-link">All tasks</button></a></li>
      <li><a href="/tasks/create"><button class="btn btn-warning">Create tasks</button></a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      @if(Auth::check())
      <li><a href="#"><button class="btn btn-link" style="margin: auto -25px;"><span class="glyphicon glyphicon-user"></span> Hello {{ Auth::user()->name }}</button></a></li>
      <li><a href="/logout"><button class="btn btn-link"><span class="glyphicon glyphicon-log-out"></span> Logout</button></a></li>
      <li><span style="font-size:30px;cursor:pointer" onclick="openNav()"><button class="btn btn-danger" style="margin: 15px 5px">&#9776; Archives</button></span>
      </li>
      @else
      <li><a href="/register"><button class="btn btn-primary"><span class="glyphicon glyphicon-user"></span> Sign Up</button></a></li>
      <li><a href="/login"><button class="btn btn-success"><span class="glyphicon glyphicon-log-in"></span> Login</button></a></li>
      <li><span style="font-size:30px;cursor:pointer" onclick="openNav()"><button class="btn btn-danger" style="margin: 15px 5px">&#9776; Archives</button></span>
      </li>
      @endif
    </ul>
  </div>
</nav>


<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <h3><center style="color:white">By Date</center></h3>
  @foreach($archives as $stats)
    <a href="/?day={{ $stats['day'] }}&month={{ $stats['month'] }}&year={{ $stats['year'] }}" style="font-size: 18px">{{ $stats['day'] ." " . $stats['month'] . " " . $stats['year'] }}</a>
  @endforeach
   <h3><center style="color:white">By Tags</center></h3>
  @foreach($tags as $tag)
    <a href="/tasks/tags/{{ $tag }}" style="font-size: 14px">{{ $tag }}</a>
  @endforeach
  <h3><center style="color:white">By Authors</center></h3>
  @foreach($tasks as $task)
    <a href="/?Auther={{ $task->user->id }}" style="font-size: 14px">{{ $task->user->name }}</a>
  @endforeach
</div>

@yield('content')


<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>
     
</body>
</html> 
