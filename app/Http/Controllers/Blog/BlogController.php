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
      $blogs = Blog::all();
      return view('blog.blogs', ['blogs' => $blogs]);
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
      $blogKey = 'blog_'. $singleBlog->id;
      if(!Session::has($blogKey)){
        $singleBlog->increment('views');
        Session::put($blogKey, 1);
      }
      $recentBlog = Blog::where('status', 1)->orderBy('id', 'asc')->limit(3)->get();
      $popularBlog = Blog::where('status', 1)->orderBy('views', 'desc')->limit(3)->get();

      return view('blog.blog-deatils', ['singleBlog' => $singleBlog, 'moreBlogs' => $moreBlogs, 'recentBlog' => $recentBlog, 'popularBlog' => $popularBlog]);
    }

   public function deleteblog($id)
   {
      Blog::find($id)->delete();
      return redirect()->back();
   }

   public function editblog($id)
   {
     $bcategories = BlogCategory::all();
     $blogInfo = Blog::where('id', $id)->first();
     return view('blog.edit-blog', ['bcategories' => $bcategories, 'blogInfo' => $blogInfo]);
   }

   public function updateblog(Request $request, $id)
   {
      $blogSlug = $request->title.rand();
      $slug = Str::slug($blogSlug, '-');

      $blog = Blog::find($id);
      $blog->author_id = Auth::user()->id; 
      $blog->title = $request->title;
      $blog->category_id = $request->category_id;
      $blog->description = $request->description;
      $blog->content = $request->content;
      $blog->blog_slug = $slug;
      $image = $request->image;

      if($request->hasFile('image')){
        $extension = $request->file('image')->getClientOriginalExtension();
          $fileNameToStore =time().'.'.$extension;
          $path = $request->file('image')->storeAs('public/uploads/', $fileNameToStore);
          $blog->image = $fileNameToStore;
          $blog->save();
      }else{
          $blog->save();
      }

      return redirect()->back();
   }
}
