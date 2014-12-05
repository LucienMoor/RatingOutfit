
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                {{ HTML::style('assets/css/bootstrap.min.css') }}
                {{ HTML::style('assets/css/bootstrap-responsive.min.css') }}
                {{ HTML::style('assets/css/main.css') }}
                {{ HTML::style('http://fonts.googleapis.com/css?family=Imprima') }}
</head>
<body>
  <img src="" alt="MyLogo"/>
  <div id="logo"><a href="/"><h1>Rating Outfit</h1></a></div>
  <div id="searchBox">@include('subview/searchBar')</div>
  
  @if (Auth::check())
  <div ud="userInfo">
  <a href="{{ URL::to('user/' . Auth::id()) }}">Me</a>
  <a href="{{ URL::to('auth/logout') }}">Log out</a>
  </div>
  @else
  <div ud="inscription">
  <a href="{{ URL::to('auth/login') }}">Sign in</a>
  <a href="/user/create"> Join </a>
  </div>
  @endif