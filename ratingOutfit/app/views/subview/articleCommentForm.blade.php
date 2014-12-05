<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Commnents</title>
</head>
<body>
  {{ Form::open(array('url' => 'articleComment', 'method' => 'post')) }}
  <div class="articlecomment">
    {{ Form::label('addcomment', 'add your comment: ') }}
    {{ Form::textarea('comment','Write a comment here!') }}
     @if (Auth::check()) 
    {{ Form::submit('Add!') }}
    {{ Form::close() }}
    @else
    <a href="{{ URL::to('auth/login') }}"> Sign in</a>  
    @endif
  </div>  
</body>
</html>