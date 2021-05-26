@extends('layouts.app')

@section('custom_css')
    <style type="text/css">
        .single-blog-title{
            text-decoration: none !important;
        }
        .single-blog-title h3{
            width: 250px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;font-size: 14px;text-align: left;
            color: #000;font-size: 18px;
        }
    </style>
@endsection

@section('content')
<div class="main_content">
  <div class="main_content_inner">
    <div class="uk-section uk-section-primary uk-light uk-padding-small">
	    <div class="uk-container">
	        <ul class="uk-breadcrumb">
            <li><a href="{{ url('/') }}" style="color: #fff;">Home</a></li>
            <li><a href="{{ route('blogs') }}" style="color: #fff;">blogs</a></li>
            <li class="uk-disabled"><a>all blogs</a></li>
        </ul>
	    </div>
	</div>
	<div class="uk-clearfix"></div>
	<div class="uk-child-width-1-3@m uk-margin-top" uk-grid>
	@foreach($blogs as $blog)
    <div>
        <div class="uk-inline">
             <img src="{{ asset('storage/app/public/uploads/' .$blog->image) }}" style="height: 303px;width: 100%; position: relative;opacity: 0.5;" alt="" uk-img>
            <div class="uk-position-top uk-padding">
            	<p style="color: #000;">{{ $blog->category->category_name }}</p>
            	<a class="single-blog-title" href="{{ route('blog.details',['slug' => $blog->blog_slug]) }}"><h3 class="uk-margin-top">{{ $blog->title }}</h3></a>
            	<div class="uk-float-left">
			        <div class="uk-card single-blog-auth">
			        	<div class="uk-flex">
					        <img class="uk-border-circle" src="{{ asset('public/holaTheme/assets/images/avatars/avatar-5.jpg') }}" width="40" height="40">
					        <div class="uk-text-middle uk-margin-left" style="color: #000;">
					        <span>{{ $blog->author->first_name }} {{ $blog->author->last_name }}</span><br/>
					        <span>{{ App\Models\Blog::getTime($blog->created_at) }}</span>
					        </div>
					    </div>
			        </div>
			    </div>
            </div>
            <div class="uk-overlay uk-overlay-primary uk-position-bottom">
                <div class="uk-flex uk-flex-center uk-flex-between">
                	<div><span><i class="fa fa-heart"></i> <sup>0</sup></span></div>
                	<div><span><i class="fa fa-eye"></i> <sup>{{ $blog->views }}</sup></span></div>
                	<div><span><i class="fa fa-comments"></i> <sup>{{ $blog->blogComments->count() }}</sup></span></div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
   </div>
  </div> 
</div>
@endsection