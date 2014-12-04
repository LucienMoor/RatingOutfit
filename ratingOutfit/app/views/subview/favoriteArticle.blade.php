<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel PHP Framework</title>
  {{ HTML::style('css/userprofil.css') }}
</head>
<body>
  @include('subview/header')
  @include('profil/userProfil')
  <div class="bodyarticlefavorite">
    <h1>My Favorite articles</h1>
  </div>  
</body>
</html>