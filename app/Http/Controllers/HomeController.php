<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use Illuminate\Http\Request;
use App\Models\Post;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $followers = Follower::where(['following_id' => Auth::user()->id])->pluck('follower_id')->toArray();
        array_push($followers, Auth::user()->id);

        $posts = Post::with(['user'])->whereIn('posts.user_id', $followers)
            ->orderBy('posts.id', 'DESC')
            ->paginate(3);

        if ($request->ajax()) {
            return response($posts);
        }

        return view('home');
    }

    public function test(Request $request)
    {
        $posts = Post::with(['user'])->where('posts.user_id', Auth::user()->id)
            ->orderBy('posts.id', 'DESC')
            ->paginate(30);

        if ($request->ajax()) {
            return response($posts);
        }

        return view('welcome');
    }
}
