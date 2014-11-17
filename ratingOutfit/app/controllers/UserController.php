<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
    //get all the users
		$users = User::all();
    
     // load the view and pass the users
    return View::make('subview/usersView')
            ->with('users', $users);
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
       return Redirect::to('user/create')->withErrors($validator)->withInput(Input::except('password'));
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
      
       if($_FILES['picture']['error'] == 0){
          //Récupération des informations sur le fichier
          $infosfichier = pathinfo($_FILES['picture']['name']);
          $extension_upload = $infosfichier['extension'];
          $extensions_autorisees = array('png', 'jpg');
          $name = $_FILES['picture']['name'];
          $destination=__DIR__.'/../../pictures/user/'.$name;
          if (in_array($extension_upload, $extensions_autorisees)){
              //Le fichier aura le nom du fichier uploader 
              $user->picture = $name;
              move_uploaded_file($_FILES['picture']['tmp_name'], $destination);
          }
       }
      $user->save();
      Session::flash('message', 'User successfully created !');
      return Redirect::to('user');
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
		 // get the user
     $user = User::find($id);

    // show the view and pass the user to it
    //TODO montrer le profil associé
    //return View::make('subView/singleUserView.blade.php')
      //->with('user', $user);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//TODO vérifier que l'utilisateur à le droit de modifier
    
    // get the user
   $nerd = User::find($id);

    // show the edit form and pass the user
    return View::make('subview/editUserForm')
      ->with('user', $user);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		 $rules = array(
        'password' => 'required|min:6|max:12',
        'newPassword' => 'min:6|max:12',
        'confirmpassword' => 'same:newPassword',
        'email' => 'unique:Users|email',
        'birthDate' => 'date'
    );
    $validator = Validator::make(Input::all(), $rules);
 
    if ($validator->fails()) {
       return Redirect::to('user/'.$id.'/edit')->withErrors($validator)->withInput(Input::except('password'));
    }
    else
    {
      $user = User::find($id);;

      $user->password = Input::get('newPassword');
      $user->email = Input::get('email');
     
      if (Input::has('birthDate'))
      {
          $user->birthdate = Input::get('birthDate');
      }
      
      $user->country = Input::get('country');
      $user->presentation = Input::get('description');
      
       if($_FILES['picture']['error'] == 0){
          //Récupération des informations sur le fichier
          $infosfichier = pathinfo($_FILES['picture']['name']);
          $extension_upload = $infosfichier['extension'];
          $extensions_autorisees = array('png', 'jpg');
          $name = $_FILES['picture']['name'];
          $destination=__DIR__.'/../../pictures/user/'.$name;
          if (in_array($extension_upload, $extensions_autorisees)){
              //Le fichier aura le nom du fichier uploader 
              $user->picture = $name;
              move_uploaded_file($_FILES['picture']['tmp_name'], $destination);
          }
       }
      $user->save();
      Session::flash('message', 'User successfully created !');
      return Redirect::to('user');
    }
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		 DB::table('Users')->where('id', $id)->delete();
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
