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

Route::resource('contact','ContactController');

Route::resource('articleFavorite', 'ArticleFavorisController');

Route::resource('articleDetail', 'articleDetailController');

Route::get('articleDetail/small/{id}','articleDetailController@showSmall');

Route::get('articleDetail/preview/{id}','articleDetailController@showPreview');

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

App::missing(function($exception)
{
    return View::make('error404');
});

Route::resource('user', 'UserController');

Route::resource('articleComment', 'ArticleCommentController');

Route::resource('userComments', 'UserCommentController');


