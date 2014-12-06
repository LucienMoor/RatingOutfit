<!-- app/views/nerds/show.blade.php -->
{{ HTML::style('css/articleDetail.css') }}

<div class="container">

      

    <div class="jumbotron text-center small">
        <p>
          <strong>Title</strong>{{ $article->title }}
           <strong>description:</strong>{{{ $article->description }}}<br>
           <strong>picture:</strong> {{HTML::image("/pictures/article/$article->picture")}}<br>
        </p>
    </div>

</div>