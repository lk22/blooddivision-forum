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
	public function __construct(User $user, Thread $thread, Post $post, Comment $comment, Tag $tag, Like $like){
		$this->user = $user;
		$this->thread = $thread;
		$this->post = $post;
		$this->comment = $comment;
		$this->tag = $tag;
		$this->like = $like;
	}

	/**
	 * all users
	 *
	 * @param Request  $request
	 *
	 * @return JSON
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

	/**
	 * Authenticated user
	 *
	 * @param      Request  $request  (description)
	 *
	 * @return     <type>   ( description_of_the_return_value )
	 */
	public function showAuth(Request $request){

		$user = auth()->user;

		return response()->json([
			'message' => 'success',
			'user' => app()->make('Blooddivision\Transformers\UserTransformer')->transform($user)
		]);

	}

	/**
	 * Show Specific users id
	 *
	 * @param      Request  $request  (description)
	 *
	 * @return     <type>   ( description_of_the_return_value )
	 */
	public function showUserWhereId($id){
		$user = $this->user->where('id', $id)->take(1)->get();

		return response()->json([
			'status' => 'ok!',
			'user_id' => $user->id
		]);
	}

	/**
	 * Show Specific users name
	 *
	 * @param      Request  $request  (description)
	 *
	 * @return     <type>   ( description_of_the_return_value )
	 */
	public function showUserWhereUsername($username){
		$user = $this->user->where('name', $username)->get();
		return response()->json([
			'status' => 'ok!',
			'username' => $user->name
		]);
	}

	/**
	 * Show Specific users email
	 *
	 * @param      Request  $request  (description)
	 *
	 * @return     <type>   ( description_of_the_return_value )
	 */
	public function showUserWhereEmail(Request $request, $email){
		$user = $this->user->where('email', $email)->get();
		return response()->json([
			'status' => 'ok!',
			'user_id' => $user->email
		]);
	}

	/**
	 * Show Specific users active
	 *
	 * @param      Request  $request  (description)
	 *
	 * @return     <type>   ( description_of_the_return_value )
	 */
	public function showUserWhereActive(Request $request, $active){
		$user = $this->user->where('active', $active)->get();
		return response()->json([
			'status' => 'ok!',
			'user_id' => $user->active
		]);
	}


	/**
	 * All threads
	 *
	 * @param      Request  $request  (description)
	 *
	 * @return     <type>   ( description_of_the_return_value )
	 */
	public function showThreads(Request $request){

		$threads = ($request->get('forum')) ? $this->thread->where('forum_id', $forum->id)->get() : $this->thread->all(); 

		return response()->json([
			'message' => 'success',
			'threads' => [
				app()->make('Blooddivision\Transformers\ThreadTransformer')->transformCollection($threads)
			]
		]);
	} 

}
