<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
</head>
<body>
  {{Session::put('user_ID',2)}}
  <img src="" alt="MyLogo"/>
  <div id="logo"><h1>Rating Outfit</h1></div>
  <div id="searchBox">@include('subview/searchBar')</div>
  
  @if (Auth::check())
  <div ud="userInfo">
  <a href="{{ URL::to('user/' . Auth::id()) }}">Me</a>
  </div>
  @else
  <div ud="inscription">
  <a href="">Sign in</a>
  <a href="/user/create"> Join </a>
  </div>
  @endif
</body>
</html>