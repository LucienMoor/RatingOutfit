@extends('viewTemplate')

@section('head')
  <title>Inscription</title>
@stop

@section('body')
    @include('subview/homeNavBar')
<div class="container">
    <h1>Inscription</h1>

    {{ Form::open(array('url' => 'user', 'method' => 'POST','files'=>true)) }}
  
       
     <div>
     {{ $errors->first('pseudo', '<div class="alert alert-danger" role="alert">:message</div>') }}
      <strong>{{ Form::label('pseudo', 'Pseudo* : ')  }}</strong>
      {{ Form::text('pseudo') }}
     </div>
     <div>
      {{ $errors->first('password', '<div class="alert alert-danger" role="alert">:message</div>') }}
      <strong>{{ Form::label('password', 'Password* : ')  }}</strong>
      {{ Form::password('password') }}
     
      {{ $errors->first('confirmpassword', '<div class="alert alert-danger" role="alert">:message</div>') }}
      <strong>{{ Form::label('confirmpassword', 'Confirm the password* : ')  }}</strong>
      {{ Form::password('confirmpassword') }}
      
     </div>
     <div>
      {{ $errors->first('email', '<div class="alert alert-danger" role="alert">:message</div>') }}
     <strong>{{ Form::label('email', 'Email* : ')  }}</strong>
      {{ Form::email('email') }}
     
     <strong>{{ Form::label('country', 'Country : ')  }}</strong>
      {{ Form::text('country') }}
     
      {{ $errors->first('birthDate', '<div class="alert alert-danger" role="alert">:message</div>') }}
      <strong>{{ Form::label('birthDate', 'Birth date : ')  }}</strong>
      {{ Form::input('date', 'birthDate', $value = "1990-01-01"); }}
     </div>
     <div>
      {{ Form::label('picture', 'Would you like to already upload a picture for your profil ? : ')  }}
      {{ Form::file('picture') }}
     </div>
    <div>
       {{ Form::label('description', 'Write a bit about you : ')  }}
       {{ Form::textarea('description') }}
        </div>
    {{ Form::submit('Send !') }}
  
    {{ Form::close() }}
</div>it 
@stop