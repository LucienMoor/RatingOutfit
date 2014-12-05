
  {{ Form::open(array('url' => 'articleComment', 'method' => 'post')) }}
  <div class="articlecomment">
    {{ Form::label('addcomment', 'Add your comment: ') }}
    {{ Form::textarea('comment','Write a comment here!') }}
     @if (Auth::check()) 
    {{ Form::submit('Add!') }}
    {{ Form::close() }}
    @else
    <a href="{{ URL::to('auth/login') }}"> Sign in</a>  
    @endif
  </div>  
