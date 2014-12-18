<!-- app/views/nerds/show.blade.php -->


<div class="container">
<h1>Showing {{{ $article->title }}}</h1>
    <div class="jumbotron text-center">
        <p>
           {{{ $article->description }}}<br>
           {{HTML::image("/pictures/article/$article->picture")}}<br>

          <strong>nombre de vote:</strong> {{{ $article->nbVotes() }}}<br>
          <strong>nombre de point:</strong> {{{ $article->point }}}<br>
          <strong>style:</strong> {{{ $article->style->style }}}<br>
          <strong>gender:</strong> {{{ $article->gender() }}}<br>
   
          @if (Auth::check()) 
            {{Form::open(array('action' => 'ArticleVoteController@upVote','method' => 'post'))}}
            {{Form::hidden('articleID', $article->id)}}
            {{Form::hidden('userID', Auth::id())}}
      <table class="center">
        <tr>
        <td>{{ Form::label('point-1', '1') }}{{Form::radio('point', '1',false,array('id'=>'point-1')) }}</td>
        <td>{{ Form::label('point-2', '2') }}{{Form::radio('point', '2',false,array('id'=>'point-2')) }}</td>
        <td>{{ Form::label('point-3', '3') }}{{Form::radio('point', '3',true,array('id'=>'point-3')) }}</td>
        <td>{{ Form::label('point-4', '4') }}{{Form::radio('point', '4',false,array('id'=>'point-4')) }}</td>
        <td>{{ Form::label('point-5', '5') }}{{Form::radio('point', '5',false,array('id'=>'point-5')) }}</td>
        </tr>
      </table>
            {{ Form::submit('upvote', array('class' => 'btn btn-primary')) }}
          {{ Form::close() }}
          @endif

             <?php $data=array('userID'=>Auth::id(),'articleID'=>$article->id);
             echo View::make('articleFavorite.AddRemoveForm')->with('data',$data);
            ?>
        </p>
    </div>

</div>
