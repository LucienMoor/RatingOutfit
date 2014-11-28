<?php

class Contact extends Eloquent {

	protected $table = 'Contacts';
	public $timestamps = false;
  public static function findID($userID,$contactID){
    $contact = Contact::where('user_ID','=',$userID)->where('contact_ID','=',$contactID)->first();
    return $contact->id;
  }
  public static function findUserContacts($userID){
  $contacts = Contact::where('user_ID','=',$userID)->get();
  $user=array();
  foreach($contacts as $key => $value)
    {
    $temp=User::find($value->contact_ID);
    array_push($user,$temp);
    
  }
  return $user;
  }
  public static function ifExist($userID,$contactID){
    $contact = Contact::where('user_ID','=',$userID)->where('contact_ID','=',$contactID)->get();
    return !$contact->isEmpty();
  }
}