<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel PHP Framework</title>
  {{ HTML::style('css/navbar.css') }}
</head>
<body>
   @include('subview/header')
  
  <div class="navbar">
    <a href="/user"> Users </a>
    <a href="/articleGallery"> Articles </a>
  </div>   
  
  <div class="randomArticles">
    {{ $randomArticleView or 'Default' }}
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
