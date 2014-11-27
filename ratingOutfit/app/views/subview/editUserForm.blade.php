<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
<div class="container">

<h1>Edit {{{ $user->pseudo }}}</h1>

{{ Form::model($user, array('route' => array('user.update', $user->id), 'method' => 'PUT','files'=>true)) }}
  
    <div>
        {{ $errors->first('newPassword', '<p>:message</p>') }}
        <strong> {{ Form::label('newPassword', 'New Password : ') }} </strong>
        {{ Form::password('newPassword') }}
      
        {{ $errors->first('confirmNewPassword', '<p>:message</p>') }}
         <strong>{{ Form::label('confirmNewPassword', 'Confirm the new password : ') }} </strong>
        {{ Form::password('confirmNewPassword') }}
    </div>

    <div>
      {{ $errors->first('email', '<p>:message</p>') }}
       <strong>{{ Form::label('email', 'Email : ') }} </strong>
      {{ Form::email('email') }}
     
     <strong>{{ Form::label('country', 'Country : ')  }}</strong>
      {{ Form::text('country') }}
     
      {{ $errors->first('birthdate', '<p>:message</p>') }}
      <strong>{{ Form::label('birthdate', 'Birth date : ')  }}</strong>
      {{ Form::input('date', 'birthdate'); }}
    </div>
  
    <div>
      <strong> {{ Form::label('picture', 'Profil picture : ')  }}  </strong>
      {{ Form::file('picture') }}
     </div>
    <div>
        <strong>{{ Form::label('presentation', 'Presentation : ')  }}  </strong>
       {{ Form::textarea('presentation') }}
   </div>

    {{ Form::submit('Save changes') }}

{{ Form::close() }}

</div>
</body>
</html>