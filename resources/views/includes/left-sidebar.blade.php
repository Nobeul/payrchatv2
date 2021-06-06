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
                    <li class="{{ $menu == 'home' ? 'active' : '' }}">
                        <a href="{{ url('/') }}"> <img src="{{ asset('public/holaTheme/assets/images/icons/home.png') }}" alt="">
                            <span> Newsfeed </span>
                        </a>
                    </li>
                    <li class="{{ $menu == 'profile' ? 'active' : '' }}">
                        <a href="{{ url('timeline') }}"> <img src="{{ asset('public/holaTheme/assets/images/icons/tag-friend.png') }}" alt="">
                            <span> Profile </span>
                        </a>
                    </li>
                    <li>
                        <a href="https://chatbuds.payrchat.com/home"> <img src="{{ asset('public/holaTheme/assets/images/icons/chat.png') }}" alt="">
                            <span> Chat Buds </span>
                        </a>
                    </li>
                    <li class="{{ $menu == 'people-you-may-know' ? 'active' : '' }}">
                        <a href="{{ url('people-you-may-know') }}"> <img src="{{ asset('public/holaTheme/assets/images/icons/friends.png') }}" alt="">
                            <span> People you may know </span>
                        </a>
                    </li>
                    <li class="{{ $menu == 'blog' ? 'active' : '' }}">
                        <a href="{{ route('blogs') }}"> <img src="{{ asset('public/holaTheme/assets/images/icons/google-docs.png') }}" alt="">
                            <span> Blogs </span>
                        </a>
                    </li>
                    <li class="{{ $menu == 'photo-album' ? 'active' : '' }}">
                        <a href="{{ url('/album') }}"> <img src="{{ asset('public/holaTheme/assets/images/icons/gallery.png') }}" alt="">
                            <span> Album </span>
                        </a>
                    </li>
                    <li class="{{ $menu == 'video-album' ? 'active' : '' }}">
                        <a href="{{ url('/videos') }}"> <img src="{{ asset('public/holaTheme/assets/images/icons/movies.png') }}" alt="">
                            <span> Videos </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>