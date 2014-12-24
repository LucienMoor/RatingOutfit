<div class="container">



<h1>All the Users</h1>

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

                <!-- show the user (uses the show method found at GET /users/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('user/' . $value->id) }}">Show this User</a>

                <!-- edit this user (uses the edit method found at GET /users/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('user/' . $value->id . '/edit') }}">Edit this User</a>

            </td>
            <td>
              @if (Auth::check()) 
                 <?php $data=array('userID'=>Auth::id(),'contactID'=>$value->id);
                 echo View::make('Contacts.AddRemoveForm')->with('data',$data);

                ?>
             @endif
           </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
