
  {{ Form::open(array('url' => 'articleComment', 'method' => 'post')) }}
  <div class="articlecomment">
    {{ Form::label('addcomment', 'Add your comment: ') }}
    {{ Form::textarea('comment',"Write a comment here!",array(
    'id'      => 'textAreaComment',
    'rows'    => 10,)); }}
    @if (Auth::check()) 
    {{ Form::submit('Add!', array('class' => 'btn btn-primary')) }}
    {{ Form::close() }}
    @else
    <a href="{{ URL::to('auth/login') }}"> Sign in</a>  
    @endif
  </div>  
