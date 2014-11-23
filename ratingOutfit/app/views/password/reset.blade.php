{{ Form::open(array('action' => 'RemindersController@postRest'))}}
   
    {{ Form::hidden(token, $token) }}
    <strong>{{ Form::label('email', 'Email : ') }} </strong>
    {{ Form::email('email') }}

    <strong>{{ Form::label('password', 'Password : ') }} </strong>
    {{ Form::password('password') }}

    <strong>{{ Form::label('password_confirmation', 'Confirm password : ') }} </strong>
    {{ Form::password('password_confirmation') }}

    {{ Form::submit('Change Password') }}

{{ Form::close() }}