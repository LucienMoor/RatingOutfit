@extends('viewTemplate')
<?php
  $genderArray=Gender::getGenderArray();
  $styleArray=Style::getStyleArray();
?>

@section('head')
     <title>Create article</title>
@stop

@section('body')
@include('subview/homeNavBar')

    <div class="container">
    

<h1>Create article</h1>


{{ Form::open(array('url' => 'articleDetail','files' => true)) }}

    <div class="form-group">
        {{ $errors->first('title', '<div class="alert alert-danger" role="alert">:message</div>') }}
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', Input::old('title'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ $errors->first('picture', '<div class="alert alert-danger" role="alert">:message</div>') }}
        {{ Form::label('picture', 'Picture') }}
        {{Form::file('picture')}}
    </div>
  
    <div class="form-group">
        {{ $errors->first('description', '<div class="alert alert-danger" role="alert">:message</div>') }}
        {{ Form::label('description', 'Description') }}
        {{ Form::textarea('description', Input::old('description'), array('class' => 'form-control')) }}
    </div>
  
    <div class="form-group">
        {{ $errors->first('gender', '<div class="alert alert-danger" role="alert">:message</div>') }}
        {{Form::select('gender', $genderArray)}}
    </div>
  
    <div class="form-group">
        {{ $errors->first('style', '<div class="alert alert-danger" role="alert">:message</div>') }}
        {{Form::select('style', $styleArray)}}
    </div>


    {{ Form::submit('Create the article', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
@stop