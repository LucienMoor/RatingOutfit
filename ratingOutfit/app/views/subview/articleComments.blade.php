<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel PHP Framework</title>
</head>
<body>
  <div class="showcomment">
   @foreach(ArticleComment::all() as $value)
    <tr>
            <td>{{ User::find(1)->pseudo }}</td>
            <td>{{ $value->comment }}</td>
            <td>{{ $value->created_at }}</td>
            <td>{{ Form::button('Signal this user') }}</td>
    </tr> 
    <br />
    <br />
    <br />
    @endforeach
  </div>  
  @include('subview/articleCommentForm')
</body>
</html>