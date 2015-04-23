<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(array('before' => 'guest'), function()
{
	Route::get('login', array('as' => 'login', 'uses' => 'LoginController@loginView'));
	Route::post('login', array('uses' => 'LoginController@loginAction'));

	Route::get('info', array('as' => 'info', 'uses' => 'LoginController@infoAction'));
});

Route::group(array('before' => 'auth'), function() {
	// Basic URLs
	Route::get('/', array('as' => 'home', 'uses' => 'HomeController@index'));

	// Logout of the app
	Route::get('logout', array('as' => 'logout', 'uses' => 'LoginController@logoutAction'));
});