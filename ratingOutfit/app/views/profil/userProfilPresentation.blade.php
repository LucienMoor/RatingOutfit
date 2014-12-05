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
    <h1>{{{$user->pseudo}}}</h1>
    <h2>{{{$user->presentation}}}</h2>
  </div> 

  @include('articleDetail.index')
@stop
