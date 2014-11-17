<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel PHP Framework</title>
  {{ HTML::style('css/userprofil.css') }}
</head>
<body>
  @include('profil/userProfil')
  <div class="bodyprofil">
   
   {{ HTML::image("pictures/user/$user->picture") }}
    <button type="button">Love</button>
    <h1>{{$user->pseudo}}</h1>
    <h2>{{$user->presentation}}</h2> 
  </div>  
</body>
</html>