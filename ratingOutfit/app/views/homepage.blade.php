@extends('viewTemplate')

@section('head')
    <title>Rating Outfit</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://rawgithub.com/desandro/classie/master/classie.js"></script>
 <script src="http://masonry.desandro.com/masonry.pkgd.js "></script>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
                {{ HTML::style('css/homePage.css') }}
                {{ HTML::style('assets/css/bootstrap.min.css') }}
                {{ HTML::style('assets/css/bootstrap-responsive.min.css') }}
                {{ HTML::style('http://fonts.googleapis.com/css?family=Imprima') }}
@stop
@section('body')
   @include('subview/homeNavBar')
    <div id="masonry-grid" class="page">
      <div class="randomArticles">
        {{ $randomArticleView or 'No article' }}
      </div>
      <div class="popularArticles">
        @if (isset($popularArticlesViews))
          @foreach ($popularArticlesViews as $popularArticleView)
          <div class="grid-item">
            {{ $popularArticleView }}
        </div>
          @endforeach
        @endif
      </div>
    </div>
<script>
$(document).ready(function() {
  var container = document.querySelector('#masonry-grid');
  var element=document.querySelector('.popularArticles');
  var msnry = new Masonry( container, {
    columnWidth: 60
  });
  $( ".smallPicture" ).click(function(event) {
    classie.toggle( event.target, 'gigante');
    msnry.layout();
  });
});
</script>
@stop