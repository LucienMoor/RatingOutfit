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

Route::get('/', function()
{
	return View::make('homepage');
});

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
Route::get('/comments', function()
{
	return View::make('subview/userComment');
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

Route::get('zone_reservee', array('before' => 'auth', function()
{
    echo 'Vous avez bien été identifié '.Auth::user()->pseudo;
}));

Route::controller('auth', 'LoginController');
Route::controller('password', 'RemindersController'); 

Route::post('/home',['as' => 'home','uses' => 'UserController@reportUser']);
Route::post('search', 'SearchBarController@search');

App::missing(function($exception)
{
    return View::make('error404');
});

Route::resource('user', 'UserController');
Route::resource('articleComment', 'ArticleCommentController');
Route::resource('userComment', 'UserCommentController');

