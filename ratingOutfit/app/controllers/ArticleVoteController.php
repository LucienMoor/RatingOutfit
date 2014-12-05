<?php

class ArticleVoteController extends \BaseController {
  public function upVote()
    {
    $count = Vote::where('articles_ID','=',Input::get('articleID'))->where('user_ID','=',Input::get('userID'))->count();
    if($count==0)
      {
      $vote = new Vote;
      $vote->user_ID=Input::get('userID');
      $vote->articles_ID=Input::get('articleID');
      $vote->save();
      
      $article=Article::find(Input::get('articleID'));
      $article->point=$article->point+Input::get('point');
      $article->save();
      return Redirect::to('articleDetail');
    }
    else
      {
      Session::flash('error_message', "You already voted for this guy");
      return Redirect::to('articleDetail/'.Input::get('articleID'));
    }
    }
}