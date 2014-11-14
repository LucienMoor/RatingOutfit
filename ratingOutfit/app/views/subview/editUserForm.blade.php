<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
<div class="container">

<h1>Edit {{ $user->pseudo }}</h1>

{{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT')) }}

    <div>
        {{ $errors->first('actualPassword', '<p>:message</p>') }}
         <strong>{{ Form::label('actualPassword', 'Actual Password* : ') }} </strong>
        {{ Form::password('actualPassword') }}
    </div>
  
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
     
      {{ $errors->first('birthDate', '<p>:message</p>') }}
      <strong>{{ Form::label('birthDate', 'Birth date : ')  }}</strong>
      {{ Form::input('date', 'birthDate'); }}
    </div>
  
    <div>
      <strong> {{ Form::label('picture', 'Profil picture : ')  }}  </strong>
      {{ Form::file('picture') }}
     </div>
    <div>
        <strong>{{ Form::label('description', 'Presentation : ')  }}  </strong>
       {{ Form::textarea('description') }}
   </div>

    {{ Form::submit('Save changes') }}

{{ Form::close() }}

</div>
</body>
</html>