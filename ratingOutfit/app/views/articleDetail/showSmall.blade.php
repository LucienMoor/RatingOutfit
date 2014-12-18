<!-- app/views/nerds/show.blade.php -->

    <div class="jumbotron small">
      <p>{{{ $article->title }}}</p>
      <p>{{{ $article->description }}}</p>
           <p class="smallPicture"> {{HTML::image("/pictures/article/$article->picture")}}</p>
    </div>
