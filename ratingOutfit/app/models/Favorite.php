<?php

class Favorite extends Eloquent {

	protected $table = 'Favorites';
	public $timestamps = false;
  
  public static function ifExist($userID,$articleID){
    $favorite = Favorite::where('user_ID','=',$userID)->where('articles_ID','=',$articleID)->get();
    return !$favorite->isEmpty();
  }
  public static function findID($userID,$articleID){
    $favorite = Favorite::where('user_ID','=',$userID)->where('articles_ID','=',$articleID)->first();
    return $favorite->id;
  }
  public static function findArticle($clientID)
  {
  $favorites = Favorite::where('user_ID','=',$clientID)->get();
  $articles=array();
  foreach($favorites as $key => $value)
    {
    $temp=Article::find($value->articles_ID);
    array_push($articles,$temp);
    
  }
  return $articles;
}

}