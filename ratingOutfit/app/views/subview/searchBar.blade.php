<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Commnents</title>
</head>
<body>
  {{Form::open(array('url' => URL::action('SearchBarController@search'), 'id' => 'reportUser','method' => 'post'))}}  
  <div id="searchInput">
    {{ Form::text('keyWord','Search...') }}
    {{ Form::submit('Search') }}
  </div>
  {{ Form::close() }}
</body>
</html>