@extends('layouts.app')
@section('custom_css')
<style>
    .uil-image {
        color: #007bff;
        margin-top: 8px;
    }
    
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

        <div class="uk-grid-large" uk-grid>

            <div class="uk-width-2-3@m fead-area">

                <!-- create post section -->
                <div class="post-newer">

                <form action="" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="post-new" uk-toggle="target: body ; cls: post-focus">
                            <div class="post-new-media">
                                <div class="post-new-media-user">
                                    <img src="" alt="">
                                </div>
                                <div class="post-new-media-input">
                                    <input type="text" class="uk-input" placeholder="What's on Your Mind?">
                                </div>
                            </div>
                            <hr>
                            <div class="post-new-type">

                                <a href="#">
                                    <img src="{{ asset('public/holaTheme/assets/images/icons/photo.png') }}" alt="">
                                    Photo/Video
                                </a>

                                <a href="#" class="uk-visible@s">
                                    <img src="{{ asset('public/holaTheme/assets/images/icons/tag-friend.png') }}" alt="">
                                    Tag Friend
                                </a>

                                <a href="#"><img src="{{ asset('public/holaTheme/assets/images/icons/reactions_wow.png') }}" alt="">
                                    Fealing /Activity
                                </a>

                            </div>
                    </div>

                    <div class="post-pop">

                        <div class="post-new-overyly" uk-toggle="target: body ; cls: post-focus"></div>

                        <div class="post-new uk-animation-slide-top-small">


                            <div class="post-new-header">

                                <h4> Create new post</h4>

                                <!-- close button-->
                                <span class="post-new-btn-close" uk-toggle="target: body ; cls: post-focus" uk-tooltip="title:Close; pos: left "></span>

                            </div>

                            <div class="post-new-media">
                                <div class="post-new-media-user">
                                    <img src="{{ asset('public/holaTheme/assets/images/avatars/avatar-2.jpg') }}" alt="">
                                </div>
                                <div class="post-new-media-input">
                                    <input type="text" class="uk-input" name="post_txt" placeholder="What's Your Mind ?">
                                </div>
                            </div>
                            <div class="post-new-tab-nav">
                                <span>
                                    <label for="image-input">
                                        <a>
                                            <i class="uil-image"></i>
                                            <input type="file" id="image-input" name="post_image">
                                        </a>
                                    </label>
                                </span>
                                <a href="#"> <i class="uil-user-plus"></i> </a>
                                <a href="#"> <i class="uil-video"></i> </a>
                                <a href="#"> <i class="uil-record-audio"></i> </a>
                                <a href="#"> <i class="uil-file-alt"></i> </a>
                                <a href="#"> <i class="uil-emoji"></i> </a>
                                <a href="#"> <i class="uil-gift"></i> </a>
                                <a href="#"> <i class="uil-shopping-basket"></i> </a>
                                <a href="#"> <i class="uil-check"></i> </a>
                                <a href="#"> <i class="uil-graph-bar"></i> </a>
                            </div>
                            <div class="uk-flex uk-flex-between">

                                <button class="button outline-light circle" type="button" style="
                                        border-color: #e6e6e6;  border-width: 1px;  ">Public</button>
                                <div uk-dropdown>
                                    <ul class="uk-nav uk-dropdown-nav">
                                        <li class="uk-active"><a href="#">Only me</a></li>
                                        <li><a href="#">Every one</a></li>
                                        <li><a href="#"> People I Follow </a></li>
                                        <li><a href="#">I People Follow Me</a></li>
                                    </ul>
                                </div>

                                <button type="submit" href="#" class="button primary px-6"> Share </button>
                            </div>
                        </div>

                    </div>
                </form>

                </div>

                <div class="section-small pt-0">
                    <div class="uk-position-relative" uk-slider="finite: true">

                        <div class="uk-slider-container pb-3">

                            <ul class="uk-slider-items uk-child-width-1-5@m uk-child-width-1-3@s uk-child-width-1-3 story-slider uk-grid">
                                <li>
                                    <a href="#" uk-toggle="target: body ; cls: is-open">
                                        <div class="story-card" data-src="{{ asset('public/holaTheme/assets/images/avatars/avatar-lg-1.jpg') }}" uk-img>
                                            <i class="uil-plus"></i>
                                            <div class="story-card-content">
                                                <h4> Dennis </h4>
                                            </div>
                                        </div>
                                    </a>

                                </li>
                                <li>
                                    <a href="#" uk-toggle="target: body ; cls: is-open">
                                        <div class="story-card" data-src="{{ asset('public/holaTheme/assets/images/events/listing-5.jpg') }}" uk-img>
                                            <img src="{{ asset('public/holaTheme/assets/images/avatars/avatar-5.jpg') }}" alt="">
                                            <div class="story-card-content">
                                                <h4> Jonathan </h4>
                                            </div>
                                        </div>
                                    </a>

                                </li>
                                <li>
                                    <a href="#" uk-toggle="target: body ; cls: is-open">
                                        <div class="story-card" data-src="{{ asset('public/holaTheme/assets/images/avatars/avatar-lg-3.jpg') }}" uk-img>
                                            <img src="{{ asset('public/holaTheme/assets/images/avatars/avatar-6.jpg') }}" alt="">
                                            <div class="story-card-content">
                                                <h4> Stella </h4>
                                            </div>
                                        </div>
                                    </a>

                                </li>
                                <li>

                                    <a href="#" uk-toggle="target: body ; cls: is-open">
                                        <div class="story-card" data-src="{{ asset('public/holaTheme/assets/images/avatars/avatar-lg-4.jpg') }}" uk-img>
                                            <img src="{{ asset('public/holaTheme/assets/images/avatars/avatar-4.jpg') }}" alt="">
                                            <div class="story-card-content">
                                                <h4> Alex </h4>
                                            </div>
                                        </div>
                                    </a>

                                </li>
                                <li>

                                    <a href="#" uk-toggle="target: body ; cls: is-open">
                                        <div class="story-card" data-src="{{ asset('public/holaTheme/assets/images/avatars/avatar-lg-2.jpg') }}" uk-img>
                                            <img src="{{ asset('public/holaTheme/assets/images/avatars/avatar-2.jpg') }}" alt="">
                                            <div class="story-card-content">
                                                <h4> Adrian </h4>
                                            </div>
                                        </div>
                                    </a>

                                </li>
                                <li>

                                    <a href="#" uk-toggle="target: body ; cls: is-open">
                                        <div class="story-card" data-src="{{ asset('public/holaTheme/assets/images/avatars/avatar-lg-5.jpg') }}" uk-img>
                                            <img src="{{ asset('public/holaTheme/assets/images/avatars/avatar-5.jpg') }}" alt="">
                                            <div class="story-card-content">
                                                <h4> Dennis </h4>
                                            </div>
                                        </div>
                                    </a>

                                </li>

                            </ul>

                            <div class="uk-visible@m">
                                <a class="uk-position-center-left-out slidenav-prev" href="#" uk-slider-item="previous"></a>
                                <a class="uk-position-center-right-out slidenav-next" href="#" uk-slider-item="next"></a>
                            </div>
                            <div class="uk-hidden@m">
                                <a class="uk-position-center-left slidenav-prev" href="#" uk-slider-item="previous"></a>
                                <a class="uk-position-center-right slidenav-next" href="#" uk-slider-item="next"></a>
                            </div>

                        </div>
                    </div>
                </div>
                <div id="data">
                    <!-- Results -->
                </div>
                <!-- <div class="post">
                    <div class="post-heading">
                        <div class="post-avature">
                            <img src="{{ asset('public/holaTheme/assets/images/avatars/avatar-6.jpg') }}" alt="">
                        </div>
                        <div class="post-title">
                            <h4> User Name</h4>
                            <p> <i class="uil-users-alt"></i> </p>
                        </div>
                        <div class="post-btn-action">
                            <span class="icon-more uil-ellipsis-h"></span>
                            <div class="mt-0 p-2" uk-dropdown="pos: bottom-right;mode:hover ">
                                <ul class="uk-nav uk-dropdown-nav">
                                    <li><a href="#"> <i class="uil-share-alt mr-1"></i> Share</a> </li>
                                    <li><a href="#"> <i class="uil-edit-alt mr-1"></i> Edit Post </a></li>
                                    <li><a href="#"> <i class="uil-comment-slash mr-1"></i> Disable comments
                                        </a></li>
                                    <li><a href="#"> <i class="uil-favorite mr-1"></i> Add favorites </a></li>
                                    <li><a href="#" class="text-danger"> <i class="uil-trash-alt mr-1"></i>
                                            Delete </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="post-description">
                        <p class="post-text"></p>
                        <div class="fullsizeimg">
                            <img src="" alt="">
                        </div>
                    </div>

                    <div class="post-state">
                        <div class="post-state-btns"> <i class="uil-heart"></i><span> Liked </span>
                        </div>
                        <div class="post-state-btns" id="myBtn"> <i class="uil-chat"></i><span> Coments</span>
                        </div>
                        <div class="post-state-btns"> <i class="uil-share-alt"></i> 19 <span> Shared </span>
                        </div>
                        <div class="post-state-btns"> <i class="uil-eye"></i> 13 <span> View </span>
                        </div>
                    </div>

                    <div class="post-comments">
                        <a href="#" class="view-more-comment"> Veiw 8 more Comments</a>
                        
                        <div class="post-comments-single">
                            <div class="post-comment-avatar">
                                <img src="" alt="">
                            </div>
                            <div class="post-comment-text">
                                <div class="post-comment-text-inner">
                                    <h6>
                                        <a href=""></a>
                                    </h6> -->
                                    <!-- comment text here -->
                                    <!-- <p>  </p>
                                </div>
                                <div class="uk-text-small">
                                    <a href="#" class="text-danger mr-1"> <i class="uil-heart"></i> Love </a>
                                    <a href="#" class=" mr-1"> Replay </a>
                                    <span> </span>
                                </div>
                            </div>
                            <a href="#" class="post-comment-opt"></a>
                        </div>

                        <a href="#" class="view-more-comment"> Veiw 8 more Comments</a>

                        <div class="post-add-comment">
                            <div class="post-add-comment-avature">
                                <img src="" alt="">
                            </div>
                            <div class="post-add-comment-text-area">
                                <form action="" method="post">
                                    @csrf
                                    <input type="hidden" name="post_id" value="">
                                    <input type="text" id="post-text" name="comment_text" placeholder="Write your comment ..." required>
                                    <div class="icons" id="comment-icon-div">
                                        <button type="submit" class="comment-icon">
                                            <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="d-flex" style="margin-left:35%">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom_js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- <script src="{{ asset('public/custom/homepage.js') }}"></script> -->
