@if (Session::has('error'))
           {{ Session::get('error') }}         
@endif
@if (Session::has('status'))
           {{ Session::get('status') }}         
@endif

{{ Form::open(array('action' => 'RemindersController@postRemind'))}}
   
    <strong>{{ Form::label('email', 'Email : ') }} </strong>
    {{ Form::email('email') }}

    {{ Form::submit('Send Reminder') }}

{{ Form::close() }}

