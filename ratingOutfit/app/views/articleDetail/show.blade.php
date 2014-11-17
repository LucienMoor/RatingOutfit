<!-- app/views/nerds/show.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>specific article</title>
</head>
<body>
<div class="container">

<h1>Showing {{ $article->title }}</h1>

    <div class="jumbotron text-center">
        <p>
            <strong>description:</strong> {{ $article->description }}<br>
           <strong>picture:</strong> {{HTML::image("/pictures/article/$article->picture")}}<br>
          <strong>nombre de vote:</strong> {{ $article->nbVote }}<br>
          <strong>nombre de point:</strong> {{ $article->point }}<br>
          <strong>style:</strong> {{ $article->style->style }}<br>
          <strong>gender:</strong> {{ $article->gender->gender }}<br>
          
        </p>
    </div>

</div>
</body>
</html>