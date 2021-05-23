@extends('layouts.app')
@section('custom_css')
  <link rel="stylesheet" type="text/css" href="{{ asset('public/holaTheme/assets/css/blog.css') }}">
@endsection
@section('content')
<div class="main_content">
  <div class="main_content_inner">
  	<div class="uk-child-width-1-1@s uk-text-center uk-padding-remove" uk-grid>
	    <div>
	        <div class="uk-height-large uk-flex uk-flex-center uk-flex-middle uk-background-cover uk-light uk-position-relative single-blog-image" data-src="{{ asset('storage/app/public/uploads/' .$singleBlog->image) }}" data-sizes="(min-width: 650px) 650px, 100vw" uk-img>
        	<div class="uk-overlay uk-position-cover uk-light blog-info">
                  <div class="uk-text-left single-blog-category">
                    <a href=""><button>{{ $singleBlog->category->category_name }}</button></a>
                    <a href=""><h3 class="uk-margin-top">{{ $singleBlog->title }}</h3></a>
                    <div class="uk-clearfix uk-margin-top">
					    <div class="uk-float-right">
					        <div class="uk-card single-blog-comment"><span style="color: #fff;">{{ $singleBlog->comments->count() }} comments</span> . <span style="color: #fff;">{{ $singleBlog->views }} views</span></div>
					    </div>
					    <div class="uk-float-left">
					        <div class="uk-card single-blog-auth">
					        	<div class="uk-flex">
							        <img class="uk-border-circle" src="{{ asset('public/holaTheme/assets/images/avatars/avatar-5.jpg') }}" width="40" height="40">
							        <div class="uk-text-middle uk-margin-left">
							        <span>{{ $singleBlog->author->first_name }} {{ $singleBlog->author->last_name }}</span><br/>
							        <span>{{ App\Models\Blog::getTime($singleBlog->created_at) }}</span>
							        </div>
							    </div>
					        </div>
					    </div>
					</div>
                  </div>
                </div>
	        </div>
	        <div class="single-blog-des" uk-grid>
			    <div class="uk-width-2-3@m">
			    	<div class="uk-card uk-card-default uk-card-body uk-text-justify">
			    		<p> <i> {!! $singleBlog->description !!} </i> </p>
			    		<hr>
			    		<p>{!! $singleBlog->content !!}</p>
			    	</div>
			    	<div class="uk-clearfix"></div>
			    	<div class="uk-margin uk-visible@m">
			    		<div class="uk-card uk-card-default uk-text-left uk-card-body">
			    		<p> <i></i> Read More </p>
			    		<hr>
			    		<div class="uk-child-width-expand@s uk-text-center read-more" uk-grid>
			    			@foreach($moreBlogs as $moreBlog)
			    			<div>
			    				<div class="uk-card">
			    					<img src="{{ asset('storage/app/public/uploads/' .$moreBlog->image) }}" class="uk-margin-bottom"><br/>
				    				<h5>{{ $moreBlog->title }}</h5>
				    				<p class="uk-text-left">{{ App\Models\Blog::getTime($moreBlog->created_at) }}</p>
			    				</div>
			    			</div>
			    			@endforeach
			    		</div>
			    	</div>
			    	</div>
			    	<div class="uk-clearfix"></div>
			    	<div class="uk-margin comment">
			    		<div class="uk-card uk-card-default uk-card-body uk-text-justify">
			    		<p> <i></i>{{ $singleBlog->comments->count() }} Comments </p>
			    		<hr>
			    		<div>
			    			<div class="uk-flex uk-flex-between read-more">
			    				<div>
			    					<img src="{{ asset('public/holaTheme/assets/images/avatars/avatar-5.jpg') }}"  class="uk-border-circle" style="height: 40px;width: 40px;vertical-align: middle;" uk-img>
			    				</div>
			    				<div>
			    					<form action="{{ route('comment.store', $singleBlog->id) }}" method="POST">
				    					@csrf
				    					<input type="text" class="comment-input" name="comment" placeholder="write something cool.....">
				    					<button type="submit"> <i class="uil-arrow-right"></i> </button>
				    				</form>
			    				</div>
			    			</div>
			    		</div>
			    		@foreach($singleBlog->comments as $comment)
			    			<div class="uk-clearfix uk-margin">
						        <div class="uk-float-left uk-card single-blog-comment">
						        	<div class="uk-flex">
								        <img class="uk-border-circle" src="{{ asset('public/holaTheme/assets/images/avatars/avatar-5.jpg') }}" width="40" height="40">
								        <div class="uk-text-middle uk-margin-left">
								        <span>{{ $singleBlog->author->first_name }} {{ $singleBlog->author->last_name }}</span><span style="margin-left: 5px;font-size: 10px;">{{ $comment->created_at->diffForHumans() }}</span><br/>
								        <span class="com">{{ $comment->comment }}</span>
								        </div>
								    </div>
							    	<div style="margin-left: 60px; color: #1D9FE4;"><a href="" ><i class="fa fa-reply"></i></a> &nbsp;&nbsp;&nbsp;&nbsp;<a href=""><i class="fa fa-thumbs-up"></i></a></div>
						        </div>
						        <!-- <div class="uk-float-right">
						        	<a href=""><i class="fa fa-trash"></i></a>
						        </div> -->
						    </div>
				    	@endforeach
			    	</div>
			    	</div>
			    </div>
			    <div class="uk-width-1-3@m uk-text-left" style="padding: 0 5px 0 10px;">
			    	<div class="uk-card uk-card-default uk-card-body">
			    		<div class="uk-margin">
						    <form>
						        <input class="blog-search" type="search" placeholder="Search">   
						    </form>
						</div>
						<hr>
						<div class="uk-margin">
			    			<p>Recent Post </p>
						    <hr>  
						    <div class="uk-float-left">
						    	@foreach($recentBlog as $recent)
							        <div class="uk-card single-blog-auth uk-margin-bottom">
							        	<div class="uk-flex">
									        <img class="uk-border-rounded" src="{{ asset('storage/app/public/uploads/' .$recent->image) }}" style="height: 30px; width: 40px;">
									        <div class="uk-text-middle uk-margin-left">
										        <h4 style="color: #000;font-weight: bold;font-size: 13px; margin-bottom: 5px;">{{ $recent->title }}</h4>
										        By<span style="color: #000;font-weight: bold;"> {{ $recent->author->first_name }}
										         {{ $recent->author->last_name }}</span>
									        </div>
									    </div>
							        </div>
						        @endforeach
					    	</div>
						</div>
						<div class="uk-clearfix"></div>
						<hr>
						<div class="uk-margin">
			    			<p>Popular Post </p>
						    <hr>
						    <div class="uk-float-left">
						    	@foreach($popularBlog as $popular)
							        <div class="uk-card single-blog-auth uk-margin-bottom">
							        	<div class="uk-flex">
									        <img class="uk-border-rounded" src="{{ asset('storage/app/public/uploads/' .$popular->image) }}" style="height: 30px; width: 40px;">
									        <div class="uk-text-middle uk-margin-left">
										        <h4 style="color: #000;font-weight: bold;font-size: 13px; margin-bottom: 5px;">{{ $popular->title }}</h4>
										        By<span style="color: #000;font-weight: bold;"> {{ $popular->author->first_name }}
										         {{ $popular->author->last_name }}</span>
									        </div>
									    </div>
							        </div>
						        @endforeach
					    	</div>	
						</div>
						<div class="uk-clearfix"></div>
						<hr>
						<div class="uk-margin">
			    			<p> Categories </p>
						    <hr>
						    <div class="tags uk-flex uk-flex-wrap">
								<a href=""><span>news</span></a>
								<a href=""><span>Fashion</span></a>
								<a href=""><span>Finance</span></a>
								<a href=""><span>Movie</span></a>
								<a href=""><span>Fitness</span></a>
								<a href=""><span>Travel</span></a>
						    </div>
						</div>
			    	</div>
			    </div>
			</div>
	    </div>
	  </div>
	</div>
</div>
@endsection