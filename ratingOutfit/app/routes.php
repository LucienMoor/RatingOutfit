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

Route::get('/', 'HomePageController@getHomePage');

Route::get('/userProfil', function()
{
	return View::make('profil/userProfil');
});
Route::get('/userProfilPresentation', function()
{
	return View::make('profil/userProfilPresentation');
});
Route::get('/favoriteArticle', function()
{
	return View::make('subview/favoriteArticle');
});
Route::get('/favoriteUser', function()
{
	return View::make('subview/favoriteUser');
});
Route::get('/comments', function()
{
	return View::make('subview/comments');
});
Route::get('/articleDetail', function()
{
	return View::make('articleDetail');
});
Route::get('/articleGallery', function()
{
	return View::make('articleGallery');
});
Route::resource('articleFavorite', 'ArticleFavorisController');
//root for Article
Route::resource('articleDetail', 'articleDetailController');


Route::get('/pictures/article/{pictureName}', function($picture)
{
  
	$filepath = '/home/action/workspace/ratingOutfit/pictures/article/' . $picture;
	return HTML::image($filepath);
});

Route::post('upVote','ArticleVoteController@upVote');

Route::get('/login', array('as' => 'login', 'before' => 'guest', function()
{
    return View::make('subview/loginForm');
}));

Route::controller('auth', 'LoginController');
Route::controller('password', 'RemindersController'); 

Route::post('articleComments', 'UserController@reportUser');

App::missing(function($exception)
{
    return View::make('error404');
});

Route::resource('user', 'UserController');
Route::resource('articleComment', 'ArticleCommentController');

