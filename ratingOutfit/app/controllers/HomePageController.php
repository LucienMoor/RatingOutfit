<?php

class HomePageController extends \BaseController {
  
  public function getHomePage()
  {
    
    $nbArticles = Article::all()->count();
    if($nbArticles>0)
    { 
      //Select a random article
      $randomArticleId = Article::getRandomArticleId();
     
			$request = Request::create('/articleDetail/preview/'.$randomArticleId, 'GET', array());
		  $response = Route::dispatch($request);
			$randomArticleView = $response->getContent();
			//$code = $response->getStatusCode();
      
      //Select the most popular articles
      $popularArticlesViews = array();
      $popularArticlesIds = Article::getPopularArticlesIds(10);
   
     foreach( $popularArticlesIds as $popularArticleId)
       {
        
      $request = Request::create('/articleDetail/preview/'.$popularArticleId->id, 'GET', array());
		  $response = Route::dispatch($request);
			$popularArticlesView[] = $response->getContent(); //add a popular article to our list
        
      }
     
      
			 return View::make('homepage', array('randomArticleView' => $randomArticleView, 'popularArticlesViews' => $popularArticlesView));
    }
   return View::make('homepage');
  }
  
}