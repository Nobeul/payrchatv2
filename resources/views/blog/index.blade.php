@extends('layouts.app')
@section('custom_css')
<style>
    .uil-book{color: #1E87F0;background: #fff;padding: 5px;border-radius: 50%;}
    .uk-section span{color: #fff; font-size: 20px;}
    .uk-section a{color: #fff;font-size: 15px;margin-right: 10px;}
    #p1::after{content: '';position: absolute;bottom: -13px;left: 0;width: 70px;height: 3px;background: #fff;}
    .uk-section .right button a{color: #1E87F0;text-decoration: none;}
    .uil-plus{color: #1E87F0;}
    .uk-section .right button a:hover{color: #1E87F0;}
    @media only screen and (max-width: 425px) {
      .uk-section a{color: #fff;font-size: 12px;margin-right: 12px;}
      .uk-section .right button a{color: #1E87F0;text-decoration: none;font-size: 9px;}
      .uil-plus{color: #1E87F0;font-size: 9px;}
      #p1::after{content: '';position: absolute;bottom: -13px;left: 0;width: 60px;height: 3px;background: #fff;}
    }
</style> 
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
  </div>
</div>
@endsection