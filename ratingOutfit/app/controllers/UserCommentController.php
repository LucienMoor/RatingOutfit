<?php

class UserCommentController extends \BaseController {

  public function __construct()
    {
        // Perform CSRF check on all post/put/patch/delete requests
        $this->beforeFilter('csrf', array('on' => array('post', 'put', 'patch', 'delete')));
    
         $this->beforeFilter('auth',  array('only' =>
                            array('create', 'store')));
    }
  
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
		$rules = array(
      'comment'      =>  'required',
      'userID'       =>  'required'
    ); 
    $validator=Validator::make(Input::all(),$rules);
    
    if($validator->fails()){
      return Redirect::to('allUserComment/'.Input::get('userID'));
    }
    else {
            // store
             $userComment = new UserComment;
             $userComment->userEditor_ID = Auth::id();
             $userComment->userDestinated_ID   = Input::get('userID');//User::find(1)->id; TODO user's id not hard coding
             $userComment->comment      = Input::get('comment');
             $userComment->save();
       // redirect
            Session::flash('success_message', 'Successfully created a comment!');
            return Redirect::to('allUserComment/'.Input::get('userID'));
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
