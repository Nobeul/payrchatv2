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
        $data['blogs'] = Blog::where(['author_id' => Auth::user()->id, 'status' => 1])->get();
        return view('blog.index', $data);  
    }

    public function create(){
        $data['bcategories'] = BlogCategory::all();

        return view('blog.create-blog', $data);
    }

    public function blog(){
        $data['blogs'] = Blog::all();
        return view('blog.blogs', $data);
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

        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore =time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/uploads/', $fileNameToStore);
            $blog->image = $fileNameToStore;
            $blog->save();

            return Redirect('/my/article');
        } else {
            return Redirect()->back();
        }

        return back();

    }

    public function details($slug)
    {
        $data['moreBlogs'] = Blog::where('status', 1)->latest()->limit(4)->get();
        $data['singleBlog'] = $singleBlog = Blog::where(['blog_slug' => $slug, 'status' => 1])->first();

        if (empty($singleBlog)) {
            return back(); 
        } else {
            $data['blogKey'] = $blogKey = 'blog_'. $singleBlog->id;
            if (!Session::has($blogKey)) {
              $singleBlog->increment('views');
              Session::put($blogKey, 1);
            }
            $data['recentBlog'] = Blog::where('status', 1)->orderBy('id', 'asc')->limit(3)->get();
            $data['popularBlog'] = Blog::where('status', 1)->orderBy('views', 'desc')->limit(3)->get();

            return view('blog.blog-deatils', $data);
        }
    }

   public function deleteblog($id)
   {
        $blog = Blog::find($id);
        if (empty($blog)) {
            return  redirect('/my/article');
        } else {
            $blog->delete();
        }

        return redirect()->back();
   }

   public function editblog($id)
   {
        $data['bcategories'] = BlogCategory::all();
        $data['blogInfo'] = Blog::where('id', $id)->first();

        if (empty($data['blogInfo'])) {
            return redirect('/my/article');
        }

        return view('blog.edit-blog', $data);
   }

   public function updateblog(Request $request, $id)
   {
        $blogSlug = $request->title.rand();
        $slug = Str::slug($blogSlug, '-');

        $blog = Blog::find($id);
        if (!empty($blog)) {
            $blog->author_id = Auth::user()->id; 
            $blog->title = $request->title;
            $blog->category_id = $request->category_id;
            $blog->description = $request->description;
            $blog->content = $request->content;
            $blog->blog_slug = $slug;
            $image = $request->image;

            if ($request->hasFile('image')) {
                $extension = $request->file('image')->getClientOriginalExtension();
                $fileNameToStore =time().'.'.$extension;
                $path = $request->file('image')->storeAs('public/uploads/', $fileNameToStore);
                $blog->image = $fileNameToStore;
                $blog->save();
            } else {
                $blog->save();
            }

            return redirect()->back();
        } else {
            return back();
        }
   }
}
