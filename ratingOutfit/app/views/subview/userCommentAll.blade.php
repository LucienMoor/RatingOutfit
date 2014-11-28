<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Commnents</title>
</head>
<body>
  @include('profil/userProfil')
  <div class="usercommentall">
   @foreach($comments as $comment)
    {{$comment}}
   @endforeach
  </div>  
    @include('subview/userCommentForm')
</body>
</html>