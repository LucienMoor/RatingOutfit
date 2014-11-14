<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('subview/inscriptionForm');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
      $rules = array(
        'pseudo' => 'required|unique:Users|min:3|max:20|alpha',
        'password' => 'required|min:6|max:12',
        'confirmpassword' => 'required|same:password',
        'email' => 'required|unique:Users|email',
        'birthDate' => 'date'
    );
    $validator = Validator::make(Input::all(), $rules);
 
    if ($validator->fails()) {
       return Redirect::to('user/create')->withErrors($validator)->withInput();
    }
    else
    {
      echo 'Inscription success !!! Congratulations '.Input::get('pseudo');
      $user = new User;

      $user->pseudo = Input::get('pseudo');
      $user->password = Input::get('password');
      $user->email = Input::get('email');
     
      if (Input::has('birthDate'))
      {
          $user->birthdate = Input::get('birthDate');
      }
      
      $user->country = Input::get('country');
      $user->presentation = Input::get('description');
      //$user->picture = Input::get('picture');
      //TODO prendre l'image sur le serveur et enregistrer le chemin
      $user->save();
      
    }
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
  
  

}
