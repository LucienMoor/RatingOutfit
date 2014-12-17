@extends('viewTemplate')

@section('head')
    <title>Rating Outfit</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://rawgithub.com/desandro/classie/master/classie.js"></script>
 <script src="http://masonry.desandro.com/masonry.pkgd.js "></script>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

  {{ HTML::style('css/homepage.css') }}
@stop
@section('body')
   @include('subview/homeNavBar')
<div class="page">
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
</div>
@stop
