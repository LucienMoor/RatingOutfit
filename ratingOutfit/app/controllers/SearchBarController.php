<?php

class SearchBarController extends \BaseController {
  
  public function search()
    {
    $keyWord = Input::get('keyWord');
    $words = explode(' ',$keyWord);
    
    //$query = DB::table('Articles');
    
    $query="";
    foreach($words as $singleWords)
      {
        $query= $query.Article::where('title', 'LIKE', '%'. $singleWords .'%')->get();
      }
    return $query;
   // $results = $query->get();
    /*$articles=array();
    foreach($results as $key=>$article)
      {
        $temp=Article::find($article->articles_ID);
        array_push($articles,$temp);
      }*/
    
    return View::make('articleDetail.index')
            ->with('articles', $query);
  }
  
}
