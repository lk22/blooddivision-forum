<?php 

/**
 * API For web application
 */
Route::group(['prefix' => 'api'], function() {

	// test connection

	Route::get('/', function() {
		return Response::json([
			'status' => 'ok!'
		]);
	});

	/**
	 * get users information
	 * 
	 * @api {get} /users
	 * @apiName GetUser
	 * @apiGroup User
	 * @apiVersion 0.0.1
	 * @apiDescription get all the users
	 * 
	 * @apiSuccess {integer} the users id
	 * @apiSuccess {string} the users username
	 * @apiSuccess {string} the users email address that is registered on the particullar user
	 * @apiSuccess {boolean} the user is active or not => true || false
	 * 
	 * @apiSuccessExample Example
	 * HTTP/1.1 200 OK
	 * {
	 * 		"id": 1,
	 * 		"username": "Leokk2200"
	 * 		"email": "nightskater-220@hotmail.com"
	 * 		"active": true
	 * }
	 */

		Route::group(['prefix' => '/users'], function() {
			
			/**
			 * All users
			 */
			
				Route::get('/', 'ApiController@showUsers');

			/**
			 * Authenticated user
			 */

				Route::get('auth', 'ApiController@showAuth');

			/**
			 * specific user
			 */
			
				Route::group(['prefix' => '/user'], function() {

					/**
					 * users id
					 * 
					 * {
					 * 		"user_id": 1
					 * }
					 */
					
						Route::get('/id/{id}', 'ApiController@showUserWhereId');

					/**
					 * users username
					 * 
					 * {
					 * 		"username": Leokk2200
					 * }
					 */
					
						Route::get('/name/{username}', 'ApiController@showUserWhereUsername');

					/**
					 * users email
					 * 
					 * {
					 * 		"email": "nightskater-220@hotmail.com"
					 * }
					 */
					
						Route::get('/email/{email}', 'ApiController@showUserWhereEmail');

					/**
					 * users active
					 * 
					 * {
					 * 		"active": true
					 * }
					 */
					
						Route::get('/active/{active}', 'ApiController@showUserWhereUsername');


				});

		});

		Route::group(['prefix' => 'threads'], function() {

			/**
			 * all threads
			 */
			
				Route::get('/', 'ApiController@showThreads');

		});

});