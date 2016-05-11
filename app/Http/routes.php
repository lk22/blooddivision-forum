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
			 * users
			 */
			
				Route::group(['prefix' => '/users'], function() {

					/**
					 * all users
					 */
					
						Route::get('/', 'ApiController@showUsers');

				});

				Route::group(['prefix' => 'threads'], function() {

					/**
					 * all threads
					 */
					
						Route::get('/', 'ApiController@showThreads');

				});

		});

	/**
	 * Web
	 */
	
		Route::group(['prefix' => '/', 'middleware' => 'web'], function(){

			/**
			 * Home
			 */
							
				Route::get('/', ['uses' => 'HomeController@index' , 'as' => 'home']);

			/**
			 * Authentication routes
			 */
			
				Route::auth();

			

				Route::get('/modules', function() {
					return phpinfo();
				});

		});

