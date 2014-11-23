<?php

class Style extends Eloquent {

	protected $table = 'Styles';
	public $timestamps = false;
  
  public static function getStyleArray(){
    $styleArray=array();
    $styleResult=Style::all();
    foreach ($styleResult as $style)
    {
        $styleArray[$style->id]=$style->style;
    }
    return $styleArray;
  }
}