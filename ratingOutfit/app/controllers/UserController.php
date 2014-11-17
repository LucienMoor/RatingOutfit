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
        'pseudo' => 'required|min:3|max:20|alpha',
        'password' => 'required|min:6|max:12',
        'confirmpassword' => 'required|same:password',
        'email' => 'required|email',
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
     
      $user->birthdate = Input::get('birthDate');
      $user->country = Input::get('country');
      $user->presentation = Input::get('description');
      //TODO image
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
  
    public function reportUser()
  {
    $userID=Input::get('userID');
    $user=User::find($userID);
    $user->nbReport=$user->nbReport+1;
    $user->save(); 
    return View::make('subview/articleComments');
  }

}
