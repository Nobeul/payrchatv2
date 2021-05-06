<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
      return view('blog.index');
    }

    public function create(){
      return view('blog.create-blog');
    }

    public function blog(){
      return view('blog.blogs');
    }
}
