@extends('layouts.app')

@section('content')
<div class="main_content">
  <div class="main_content_inner">
    <div class="uk-section uk-section-primary uk-light">
	    <div class="uk-container">
	        <h3 class="uk-text-center">Most Recent Articles</h3>
	    </div>
	</div>
	<div class="uk-clearfix"></div>
	<div class="uk-child-width-1-2@m uk-margin-top" uk-grid>
	@foreach($blogs as $blog)
    <div>
        <div class="uk-inline">
            <img src="{{ asset('storage/app/public/uploads/' .$blog->image) }}" style="height: 303px; position: relative;" alt="">
            <div class="uk-position-top uk-padding">
            	<a href="{{ route('blog.details',['slug' => $blog->blog_slug]) }}"><p style="color: #fff;">{{ $blog->category->category_name }}</p></a>
            	<a href=""><h3 class="uk-margin-top" style="color: #fff;">{{ $blog->title }}</h3></a>
            	<div class="uk-float-left">
			        <div class="uk-card single-blog-auth">
			        	<div class="uk-flex">
					        <img class="uk-border-circle" src="{{ asset('public/holaTheme/assets/images/avatars/avatar-5.jpg') }}" width="40" height="40">
					        <div class="uk-text-middle uk-margin-left" style="color: #fff;">
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
                	<div><span><i class="fa fa-comments"></i> <sup>{{ $blog->comments->count() }}</sup></span></div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

  </div>
  
</div>
@endsection