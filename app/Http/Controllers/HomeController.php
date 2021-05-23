<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use App\Models\Like;
use App\Models\Dislike;
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

        $posts = Post::with(['user', 'comments.user', 'likes.user', 'dislikes.user'])->whereIn('posts.user_id', $followers)->orderBy('posts.id', 'DESC')->paginate(5);

        if ($request->ajax()) {
            return response($posts);
        }
        return view('home');
    }

    public function fetchComment(Request $request)
    {
        $comments = Comment::with('user:id,first_name,last_name,profile_image')->where('post_id', $request->id)->get();
        return response($comments);
    }

    public function createLike(Request $request)
    {
        $like = Like::where(['user_id' => Auth::user()->id, 'post_id' => $request->id])->first();
        $dislike = Dislike::where(['user_id' => Auth::user()->id, 'post_id' => $request->id])->first();

        if (empty($dislike)) {
            if (empty($like)) {
                $newLike = new Like;
    
                $newLike->user_id = Auth::user()->id;
                $newLike->post_id = $request->id;
                $newLike->save();
                return response(['found_dislike' => 'false']);
            } else {
                return response(['status'=>'false']);
            }
        } else {
            $dislike->delete();

            $newLike = new Like;
    
            $newLike->user_id = Auth::user()->id;
            $newLike->post_id = $request->id;
            $newLike->save();
            return response(['found_dislike' => 'true']);
        }
    }

    public function getPostLike(Request $request)
    {
        $post = Like::where('post_id', $request->id)->count();

        return response(['postCount' => $post]);
        
    }

    public function createDislike(Request $request)
    {
        $like = Like::where(['user_id' => Auth::user()->id, 'post_id' => $request->id])->first();
        $dislike = Dislike::where(['user_id' => Auth::user()->id, 'post_id' => $request->id])->first();

        if (empty($like)) {
            if (empty($dislike)) {
                $newDislike = new Dislike;
    
                $newDislike->user_id = Auth::user()->id;
                $newDislike->post_id = $request->id;
                $newDislike->save();
                return response(['found_like' => 'false']);
            } else {
                return response(['status'=>'false']);
            }
        } else {
            $like->delete();

            $newDislike = new Dislike;
    
            $newDislike->user_id = Auth::user()->id;
            $newDislike->post_id = $request->id;
            $newDislike->save();
            return response(['found_like' => 'true']);
        }
    }

    public function getPostDislike(Request $request)
    {
        $post = Dislike::where('post_id', $request->id)->count();

        return response(['postCount' => $post]);
        
    }
}
