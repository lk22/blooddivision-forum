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

	/**
	 * API
	 */
	
		Route::group(['prefix' => 'api'], function() {

			/**
			 * home
			 */
				
				Route::get('/', 'ApiController@api');

			/**
			 * users
			 */
			
				Route::group(['prefix' => '/users'], function() {

					/**
					 * all users
					 */
					
						Route::get('all', 'ApiController@users');

				});

		});

Route::auth();

Route::get('/home', 'HomeController@index');
