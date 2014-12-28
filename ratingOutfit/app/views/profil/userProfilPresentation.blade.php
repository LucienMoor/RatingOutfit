@extends('viewTemplate')

@section('head')
    
	<meta charset="UTF-8">
	<title>Laravel PHP Framework</title>


@stop

@section('body')
  @include('profil/userProfil')
  <div class="bodyprofil text-center">
   {{ HTML::image("pictures/user/$user->picture") }}
    <?php $data=array('userID'=>Auth::id(),'contactID'=>$user->id);
             echo View::make('Contacts.AddRemoveForm')->with('data',$data);
            ?>
    <!-- delete the user (uses the destroy method DESTROY /users/{id} or  edit the user (uses the edit method found at GET /users/{id}/edit -->
     @if(Auth::id()==$user->id)
      <a class="btn btn-small btn-info" href="{{ URL::to('user/' . $user->id . '/edit') }}">Edit your profil</a>
      {{ Form::open(array('url' => 'user/' . $user->id)) }}
      {{ Form::hidden('_method', 'DELETE') }}
      {{ Form::submit('Delete my profil', array('class' => 'btn btn-danger')) }}
      {{ Form::close() }}
     @endif
    <h1>{{{$user->pseudo}}}</h1>
    <h2>{{{$user->presentation}}}</h2>  
  </div> 

  @include('articleDetail.index')
@stop
