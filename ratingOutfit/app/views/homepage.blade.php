@extends('viewTemplate')

@section('head')
    <title>Rating Outfit</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
                {{ HTML::style('css/homePage.css') }}
                {{ HTML::style('assets/css/bootstrap.min.css') }}
                {{ HTML::style('assets/css/bootstrap-responsive.min.css') }}
                {{ HTML::style('http://fonts.googleapis.com/css?family=Imprima') }}
@stop

@section('body')
   @include('subview/homeNavBar')
    <div class="page">
    <p class="randomArticles">
      {{ $randomArticleView or 'No article' }}
    </p>

    <p class="popularArticles">
      @if (isset($popularArticlesViews))
        @foreach ($popularArticlesViews as $popularArticleView)
          {{ $popularArticleView }}
        @endforeach
      @endif
    </p>
</div>
@stop
  
