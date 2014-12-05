@extends('viewTemplate')

@section('head')
    <title>Login</title>
@stop

@section('body')
@include('subview/homeNavBar')
<div class="container">

<h1>Login</h1>

    {{ Form::open(array('url' => '/auth/login'))}}
   
    <div>
        {{ $errors->first('pseudo', '<div class="alert alert-danger" role="alert">:message</div>') }}
        <strong> {{ Form::label('pseudo', 'Pseudo : ') }} </strong>
        {{ Form::text('pseudo') }}
      
       {{ $errors->first('password', '<div class="alert alert-danger" role="alert">:message</div>') }}
    
         <strong>{{ Form::label('password', 'Password : ') }} </strong>
        {{ Form::password('password') }}
    </div>
  <div>
    {{ Form::label('remember', 'Remember me ')}}
    {{ Form::checkbox('remember','true') }}
    </div>

    {{ Form::submit('Login') }}

{{ Form::close() }}
<a href="{{ URL::to('password/remind') }}">Forgot your password?</a>

</div>
@stop