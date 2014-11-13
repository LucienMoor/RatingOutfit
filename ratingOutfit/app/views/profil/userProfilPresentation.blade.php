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
    <img src="cat1.jpg" alt="Profil picture" />
    <h1>{{User::find(1)->pseudo}}</h1>
    <h2>{{User::find(1)->presentation}}</h2> 
  </div>  
</body>
</html>