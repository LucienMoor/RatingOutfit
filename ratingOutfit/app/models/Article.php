<?php

class Article extends Eloquent {

	protected $table = 'Articles';
	public $timestamps = true;
  public function gender(){
     return ($this->belongsTo('Gender','gender_ID')->get()[0]->gender);  
  }
  public function style(){
    return ($this->belongsTo('Style','style_ID'));
  }
  public function nbVotes(){
    $array= ($this->hasMany('Vote','user_ID'));
    return count($array);
  }
  public static function getRandomArticleId()
  {
    return DB::select('SELECT id FROM Articles ORDER BY RAND() LIMIT 1')[0]->id;
  }
  public static function getPopularArticlesIds($nbArticles)
  {
     return DB::select('SELECT id FROM Articles ORDER BY point DESC LIMIT '.$nbArticles);
  }
}