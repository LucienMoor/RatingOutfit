<?php

class ArticleFavorisController extends \BaseController {
  
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
		$articles = Favorite::findArticle(Auth::id());
		return View::make('articleDetail.index')->with('articles',$articles);
	}
  	public function listFavorites($id)
    {
      $user = User::findOrFail($id);
      $articles = $user->getFavoriteArticles();
		  $view =  View::make('articleDetail.index')->with('articles',$articles);
      $header = View::make('profil/userProfil')->with('user',$user);
      return View::make('contentView')->withView($view)->with('subHead',$header);
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
            'articleID'      => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('articleDetail/'.Input::get('articleID'))
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
    
            // store
          if(!Favorite::ifExist(Input::get('userID'),Input::get('articleID'))){
            $favoris = new Favorite;
            $favoris->user_ID=Input::get('userID');
            $favoris->articles_ID=Input::get('articleID');
            $favoris->save();
          }

            // redirect
            return Redirect::to('articleDetail/'.Input::get('articleID'));
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
		$favorite = Favorite::findOrFail($id);
        // show the view and pass the article ID
        return View::make('articleDetail.show')
            ->with('article', $favorite->article_ID);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//empty, it's pointless to modify a favorite.
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
		$favorite = Favorite::findOrFail($id);
    $favorite->delete();
    return Redirect::to('articleDetail');
	}


}
