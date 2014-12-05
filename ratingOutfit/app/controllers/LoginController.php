<?php

class LoginController extends BaseController {

  public function __construct()
  {
        $this->beforeFilter('auth', array('only' => 'getLogout'));
        $this->beforeFilter('guest', array('except' => 'getLogout'));
        $this->beforeFilter('csrf', array('on' => 'post'));
  }
  
  public function getLogin()
    {
        return View::make('subview/loginForm');
    }
  
	public function postLogin()
	{
    $rules = array(
        'pseudo' => 'required|min:3|max:20|alpha',
        'password' => 'required|min:6|max:12',
    );
    $validator = Validator::make(Input::all(), $rules);
    
    if ($validator->fails()) {
       return Redirect::to('/auth/login')->withErrors($validator)->withInput(Input::except('password'));
    }
    else
    {
    $pseudo = Input::get('pseudo');
    $password = Input::get('password');
 
    if(Auth::attempt(array('pseudo' => $pseudo, 'password' => $password), Input::get('remember')))
      {
       //Redirect the user to the URL they were trying to access before being caught by the authentication filter. A default URI may be given to this method in case the intended destination is not available.
      Session::flash('success_message', 'You have been correctly identified '.$pseudo);
       return Redirect::intended('/');
    }
    else
         {
      Session::flash('error_message', 'Pseudo or password incorrect');
         return Redirect::to('/auth/login')->withInput(Input::except('password'));
         }
    }
	}
  
  public function getLogout()
    {
        Auth::logout(); 
        return Redirect::to('/')->with('success_message', 'You have been correctly disconnected');
    }
}