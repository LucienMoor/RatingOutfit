<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('user') }}">User Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('user') }}">View All Users</a></li>
        <li><a href="{{ URL::to('user/create') }}">Create a User</a>
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
            <td>ID</td>
            <td>Name</td>
            <td>Email</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $key => $value)
        <tr>
            <td>{{{ $value->id }}}</td>
            <td>{{{ $value->pseudo }}}</td>
            <td>{{{ $value->email }}}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the user (uses the destroy method DESTROY /users/{id} -->
                {{ Form::open(array('url' => 'user/' . $value->id)) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete this User') }}
                {{ Form::close() }}

                <!-- show the user (uses the show method found at GET /users/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('user/' . $value->id) }}">Show this User</a>

                <!-- edit this user (uses the edit method found at GET /users/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('user/' . $value->id . '/edit') }}">Edit this User</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>