<?php

class Favorite extends Eloquent {

	protected $table = 'Favorites';
	public $timestamps = false;
  
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