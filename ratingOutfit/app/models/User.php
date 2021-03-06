<?php
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {
  
  use RemindableTrait;

	public $timestamps = true;
  /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Users';
 
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password');
 
    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }
 
    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }
 
    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken()
    {
        return $this->remember_token;
    }
 
    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string  $value
     * @return void
     */
    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }
 
    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return 'remember_token';
    }
 
    /**
     * Get the e-mail address where password reminders are sent.
     *
     * @return string
     */
    public function getReminderEmail()
    {
        return $this->email;
    }

  public function getContacts(){
    $contacts = Contact::where('user_ID','=',$this->id)->get();
    $user=array();
    foreach($contacts as $key => $value)
      {
      $temp=User::find($value->contact_ID);
      array_push($user,$temp);

    }
    return $user;
  }
  public function getArticles(){
    $articles=Article::where('user_ID','=',$this->id)->get();
    return $articles;
    
  }
  public function getFavoriteArticles()
    {
    $favorites = Favorite::where('user_ID','=',$this->id)->get();
    $articles=array();
    foreach($favorites as $key => $value)
      {
      $temp=Article::find($value->articles_ID);
      array_push($articles,$temp);

    }
    return $articles;
  }
  
   public function comment()
    {
        $comment = UserComment::where('userDestinated_ID','=',$this->id)->get();
        return $comment;
    }
  
}