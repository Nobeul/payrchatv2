<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
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

        $posts = Post::with(['user', 'comments.user'])->whereIn('posts.user_id', $followers)
                ->orderBy('posts.id', 'DESC')
                ->paginate(5);

        if ($request->ajax()) {
            return response($posts);
        }
        return view('home');
    }
}
