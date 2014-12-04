<?php

class ContactController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = Contact::findUserContacts(Auth::id());
		    return View::make('subview/usersView')
            ->with('users', $users);
	}
  public function listContacts($id){
    $user=User::find($id);
    $users = $user->getContacts();
    return View::make('subview/contactList')
            ->with('users', $users)->with('user',$user);
  }


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
				        $rules = array(
            'userID'       => 'required',
            'contactID'      => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
          return Input::get('userID'). " - ".Input::get('contactID');
            return Redirect::to('user/'.Input::get('contactID'))
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
    
            // store
          if(!Contact::ifExist(Input::get('userID'),Input::get('contactID'))){
            $contact = new Contact;
            $contact->user_ID=Input::get('userID');
            $contact->contact_ID=Input::get('contactID');
            $contact->save();
          }

            // redirect
            return Redirect::to('user/'.Input::get('contactID'));
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
				$contact = Contact::find($id);
        // show the view and pass the article ID
        return View::make('profil.userProfilPresentation')
            ->with('user', $contact->contact_ID);
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
		$contact = Contact::find($id);
    $contact->delete();
    return Redirect::to('user');
	}


}
