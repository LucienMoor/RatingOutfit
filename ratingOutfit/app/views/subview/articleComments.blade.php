@extends('viewTemplate')

@section('head')
	<title>Comments</title>
@stop

@section('body')
  <div class="showcommentarticle">
   @foreach(ArticleComment::all() as $value)
    {{ Form::open(array('url' => URL::action('UserController@reportUser'), 'id' => 'reportUser','method' => 'post')) }}
    <tr>
            
            <td>{{ Form::label('user', User::find($value->user_ID)->pseudo) }}</td>
            <td>{{ $value->comment }}</td>
            <td>{{ $value->created_at }}</td>
            <td>{{ Form::submit('Signal this user') }}</td>
            <td>{{ Form::hidden('userID', $value->user_ID) }}</td>
    </tr> 
    {{Form::close()}}
    <br />
    <br />
    <br />
    @endforeach
  </div>
  @include('subview/articleCommentForm')
@stop
</html>