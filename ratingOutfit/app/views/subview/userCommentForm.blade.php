
  {{ Form::open(array('url' => 'userComments', 'method' => 'post')) }}
  <div class="usercomment">
    {{ Form::label('addcomment', 'Add your comment: ') }}
    {{ Form::textarea('comment',"Write a comment here",array(
    'id'      => 'textAreaComment',
    'rows'    => 10,)); }} 
     @if (Auth::check()) 
    {{ Form::submit('Add!', array('class' => 'btn btn-primary')) }}
    {{Form::hidden('userID',$data)}}
    {{ Form::close() }}
    @else
    <a href="{{ URL::to('auth/login') }}"> Sign in </a>  
    @endif
  </div>  

