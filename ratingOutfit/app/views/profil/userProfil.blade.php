<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel PHP Framework</title>
  {{ HTML::style('css/navbar.css') }}
</head>
<body>  
  @include('subview/header')
  <nav>
    <a href="{{ URL::to('user/'.$user->id) }}"> Profil </a>
    <a href="/favoriteArticle"> Favorite Articles </a>
    <a href="/favoriteUser"> Favorite Users </a>
    <a href="{{ URL::to('/allUserComment/'.$user->id) }}"> Comments </a>
  </nav>   
</body>
</html>
