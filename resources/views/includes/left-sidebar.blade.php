<div class="main_sidebar">
    <div class="side-overlay" uk-toggle="target: #wrapper ; cls: collapse-sidebar mobile-visible"></div>
    <!-- sidebar header -->
    <div class="sidebar-header">
        <h4> Menus</h4>
        <span class="btn-close" uk-toggle="target: #wrapper ; cls: collapse-sidebar mobile-visible"></span>
    </div>
    <!-- sidebar Menu -->
    <div class="sidebar">
        <div class="sidebar_innr" data-simplebar>
            <div class="sections">
                <ul>
                    <li class="active">
                        <a href="{{ url('/') }}"> <img src="{{ asset('public/holaTheme/assets/images/icons/home.png') }}" alt="">
                            <span> Newsfeed </span>
                        </a>
                    </li>
                    <li>
                        <a href=""> <img src="{{ asset('public/holaTheme/assets/images/icons/tag-friend.png') }}" alt="">
                            <span> Profile </span>
                        </a>
                    </li>
                    <li>
                        <a href="https://chatbuds.payrchat.com/home"> <img src="{{ asset('public/holaTheme/assets/images/icons/chat.png') }}" alt="">
                            <span> Chat Buds </span>
                        </a>
                    </li>
                    <li>
                        <a href="#"> <img src="{{ asset('public/holaTheme/assets/images/icons/friends.png') }}" alt="">
                            <span> People you may know </span>
                        </a>
                    </li>
                    <li>
                        <a href="#"><img src="{{ asset('public/holaTheme/assets/images/icons/google-docs.png') }}" alt="">
                            <span> Blogs </span> </a>
                            <ul>
                                <li>
                                    <a href="{{ route('blogs') }}">All Blogs</a>
                                </li>
                                <li>
                                    <a href="{{ url('/create/blog') }}">Create New</a>
                                </li>
                            </ul>
                    </li>
                    <li>
                        <a href="#"> <img src="{{ asset('public/holaTheme/assets/images/icons/investment.png') }}" alt="">
                            <span> Investments </span> </a>
                            <ul>
                                <li>
                                    <a href="">My investment</a>
                                </li>
                                <li>
                                    <a href="">Investment status</a>
                                </li>
                                <li>
                                    <a href="">Add fund</a>
                                </li>
                                <li>
                                    <a href="">Withdraw history</a>
                                </li>
                            </ul>
                    </li>
                    <li>
                        <a href=""> <img src="{{ asset('public/holaTheme/assets/images/icons/video.png') }}" alt="">
                            <span> Videos </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>