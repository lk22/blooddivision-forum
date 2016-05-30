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
	
		include('api-routes.php');

	/**
	 * Web
	 */
	
	
	/**
	 * Home
	 */
					
		Route::get('/', ['uses' => 'HomeController@index' , 'as' => 'home']);
	
		Route::group(['prefix' => '/', 'middleware' => 'web'], function(){


			/**
			 * Authentication routes
			 */
			
				Route::auth();

			

				Route::get('/modules', function() {
					return phpinfo();
				});

		});

