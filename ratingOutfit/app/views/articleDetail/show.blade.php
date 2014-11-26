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
          <strong>nombre de vote:</strong> {{ $article->nbVotes() }}<br>
          <strong>nombre de point:</strong> {{ $article->point }}<br>
          <strong>style:</strong> {{ $article->style->style }}<br>
          <strong>gender:</strong> {{ $article->gender->gender }}<br>
          {{Form::open(array('action' => 'ArticleVoteController@upVote','method' => 'post'))}}
            {{Form::hidden('articleID', $article->id)}}
            {{Form::hidden('userID', Session::get('userID'))}}
          {{Form::text('point','5')}}
            {{ Form::submit('upvote', array('class' => 'btn btn-primary')) }}
          {{ Form::close() }}
             <?php $data=array('userID'=>Session::get('userID'),'articleID'=>$article->id);
             echo View::make('articleFavorite.AddRemoveForm')->with('data',$data);
            ?>
          
        </p>
    </div>

</div>
</body>
</html>