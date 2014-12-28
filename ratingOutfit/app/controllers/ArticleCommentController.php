<?php

class ArticleCommentController extends \BaseController {

  
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
		$articleComment = ArticleComment::all();
    
    return View::make('subview/articleComments')->with('articleComment', $articleComment);
    
	}
  
  public function search()
    {
      $data = Input::all();
    if(Request::ajax())
    {
      
       
        }
        
        else{
            return 0;
        }
    }


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
    return View::make('subview/articleComments');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
      'comment'      =>  'required'
    ); 
    $validator=Validator::make(Input::all(),$rules);
    
    if($validator->fails()){
      return Redirect::to('articleComment/create');
    }
    else {
            // store
             $articleComment = new ArticleComment;
             $articleComment->user_ID      = Auth::id();
             $articleComment->article_ID   = Input::get('articleID');//Article::find(1)->id;
             $articleComment->comment      = Input::get('comment');
             $articleComment->save();
       // redirect
            Session::flash('success_message', 'Successfully created a comment!');
            return Redirect::to('articleDetail/'.Input::get('articleID'));
        }
    ;}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		
        $comment = ArticleComment::findOrFail($id);

       
        return View::make('subview/articleComments')
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
		//cannot edit an comment 
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//cannot update a comment
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//cannot delete a comment
	}
  



}
