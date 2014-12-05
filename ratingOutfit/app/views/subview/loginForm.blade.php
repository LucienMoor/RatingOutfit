@extends('viewTemplate')

@section('head')
    <title>Login</title>
@stop

@section('body')
<div class="container">

<h1>Login</h1>
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
    {{ Form::open(array('url' => '/auth/login'))}}
   
    <div>
        {{ $errors->first('pseudo', '<p>:message</p>') }}
        <strong> {{ Form::label('pseudo', 'Pseudo : ') }} </strong>
        {{ Form::text('pseudo') }}
      
        {{ $errors->first('password', '<p>:message</p>') }}
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