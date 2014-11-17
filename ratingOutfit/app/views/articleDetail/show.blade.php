<!DOCTYPE html>
<html>
<head>
    <title>Show specific article</title>
</head>
<body>
<div class="container">

<h1>Showing {{ $article->title }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $article->title }}</h2>
        <p>
            <strong>Description:</strong> {{ $article->description }}<br>
            <strong>Picture:</strong> {{ $article->picture }}
          <strong>nb Vote:</strong> {{ $article->nbVote }}
          <strong>Point:</strong> {{ $article->point }}
          
          <strong>Picture:</strong>{{HTML::image('30609440-homme-d-affaires-choque-par-la-mauvaise-information.jpg')}}
          <strong>style:</strong> {{ $article->style_ID }}
           <strong>gender:</strong> {{ $article->gender_ID }}


          
        </p>
    </div>

</div>
</body>
</html>