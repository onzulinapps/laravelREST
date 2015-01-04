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
            <li><a href="{{ URL::to('usuarios') }}">View all Users</a></li>
            <li><a href="{{ URL::to('usuarios/create') }}">Create a user</a>
            <li><a href="{{ URL::to('usuarios/login'} }}">Login user</a></li>
        </ul>
    </nav>

    <h1>All the Users</h1>

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>Email</td>
            <td>Name</td>
            <td>Last name</td>
            <td>Actions</td>
        </tr>
        </thead>
        <tbody>
        @foreach($usuarios as $key => $value)
        <tr>
            <td>{{ $value->email }}</td>
            <td>{{ $value->nombre }}</td>
            <td>{{ $value->apellidos }}</td>


            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                <!-- we will add this later since its a little more complicated than the first two buttons -->
                {{ Form::open(array('url' => 'usuarios/' . $value->id, 'class' => 'pull-right')) }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Delete this User', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}

                <!-- show the user (uses the show method found at GET /nerds/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('usuarios/' . $value->id) }}">Show this User</a>

                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('usuarios/' . $value->id . '/edit') }}">Edit this User</a>

            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

</div>
</body>
</html>