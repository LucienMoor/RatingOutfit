<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::any('/', 'HomePageController@getHomePage');

Route::get('/userProfil', function()
{
	return View::make('profil/userProfil');
});

Route::get('/favoriteArticle', function()
{
	return View::make('subview/favoriteArticle');
});
Route::get('/favoriteUser', function()
{
	return View::make('subview/favoriteUser');
});
/*Route::get('/userComment', function()
{
	return View::make('subview/userCommentAll');
});*/
Route::get('/articleDetail', function()
{
	return View::make('articleDetail');
});
Route::get('/articleGallery', function()
{
	return View::make('articleGallery');
});
Route::resource('contact','ContactController');
Route::resource('articleFavorite', 'ArticleFavorisController');
//root for Article
Route::resource('articleDetail', 'articleDetailController');
Route::get('articleDetail/small/{id}','articleDetailController@showSmall');

Route::get('/pictures/article/{pictureName}', function($picture)
{
  
	$filepath = '/home/action/workspace/ratingOutfit/pictures/article/' . $picture;
	return HTML::image($filepath);
});
Route::get('articleList/{id}','ArticleFavorisController@listFavorites');
Route::get('contactList/{id}','ContactController@listContacts');
Route::post('upVote','ArticleVoteController@upVote');

Route::get('/login', array('as' => 'login', 'before' => 'guest', function()
{
    return View::make('subview/loginForm');
}));

Route::controller('auth', 'LoginController');
Route::controller('password', 'RemindersController'); 
Route::get('allUserComment/{id}','UserController@getComment');
Route::post('report',['uses' => 'UserController@reportUser']);
Route::post('search', 'SearchBarController@search');

App::missing(function($exception)
{
    return View::make('error404');
});

Route::resource('user', 'UserController');
Route::resource('articleComment', 'ArticleCommentController');
Route::resource('userComments', 'UserCommentController');


