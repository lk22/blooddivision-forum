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
	 * user
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
