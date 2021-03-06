<?php

class articleDetailController extends \BaseController {

  
  public function __construct()
    {
        // Perform CSRF check on all post/put/patch/delete requests
        $this->beforeFilter('csrf', array('on' => array('post', 'put', 'patch', 'delete')));
    
        $this->beforeFilter('auth',  array('only' =>
                            array('create', 'store','edit','update','destroy')));
    }
  
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
    $articles=Article::all();
    
		$view = View::make('articleDetail.index')->with('articles',$articles);
    
    $subHead = View::make('subview/homeNavBar');
    return View::make('contentView')->withView($view)->withHeader('<title>Articles</title>')->with('subHead',$subHead);
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
            $article->user_ID = Auth::id();
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
	 * Display the specified resource alone.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $article = Article::findOrFail($id);

        $view = View::make('articleDetail.show')
            ->with('article', $article)->with('comments',$article->getComments());
    //return $article;
     $subHead = View::make('subview/homeNavBar');
    return View::make('contentView')->withView($view)->withHeader('<title>'.$article->title.'</title>')->with('subHead',$subHead);
	}
  
  /**
	 * Display the specified resource for display with other.
	 *
	 * @param  int  $id
	 * @return Response
	 */

  public function showSmall($id)
	{
       $article = Article::findOrFail($id);

        // show the view and pass the nerd to it
   
        return View::make('articleDetail.showHomepage')
            ->with('article', $article);
	}
  
  public function showPreview($id)
	{
       $article = Article::findOrFail($id);

        // show the view and pass the nerd to it
   
        return View::make('articleDetail.showSmall')
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
      //check if the user who edit the profil is the owner
      $article = Article::findOrFail($id);
      if(Auth::id() == $article->user_ID)
        {
        // show the edit form and pass the nerd
        return View::make('articleDetail.edit')
            ->with('article', $article);
        }
       Session::flash('error_message', "You can't edit a other article than your own !");
    
       return Redirect::to('/articleDetail/'.$id);
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
          
            $article = Article::findOrFail($id);
            $article->title       = Input::get('title');
          if($_FILES['picture']['error'] == 0){
            $article->picture      = $_FILES['picture']['name'];
          }
            $article->description = Input::get('description');
            $article->user_ID = Auth::id();
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
             Session::flash('sucess_message', "You have successfully edited an article !");
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
      //check if the user who edit the profil is the owner
       $article = Article::findOrFail($id);
      if(Auth::id() == $article->user_ID)
        {
		    
        $article->delete();

        // redirect
        Session::flash('sucess_message', "You have successfully removed an article !");
        return Redirect::to('articleDetail');
        }
        Session::flash('error_message', "You can't delete a other article than your own !");
       return Redirect::to('/articleDetail/'.$id);
     }

}
  
