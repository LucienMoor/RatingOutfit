@extends('viewTemplate')

@section('head')
    <title>Password remind</title>
@stop

@section('body')
@include('subview/homeNavBar')
<h1>Password Remind</h1>

{{ Form::open(array('action' => 'RemindersController@postRemind'))}}
   
    <strong>{{ Form::label('email', 'Email : ') }} </strong>
    {{ Form::email('email') }}

    {{ Form::submit('Send Reminder') }}

{{ Form::close() }}
@stop
