<!-- app/views/usuarios/show.blade.php -->

<!DOCTYPE html>
<html>
<head>
	<title>Look! I'm CRUDding</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('usuarios') }}">User Alert</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('usuarios') }}">View All Users</a></li>
		<li><a href="{{ URL::to('usuarios/create') }}">Create a User</a>
	</ul>
</nav>

<h1>Showing {{ $usuario->id }}</h1>

	<div class="jumbotron text-center">
		<h2>{{ $usuario->nombre }}</h2>
		<p>
			<strong>Email:</strong> {{ $usuario->email }}<br>
            <strong>Nombre:</strong> {{ $usuario->nombre }} <br>
            <strong>Apellidos:</strong> {{ $usuario->apellidos }} <br>
			<!--<strong>Level:</strong> {{ $usuario->nerd_level }}-->
		</p>
	</div>

</div>
</body>
</html>