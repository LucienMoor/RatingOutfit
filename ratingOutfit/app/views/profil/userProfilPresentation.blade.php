@extends('viewTemplate')

@section('head')
    
	<meta charset="UTF-8">
	<title>Laravel PHP Framework</title>
  {{ HTML::style('css/userprofil.css') }}

@stop

@section('body')
  @include('profil/userProfil')
  <div class="bodyprofil text-center">
   {{ HTML::image("pictures/user/$user->picture") }}
    <?php $data=array('userID'=>Auth::id(),'contactID'=>$user->id);
             echo View::make('Contacts.AddRemoveForm')->with('data',$data);
            ?>
    <!-- delete the user (uses the destroy method DESTROY /users/{id} -->
    <div class="text-center">
     @if(Auth::id()==$user->id)
      {{ Form::open(array('url' => 'user/' . $user->id)) }}
      {{ Form::hidden('_method', 'DELETE') }}
      {{ Form::submit('Delete my profil') }}
      {{ Form::close() }}
     @endif
    </div>
    <h1>{{{$user->pseudo}}}</h1>
    <h2>{{{$user->presentation}}}</h2>  
  </div> 

  @include('articleDetail.index')
@stop
