<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel PHP Framework</title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
                {{ HTML::style('assets/css/bootstrap.min.css') }}
                {{ HTML::style('assets/css/bootstrap-responsive.min.css') }}
                {{ HTML::style('assets/css/main.css') }}
                {{ HTML::style('http://fonts.googleapis.com/css?family=Imprima') }}
    
  
</head>
<body>  
  @include('subview/header')
  <nav class="navbar">
    <div class="navbar-inner">
      <ul class="nav">
        <li><a href="{{ URL::to('user/'.$user->id) }}"> Profil </a></li>
        <li><a href="{{ URL::to('/articleList/'.$user->id) }}"> Favorite Articles </a></li>
        <li><a href="{{ URL::to('/contactList/'.$user->id) }}"> Favorite Users </a></li>
        <li><a href="{{ URL::to('/allUserComment/'.$user->id) }}"> Comments </a></li>
      </ul>
    </div>
  </nav>   
</body>
</html>
