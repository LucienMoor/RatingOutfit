<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel PHP Framework</title>
  {{ HTML::style('css/userprofil.css') }}
</head>
<body>
  @include('profil/userProfil')
  <div class="bodycomment">
    @foreach(UserComment::all() as $value)
    {{ Form::open(array('url' => URL::action('UserController@reportUser'), 'id' => 'reportUser','method' => 'post')) }}
    <tr>
            
            <td>{{ Form::label('user', User::find($value->userEditor_ID)->pseudo) }}</td>
            <td>{{ $value->comment }}</td>
            <td>{{ $value->created_at }}</td>
            <td>{{ Form::submit('Signal this user') }}</td>
            <td>{{ Form::hidden('userID', $value->userEditor_ID) }}</td>
    </tr> 
    {{Form::close()}}
    <br />
    <br />
    <br />
    @endforeach
  </div> 
  @include('subview/userCommentForm')
</body>
</html>