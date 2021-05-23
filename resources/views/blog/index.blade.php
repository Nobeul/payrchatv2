@extends('layouts.app')
@section('custom_css')
  <link rel="stylesheet" type="text/css" href="{{ asset('public/holaTheme/assets/css/blog.css') }}"> 
@endsection
@section('content')
<div class="main_content">
  <div class="main_content_inner">
    <div class="uk-section uk-section-primary uk-margin-remove uk-padding-small">
      <i class="uil-book"></i> <span>Blog</span>
    </div><br/>
    <div class="uk-section uk-section-primary uk-margin-remove uk-padding-small">
      <div class="uk-flex uk-flex-between">
        <div class="uk-flex uk-position-relative">
            <a href="{{ route('my.articles') }}" id="p1">My articles</a>
            <a href="{{ route('blogs') }}"> Browse articles</a>
        </div>
        <div class="right">
          <button class="uk-button uk-button-primary uk-button-small"> <i class="uil-plus"></i> <a href="{{ url('/create/blog') }}">Create</a> </button>
        </div>
      </div>
    </div>
    @if(!empty($blogs[0]))
      <div class="uk-grid-column-small uk-grid-row-large uk-child-width-1-2@s uk-margin-top" uk-grid>
        @foreach($blogs as $blog)
          <div>
              <div class="uk-card" data-src="images/photo.jpg">
                <img src="{{ asset('storage/app/public/uploads/' .$blog->image) }}" class="blog-img">
                <div class="uk-overlay uk-position-cover uk-light blog-info">
                  <div class="uk-text-left">
                    <div class="post-btn-action uk-float-right">
                        <span class="icon-more uil-ellipsis-v"></span>
                        <div class="mt-0 p-2" uk-dropdown="pos: bottom-right;mode:hover ">
                            <ul class="uk-nav uk-dropdown-nav">
                                <li><a href="{{ route('edit.blog',['id' => $blog->id]) }}"> <i class="uil-edit-alt mr-1"></i> Edit blog </a></li>
                                <li><a href="{{ route('delete.blog',['id' => $blog->id]) }}" class="text-danger"> <i class="uil-trash-alt mr-1"></i>
                                        Delete </a></li>
                            </ul>
                        </div>
                    </div>
                    <a href="{{ route('blog.details',['slug' => $blog->blog_slug]) }}"><p>{{ $blog->category->category_name }}</p></a>
                    <a href=""><h3>{{ $blog->title }}</h3></a>
                    <span>{{ $blog->views }} views</span> . <span>{{ App\Models\Blog::getTime($blog->created_at) }}</span><br/>
                  </div>
                </div>
              </div>
              
          </div>
        @endforeach
      </div>
    @else
      <div class="uk-child-width-1-1" uk-grid>
        <div class="uk-card uk-card-body uk-height-large uk-flex uk-flex-center uk-flex-middle uk-flex-column">
          <div><i class="uil-book"></i></div>
            <p>You haven't created any articles yet.</p>
          </div>
      </div> 
    @endif
    </div>
</div>

@endsection