<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  
</head>
<body>

    {{ Form::open(array('url' => 'user', 'method' => 'POST')) }}
  
    <p>
      {{ $errors->first('pseudo', '<p>:message</p>') }}
      <strong>{{ Form::label('pseudo', 'Pseudo* : ')  }}</strong>
      {{ Form::text('pseudo') }}
     <br />
      {{ $errors->first('password', '<p>:message</p>') }}
      <strong>{{ Form::label('password', 'Password* : ')  }}</strong>
      {{ Form::password('password') }}
     <br />
      {{ $errors->first('confirmpassword', '<p>:message</p>') }}
      <strong>{{ Form::label('confirmpassword', 'Confirm the password* : ')  }}</strong>
      {{ Form::password('confirmpassword') }}
     <br />
      {{ $errors->first('email', '<p>:message</p>') }}
     <strong>{{ Form::label('email', 'Email* : ')  }}</strong>
      {{ Form::email('email') }}
     <br />
     <strong>{{ Form::label('country', 'Country : ')  }}</strong>
      {{ Form::text('country') }}
     <br />
      {{ $errors->first('birthDate', '<p>:message</p>') }}
      <strong>{{ Form::label('birthDate', 'Birth date : ')  }}</strong>
      {{ Form::input('date', 'birthDate'); }}
     <br />
      {{ Form::label('picture', 'Would you like to already upload a picture for your profil ? : ')  }}
      {{ Form::file('picture') }}
     <br />
       {{ Form::label('description', 'Write a bit about you : ')  }}
       {{ Form::textarea('description') }}

    {{ Form::submit('Send !') }}
    </p>
  
    {{ Form::close() }}
</body>
</html>