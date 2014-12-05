
  {{ Form::open(array('url' => 'articleComment', 'method' => 'post')) }}
  <div class="articlecomment">
    {{ Form::label('addcomment', 'Add your comment: ') }}
    {{ Form::textarea('comment','Write a comment here!') }}
    {{ Form::submit('Add!') }}
    {{ Form::close() }}
  </div>  
