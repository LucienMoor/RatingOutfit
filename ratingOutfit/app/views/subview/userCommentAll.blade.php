<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Comments</title>
</head>
<body>
  @include('subview/header')
  @include('profil/userProfil')
  <div class="usercommentall">
   @foreach($comments as $comment)
    {{$comment}}
   @endforeach
  </div> 
  <?php
     echo View::make('subview/userCommentForm')->with('data', $user->id);
    ?>
</body>
</html>