<?php

class LoginController extends BaseController {

	public function loginValidate()
	{
    $rules = array(
        'pseudo' => 'required|min:3|max:20|alpha',
        'password' => 'required|min:6|max:12',
    );
    $validator = Validator::make(Input::all(), $rules);
    
    if ($validator->fails()) {
       return Redirect::to('/login')->withErrors($validator)->withInput(Input::except('password'));
    }
    else
    {
    $pseudo = Input::get('pseudo');
    $password = Input::get('password');
 
    if(Auth::attempt(array('pseudo' => $pseudo, 'password' => $password)))
       //Redirect the user to the URL they were trying to access before being caught by the authentication filter. A default URI may be given to this method in case the intended destination is not available.
       return Redirect::intended('/');
    else
         Session::flash('message', 'Pseudo or password incorrect');
         return Redirect::to('/login')->withInput(Input::except('password'));
    }
	}
}