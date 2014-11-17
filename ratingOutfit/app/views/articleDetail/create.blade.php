<!DOCTYPE html>
<?php
  Session::put('userID', 1);
  $genderArray=Gender::getGenderArray();
  $styleArray=Style::getStyleArray();
?>
<html>
<head>
    <title>Create article</title>
</head>
<body>
<div class="container">

<h1>Create article</h1>


{{ Form::open(array('url' => 'articleDetail','files' => true)) }}

    <div class="form-group">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', Input::old('title'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('picture', 'Picture') }}
        {{Form::file('picture')}}
    </div>
  
    <div class="form-group">
        {{ Form::label('description', 'Description') }}
        {{ Form::textarea('description', Input::old('description'), array('class' => 'form-control')) }}
    </div>
  
    <div class="form-group">
        {{Form::select('gender', $genderArray)}}
    </div>
  
    <div class="form-group">
        {{Form::select('style', $styleArray)}}
    </div>


    {{ Form::submit('Create the article', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>