<?php

namespace Blooddivision\Http\Controllers;

use Blooddivision\Http\Requests;
use Illuminate\Http\Request;

use Blooddivision\User;

use Blooddivision\Transformers\UserTransformer;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserTransformer $userTransformer)
    {
        $this->middleware('auth');

        $this->userTransformer = $userTransformer;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();

        $js_variables = [
            'user' => $this->userTransformer->tranformCollection($user)
        ];
        return view('home', compact('user', 'js_variables'));
    }
}
