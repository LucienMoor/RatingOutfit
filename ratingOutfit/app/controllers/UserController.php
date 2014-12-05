<?php

class UserController extends \BaseController {

  
  public function __construct()
    {
        // Perform CSRF check on all post/put/patch/delete requests
        $this->beforeFilter('csrf', array('on' => array('post', 'put', 'patch', 'delete')));
    }
  
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
        'pseudo' => 'required|unique:Users,pseudo|min:3|max:20|alpha',
        'password' => 'required|min:6|max:12',
        'confirmpassword' => 'required|same:password',
        'email' => 'required|unique:Users,email|email',
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
      $user->password = Hash::make(Input::get('password'));
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
          $destination=__DIR__.'/../../public/pictures/user/'.$name;
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
     $articles=$user->getArticles();
     
     $view=View::make('profil/userProfilPresentation')->with('user', $user);
    $view .= View::make('articleDetail.index')->with('articles',$articles);
    // show the view and pass the user to it
    return $view;
	}

  public function getComment($id)
  {
   
      $user = User::find($id);
      $comments=$user->comment();

      $userComment=array();
      foreach( $comments as $comment)
       {
        $request = Request::create('/userComments/'.$comment->id,'GET', array());
        $response = Route::dispatch($request);
        $userComment[] = $response->getContent();
        
      }
      return View::make('subview/userCommentAll', array('comments'=>$userComment, 'user'=>$user));
  }
  

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//check if the user is logged
    if (Auth::check())
    {
      //check if the user who edit the profil is the owner
      if(Auth::id() == $id)
        {
    // get the user
   $user = User::find($id);

    // show the edit form and pass the user
    return View::make('subview/editUserForm')
      ->with('user', $user);
    }
    else return "you can't edit a other account than your own";
    }  
    else return "you must be logged for this action";
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
        'newPassword' => 'min:6|max:12',
        'confirmNewPassword' => 'same:newPassword',
        'email' => 'unique:Users,email,'.$id.'|email',
        'birthDate' => 'date'
    );
    $validator = Validator::make(Input::all(), $rules);

    if ($validator->fails()) {
       return Redirect::to('user/'.$id.'/edit')->withErrors($validator)->withInput(Input::except('password'));
    }
    else
    {
      $user = User::find($id);;

      $user->password = Hash::make(Input::get('newPassword'));
      $user->email = Input::get('email');
     
      if (Input::has('birthdate'))
      {
          $user->birthdate = Input::get('birthdate');
      }
      
      $user->country = Input::get('country');
      $user->presentation = Input::get('presentation');
      
       if($_FILES['picture']['error'] == 0){
          //Récupération des informations sur le fichier
          $infosfichier = pathinfo($_FILES['picture']['name']);
          $extension_upload = $infosfichier['extension'];
          $extensions_autorisees = array('png', 'jpg');
          $name = $_FILES['picture']['name'];
          $destination=__DIR__.'/../../public/pictures/user/'.$name;
          if (in_array($extension_upload, $extensions_autorisees)){
              //Le fichier aura le nom du fichier uploader 
              $user->picture = $name;
            //TODO Supprimer l'ancienne image
              move_uploaded_file($_FILES['picture']['tmp_name'], $destination);
          }
       }
      $user->save();
      Session::flash('message', 'User successfully updated !');
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
    //check if the user is logged
    if (Auth::check())
    {
      //check if the user who delete the profil is the owner
      if(Auth::id() == $id)
        {
		    // delete
        $user = User::find($id);
        $user->delete();

        // redirect
        Session::flash('message', 'User successfully deleted!');
        return Redirect::to('user');
         }
    else return "you can't delete a other account than your own";
    }  
    else return "you must be logged for this action";
	}
  
  public function reportUser()
  {
    if (Auth::check())
    {
      $userID=Input::get('userID');
      $user=User::find($userID);
      $user->nbReport=$user->nbReport+1;
      $user->save(); 
      return Redirect::to('user/');  
    }  
    else return "you must be logged for this action";
  }
  
}
