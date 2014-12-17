@extends('viewTemplate')

@section('head')
    <title>Rating Outfit</title>
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
  
