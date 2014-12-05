@extends('viewTemplate')

@section('head')
    <title>Comments</title>
@stop

@section('body')
@include('profil/userProfil')
  <div class="usercommentall">
   @foreach($comments as $comment)
    {{$comment}}
   @endforeach
  </div> 
  {{View::make('subview/userCommentForm')->with('data', $user->id);}}

@stop