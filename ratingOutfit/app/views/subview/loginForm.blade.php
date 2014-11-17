<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
<div class="container">

<h1>Login</h1>
 @if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
    {{ Form::open(array('url' => '/login'))}}
   
    <div>
        {{ $errors->first('pseudo', '<p>:message</p>') }}
        <strong> {{ Form::label('pseudo', 'Pseudo : ') }} </strong>
        {{ Form::text('pseudo') }}
      
        {{ $errors->first('password', '<p>:message</p>') }}
         <strong>{{ Form::label('password', 'Password : ') }} </strong>
        {{ Form::password('password') }}
    </div>

    {{ Form::submit('Login') }}

{{ Form::close() }}

</div>
</body>
</html>