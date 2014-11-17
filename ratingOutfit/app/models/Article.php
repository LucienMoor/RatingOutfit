<?php

class Article extends Eloquent {

	protected $table = 'Articles';
	public $timestamps = true;
  public function gender(){
     return ($this->belongsTo('Gender','gender_ID'));  
  }
  public function style(){
    return ($this->belongsTo('Style','style_ID'));
  }
}