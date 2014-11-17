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
	return View::make('userProfil');
});
Route::get('/articleDetail', function()
{
	return View::make('articleDetail');
});
Route::get('/articleGallery', function()
{
	return View::make('articleGallery');
});

//root for Article
Route::resource('articleDetail', 'articleDetailController');


Route::get('/pictures/article/{pictureName}', function($picture)
{
  
	$filepath = '/home/action/workspace/ratingOutfit/pictures/article/' . $picture;
	return HTML::image($filepath);
});


App::missing(function($exception)
{
    return View::make('error404');
});


