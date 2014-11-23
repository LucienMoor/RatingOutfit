<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Commnents</title>
</head>
<body>
  {{ Form::open(array('url' => 'search', 'method' => 'get')) }}  
  <div id="searchInput">
    {{ Form::text('Search...') }}
    {{ Form::submit('Search') }}
  </div>
  {{ Form::close() }}
</body>
</html>