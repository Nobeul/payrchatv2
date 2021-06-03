@extends('layouts.app')
@section('custom_css')
<link rel="stylesheet" href="{{ asset('public/holaTheme/assets/css/uikit.css') }}">
<link rel="stylesheet" href="{{ asset('public/holaTheme/assets/css/people-you-may-know/style.css') }}">
<style>
    @media only screen and (max-width: 425px) {
        .chat-plus-btn {
            display: none;
        }
    }
</style>
@endsection
@section('content')
<div class="main_content">
    <div class="main_content_inner">

        <div id="spinneroverlay"> </div>

        <h1> Photos </h1>
        <div class="uk-flex uk-flex-between uk-flex-middle mb-4">
            <ul class="uk-width-expand" uk-tab>
                <li class="uk-active"><a href="{{ url('/album') }}">Albums</a></li>
            </ul>
            <!-- <a href="#" class="button primary small circle uk-visible@s"> <i class="uil-plus"> </i> -->
                <!-- Create New Album </a> -->

        </div>

        <div class="uk-child-width-1-4@m uk-child-width-1-3@s uk-child-width-1-2 uk-grid-collapse uk-overflow-hidden" style="border-radius: 25px;  overflow: hidd en;" uk-lightbox="animation: scale" uk-grid>
            @foreach ($postImages as $image)
            <div>
                <a href="public/uploads/profile/demo-cover.jpg" data-caption="Image caption">
                    @if (file_exists('public/uploads/'.$image->post_image))
                    <div class="sl_photo_list" data-src="{{ asset('public/uploads/'.$image->post_image) }}" uk-img>
                    @else
                    <div class="sl_photo_list" data-src="{{ asset('public/uploads/profile/demo-cover.jpg') }}" uk-img>
                    @endif
                        <div class="sl_photo_list-content">
                            <div>
                                <h4> Image description </h4>
                                <p> <span>{{count($image->likes)}} {{ count($image->likes) == 0 ? 'Like' : 'Likes'}} </span>
                                    <span>{{count($image->comments)}} {{ count($image->likes) == 0 ? 'Comment' : 'Comments'}} </span>
                                    <span> Share</span>
                                </p>
                            </div>
                            <div>
                                <span class="uil-cloud-download btn-down"></span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div><br><br>
        <a href="{{ $postImages->previousPageUrl() }}" class="btn btn-primary"><< Previous</a>
        <a href="{{ $postImages->nextPageUrl() }}" class="btn btn-primary float-right">Next >></a>
    </div>
</div>
@endsection