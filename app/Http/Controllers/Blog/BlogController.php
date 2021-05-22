<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Blog;
use Auth;
use App\Models\BlogCategory;
use Session;

class BlogController extends Controller
{

    public function index()
    {
      $blogs = Blog::where('author_id', Auth::user()->id)->where('status', 1)->get();
      return view('blog.index', ['blogs' => $blogs]);
    }

    public function create(){
      $bcategories = BlogCategory::all();
      return view('blog.create-blog', ['bcategories' => $bcategories]);
    }

    public function blog(){
      return view('blog.blogs');
    }

    public function store(Request $request)
    {
      $blogSlug = $request->title.rand();
      $slug = Str::slug($blogSlug, '-');

      $blog = new Blog();
      $blog->author_id = Auth::user()->id; 
      $blog->title = $request->title;
      $blog->category_id = $request->category_id;
      $blog->description = $request->description;
      $blog->content = $request->content;
      $blog->blog_slug = $slug;

      if($request->hasFile('image')){
          $extension = $request->file('image')->getClientOriginalExtension();
          $fileNameToStore =time().'.'.$extension;
          $path = $request->file('image')->storeAs('public/uploads/', $fileNameToStore);
          $blog->image = $fileNameToStore;
      }else{
          $blog->image = '';
      }

      $blog->save();

      return back();

    }

    public function details($slug)
    {
      $moreBlogs = Blog::all();
      $singleBlog = Blog::where('blog_slug', $slug)->where('status', 1)->first();
      $blogKey = 'blog_'.$singleBlog->id;
      if(Session::has($blogKey)){
        $singleBlog->increment('views');
        Session::put($blogKey, 1);
      }
      return view('blog.blog-deatils', ['singleBlog' => $singleBlog, 'moreBlogs' => $moreBlogs]);
    }

    public function likeblog($singleBlog)
    {
      // Check if user alrady like blog or not
      $user = Auth::user();
      $likedblog = $user->likedBlogs()->where('blog_id', $singleBlog)->count();
      if($likedblog == 0){
        $user->likedBlogs()->attach($singleBlog);
      }else{
        $user->likedBlogs()->detach($singleBlog);
      }

      return redirect()->back();
    }
}
