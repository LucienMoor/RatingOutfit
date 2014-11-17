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

Route::get('zone_reservee', array('before' => 'auth', function()
{
    echo 'Vous avez bien été identifié '.Auth::user()->pseudo;
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

