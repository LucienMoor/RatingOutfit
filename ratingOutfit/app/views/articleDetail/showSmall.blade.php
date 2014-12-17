<!-- app/views/nerds/show.blade.php -->

    <div class="articlePreview">
        
        <h2>{{{ $article->title }}}</h2>
          {{{ $article->description }}}<br>
          {{HTML::image("/pictures/article/$article->picture")}}<br>
        
    </div>
