<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel PHP Framework</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
                {{ HTML::style('assets/css/bootstrap.min.css') }}
                {{ HTML::style('assets/css/bootstrap-responsive.min.css') }}
                {{ HTML::style('http://fonts.googleapis.com/css?family=Imprima') }}
</head>
<body>
   @include('subview/header')
   <nav class="navbar">
    <div class="navbar-inner">
      <ul class="nav">
        <li> <a href="/user"> Users </a></li>
        <li><a href="/articleDetail"> Articles </a></li>
      </ul>
    </div>
  </nav>   
  <div class="randomArticles">
    {{ $randomArticleView or 'No article' }}
  </div>
  
  <div class="popularArticles">
    @if (isset($popularArticlesViews))
      @foreach ($popularArticlesViews as $popularArticleView)
        {{ $popularArticleView }}
      @endforeach
    @endif
  </div>
  
</body>
</html>
