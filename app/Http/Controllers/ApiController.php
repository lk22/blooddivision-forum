<?php

namespace Blooddivision\Http\Controllers;

use Illuminate\Http\Request;

use Blooddivision\Http\Requests;

use Blooddivision\Transformers\UserTransformer;

use Blooddivision\User;
use Blooddivision\Post;
use Blooddivision\Thread;
use Blooddivision\Comment;
use Blooddivision\Tag;
use Blooddivision\Like;

/**
 * Blooddivision API Controller
 */
class ApiController extends Controller
{
    /**
     * Constructor
     * @param      User             $user             (description)
     * @param      UserTransformer  $userTransformer  (description)
     */
	public function __construct(User $user){
		$this->user = $user;
	}

	/**
	 * fetch users all/count={count}/active={active=true, false}
	 *
	 * @param      Request  $request  (description)
	 *
	 * @return     JSON
	 */
	public function showUsers(Request $request){

		$users = $this->user->all();

		if( $request->get('count') ){
			$users = $this->user->take( $request->get('count') )->get();
		}

		return response()->json([
			'message' => 'success',
			'users' => [
				app()->make('Blooddivision\Transformers\UserTransformer')->transformCollection($users)
			]
		]);
	}

}
