<!-- app/views/nerds/show.blade.php -->

    <div class="jumbotron small">
      <p><strong>Title</strong>{{{ $article->title }}}</p>
      <p><strong>description:</strong>{{{ $article->description }}}</p>
           <p class="smallPicture"><strong>picture:</strong> {{HTML::image("/pictures/article/$article->picture")}}</p>
    </div>
