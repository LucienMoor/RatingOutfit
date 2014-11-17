<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  
</head>
<body>

    {{ Form::open(array('url' => 'user', 'method' => 'POST','files'=>true)) }}
  
       
     <div>
      {{ $errors->first('pseudo', '<p>:message</p>') }}
      <strong>{{ Form::label('pseudo', 'Pseudo* : ')  }}</strong>
      {{ Form::text('pseudo') }}
     </div>
     <div>
      {{ $errors->first('password', '<p>:message</p>') }}
      <strong>{{ Form::label('password', 'Password* : ')  }}</strong>
      {{ Form::password('password') }}
     
      {{ $errors->first('confirmpassword', '<p>:message</p>') }}
      <strong>{{ Form::label('confirmpassword', 'Confirm the password* : ')  }}</strong>
      {{ Form::password('confirmpassword') }}
      
     </div>
     <div>
      {{ $errors->first('email', '<p>:message</p>') }}
     <strong>{{ Form::label('email', 'Email* : ')  }}</strong>
      {{ Form::email('email') }}
     
     <strong>{{ Form::label('country', 'Country : ')  }}</strong>
      {{ Form::text('country') }}
     
      {{ $errors->first('birthDate', '<p>:message</p>') }}
      <strong>{{ Form::label('birthDate', 'Birth date : ')  }}</strong>
      {{ Form::input('date', 'birthDate'); }}
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
</body>
</html>