<script>
    $('#image-input').hide();

    $(window).bind('scroll', onScroll); 
    var ENDPOINT = "{{ url('/') }}";
    var page = 1;
    var requestNumber = false;
    setTimeout(infinteLoadMore(page), 2000);

    function onScroll() {
        if ($(window).scrollTop() + $(window).height() == $(document).height() - 1) {
            $('html,body').bind('touchmove', function() {
                setTimeout(onScroll, 2000);
            });
            page++;
            infinteLoadMore(page);
        } else {
            $('html,body').unbind('touchmove');
        }
    }

    function infinteLoadMore(page) {
        $.ajax({
                url: ENDPOINT + "/?page=" + page,
                datatype: "html",
                type: "get",
                beforeSend: function () {
                    $('.auto-load').show();
                }
            })
            .done(function (response) {
                if (response.length == 0) {
                    $('.auto-load').html("We don't have more data to display :(");
                    return;
                }
                $('.auto-load').hide();
                $.each(response.data, function (key,value) {
                    var html = "";
                    html += '<div class="post"><div class="post-heading"><div class="post-avature"><img src="public/uploads/' + value.user.profile_image + '" alt=""></div><div class="post-title"><h4>' + value.user.first_name + ' ' + value.user.last_name + '</h4><p> <i class="uil-users-alt"></i> </p></div><div class="post-btn-action"><span class="icon-more uil-ellipsis-h"></span><div class="mt-0 p-2" uk-dropdown="pos: bottom-right;mode:hover "><ul class="uk-nav uk-dropdown-nav"><li><a href="#"> <i class="uil-share-alt mr-1"></i> Share</a> </li><li><a href="#"> <i class="uil-edit-alt mr-1"></i> Edit Post </a></li><li><a href="#"> <i class="uil-comment-slash mr-1"></i> Disable comments</a></li><li><a href="#"> <i class="uil-favorite mr-1"></i> Add favorites </a></li><li><a href="#" class="text-danger"> <i class="uil-trash-alt mr-1"></i>Delete </a></li></ul></div></div></div>';
                    if (value.post_txt != '' && value.post_image == null) {
                        html += '<div class="post-description"><p class="post-text">' + value.post_txt + '</p></div>';
                    } else if (value.post_txt != null && value.post_image != null) {
                        html += '<div class="post-description"><p class="post-text">' + value.post_txt + '</p><div class="fullsizeimg"><img src="public/uploads/'+ value.post_image + '" alt=""></div></div>';
                    } else if (value.post_txt == null && value.post_image != '') {
                        html += '<div class="post-description"><div class="fullsizeimg"><img src="public/uploads/' + value.post_image + '" alt=""></div></div>';
                    }

                    html += '<div class="post-state"><div class="post-state-btns" uk-tooltip="views"> <i class="uil-eye"></i> <sup>1.2k</sup></div><div class="post-state-btns" id="myBtn" uk-tooltip="comments"> <i class="uil-comments"></i> <sup>52</sup></div><div class="post-state-btns" uk-tooltip="like" style="color: green;"> <i class="uil-heart"></i> <sup>2.2k</sup></div><div class="post-state-btns" uk-tooltip="dislike" style="color: red;"> <i class="fa fa-heartbeat" aria-hidden="true"></i> <sup>20</sup></div><div class="post-state-btns" uk-tooltip="share"> <i class="fa fa-share-alt-square" aria-hidden="true"></i></div></div>';

                    $("#data").append(html);
                });
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log('Server error occured');
            }
        );
    }
</script>
@endsection