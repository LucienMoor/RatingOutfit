<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Commnents</title>
</head>
<body>
  {{ Form::open(array('url' => 'userComments', 'method' => 'post')) }}
  <div class="usercomment">
    {{ Form::label('addcomment', 'add your comment: ') }}
    {{ Form::textarea('comment','Write a comment here!') }}
    {{ Form::submit('Add!') }}
    {{Form::hidden('userID',$data)}}
    {{ Form::close() }}
  </div>  
</body>
</html>