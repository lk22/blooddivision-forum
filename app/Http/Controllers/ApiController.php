<?php

namespace Blooddivision\Http\Controllers;

use Illuminate\Http\Request;

use Blooddivision\Http\Requests;

use Blooddivision\Transformers\UserTransformer;

use Blooddivision\User;

/**
 * Blooddivision API Controller
 */
class ApiController extends Controller
{
    /**
     * Constructor
     *
     * @param      User             $user             (description)
     * @param      UserTransformer  $userTransformer  (description)
     */
	public function __construct(User $user, UserTransformer $userTransformer){
		$this->user = $user;

		$this->userTransformer = $userTransformer;
	}

	public function api(){
		return "Welcome to Blooddivision API";
	}

	public function users(Request $request){
		if( $request->get('count') ){
			$users = $this->user->take($request->get('count'))->get();
		}

		if( $request->get('active') ){
			$users = $this->user->where('active', $request->get('active'));
		}

		$users = $this->user->all();

		return response()->json([
			'message' => 'success',
			'users' => [
				app()->make('Blooddivision\Transformers\UserTransformer')->transformCollection($users)
			]
		]);
	}

}
