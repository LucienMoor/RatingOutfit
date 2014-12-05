<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
   {{ HTML::style('css/header.css') }}
</head>
<body>
  <div class="container">
    
      <h1><img src="" class="img-responsive" alt="MyLogo" /></h1>
      <h2>Rating Outfit</h2>
      @if (Auth::check())
      <div id="userInfo">
      <a href="{{ URL::to('user/' . Auth::id()) }}">Me</a>
      </div>
      @else
      <div id="inscription">
        <a href=""><h3>Sign in</h3></a>
        <a href="/user/create"><h3> Join</h3> </a>
      </div>
      @endif 

  </div>
</body>
</html>