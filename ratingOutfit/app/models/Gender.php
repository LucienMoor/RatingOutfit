<?php

class Gender extends Eloquent {

	protected $table = 'Genders';
	public $timestamps = false;

  public static function getGenderArray(){
    $genderArray=array();
    $genderResult=Gender::all();
    foreach ($genderResult as $gender)
    {
        $genderArray[$gender->id]=$gender->gender;
    }
    return $genderArray;
  }
}