
  <div class="bodycomment">
    {{ Form::open(array('url' => URL::action('UserController@reportUser'), 'id' => 'reportUser','method' => 'post')) }}
    <tr>
            
            <td>{{ Form::label('user', User::find($comment->userEditor_ID)->pseudo) }}</td>
            <td>{{ $comment->comment }}</td>
            <td>{{ $comment->created_at }}</td>
            <td>{{ Form::submit('Signal this user') }}</td>
            <td>{{ Form::hidden('userID', $comment->userEditor_ID) }}</td>
    </tr> 
    {{Form::close()}}
    <br />
    <br />
    <br />
  </div> 
