<?php

class articleDetailController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
    $articles=Article::all();
		return View::make('articleDetail.index')->with('articles',$articles);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
    		return View::make('articleDetail.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
    Session::put('userID', 1);
              $rules = array(
            'title'       => 'required',
            'picture'      => 'required',
            'description' => 'required',
            'gender'=> 'required',
            'style'=>'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('articleDetail/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
    
            // store
          
            $article = new Article;
            $article->title       = Input::get('title');
            $article->picture      = $_FILES['picture']['name'];
            $article->description = Input::get('description');
            $article->user_ID = Session::get('userID');
            $article->point = 0;
            $article->nbVote = 0;
            $article->gender_ID=Input::get('gender');
            $article->style_ID=Input::get('style');
            $article->save();
         //upload image
        if($_FILES['picture']['error'] == 0){
          //Récupération des informations sur le fichier
          $infosfichier = pathinfo($_FILES['picture']['name']);
          $extension_upload = $infosfichier['extension'];
          $extensions_autorisees = array('png', 'jpg');
          $name = $_FILES['picture']['name'];
          $destination=__DIR__.'/../../public/pictures/article/'.$name;
          if (in_array($extension_upload, $extensions_autorisees)){
              //Le fichier aura le nom du fichier uploader  
              move_uploaded_file($_FILES['picture']['tmp_name'], $destination);
            
          }
        }
            // redirect
            return Redirect::to('articleDetail');
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
        $article = Article::find($id);

        // show the view and pass the nerd to it
        return View::make('articleDetail.show')
            ->with('article', $article);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		    $article = Article::find($id);

        // show the edit form and pass the nerd
        return View::make('articleDetail.edit')
            ->with('article', $article);
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
            'title'       => 'required',
            //'picture'      => 'required',
            'description' => 'required',
            'gender'=> 'required',
            'style'=>'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('articleDetail/'.$id.'/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
    
            // edit
          
            $article = Article::find($id);
            $article->title       = Input::get('title');
          if($_FILES['picture']['error'] == 0){
            $article->picture      = $_FILES['picture']['name'];
          }
            $article->description = Input::get('description');
            $article->user_ID = Session::get('userID');
            $article->gender_ID=Input::get('gender');
            $article->style_ID=Input::get('style');
            $article->save();
         //upload image
        if($_FILES['picture']['error'] == 0){
          //Récupération des informations sur le fichier
          $infosfichier = pathinfo($_FILES['picture']['name']);
          $extension_upload = $infosfichier['extension'];
          $extensions_autorisees = array('png', 'jpg');
          $name = $_FILES['picture']['name'];
          $destination=__DIR__.'/../../public/pictures/article/'.$name;
          if (in_array($extension_upload, $extensions_autorisees)){
              //Le fichier aura le nom du fichier uploader  
              move_uploaded_file($_FILES['picture']['tmp_name'], $destination);
            
          }
        }
            // redirect
            return Redirect::to('articleDetail');
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
		  // delete
        $article = Article::find($id);
        $article->delete();

        // redirect
        return Redirect::to('articleDetail');
	}


}
