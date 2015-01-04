<!-- app/views/nerds/edit.blade.php -->

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
		<a class="navbar-brand" href="{{ URL::to('nerds') }}">Nerd Alert</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('usuarios') }}">View All Users</a></li>
		<li><a href="{{ URL::to('usuarios/create') }}">Create a User</a>
	</ul>
</nav>

<h1>Edit {{ $usuario->email }}</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($usuario, array('route' => array('usuarios.update', $usuario->id), 'method' => 'PUT')) }}

	<div class="form-group">
		{{ Form::label('email', 'Email') }}
		{{ Form::email('email', null, array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('password', 'Password') }}
		{{ Form::password('password', null, array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('nombre', 'Name') }}
        {{ Form::text('nombre', null, array('class' => 'form-control')) }}
	</div>

    <div class="form-group">
        {{ Form::label('apellidos', 'Last name') }}
        {{ Form::text('apellidos', null, array('class' => 'form-control')) }}
    </div>


    {{ Form::submit('Edit the User!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>