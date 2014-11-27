<?php

class UserCommentController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$userComment = UserComment::all();
    
    return View::make('subview/userComment')->with('userComment', $userComment);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('subview/userComment');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		Session::put('user_ID',2);
		$rules = array(
      'comment'      =>  'required'
    ); 
    $validator=Validator::make(Input::all(),$rules);
    
    if($validator->fails()){
      return Redirect::to('userComment/create');
    }
    else {
            // store
             $userComment = new UserComment;
             $userComment->userEditor_ID      = Session::get('user_ID');
             $userComment->userDestinated_ID   = 2;//User::find(1)->id; TODO user's id not hard coding
             $userComment->comment      = Input::get('comment');
             $userComment->save();
       // redirect
            Session::flash('message', 'Successfully created a comment!');
            return Redirect::to('userComment');
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
		$comment = UserComment::find($id);

       
        return View::make('subview/userComment')
            ->with('comment', $comment);
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
