<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel PHP Framework</title>
  {{ HTML::style('css/navbar.css') }}
</head>
<body>
  {{Session::put('user_ID',1)}}
  @include('subview/header')
  <nav>
    <a href="{{ URL::to('user/' . Session::get('user_ID')) }}"> Profil </a>
    <a href="/favoriteArticle"> Favorite Articles </a>
    <a href="/favoriteUser"> Favorite Users </a>
    <a href="/comments"> Comments </a>
  </nav>   
</body>
</html>
