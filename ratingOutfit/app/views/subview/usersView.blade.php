@extends('viewTemplate')

@section('head')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                {{ HTML::style('assets/css/bootstrap.min.css') }}
                {{ HTML::style('assets/css/bootstrap-responsive.min.css') }}
                {{ HTML::style('assets/css/main.css') }}
                {{ HTML::style('http://fonts.googleapis.com/css?family=Imprima') }}
    <title>Users</title>
@stop

@section('body')
<div class="container">

<nav class="navbar navbar-inverse">
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
            <td>
             <?php $data=array('userID'=>Auth::id(),'contactID'=>$value->id);
             echo View::make('Contacts.AddRemoveForm')->with('data',$data);
            ?>
           </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
@stop