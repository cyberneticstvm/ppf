<header class="main-nav">
    <div class="sidebar-user text-center"><a class="setting-primary" href="javascript:void(0)"><i data-feather="settings"></i></a><img class="img-90 rounded-circle" src="{{ asset('/backend/assets/images/dashboard/1.png') }}" alt="">
        <div class="badge-bottom"><span class="badge badge-primary">New</span></div><a href="user-profile.html">
            <h6 class="mt-3 f-14 f-w-600">{{ Auth::user()->name }}</h6>
        </a>
        <p class="mb-0 font-roboto">Administrator</p>
    </div>
    <nav>
        <div class="main-navbar">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>General </h6>
                        </div>
                    </li>
                    <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="home"></i><span>Dashboard</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="airplay"></i><span>Events</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="">Manage Events</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="layout"></i><span>Scrolling Messages</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="">Manage Scrolling Messages</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="book-open"></i><span>Publications</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="">Manage Publications</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="bookmark"></i><span>Advertisements</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="">Manage Advertisents</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="image"></i><span>Gallery</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="">Manage Gallery</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="users"></i><span>Committee Management</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="">Manage Committee</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="user-plus"></i><span>Member Management</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="">Registered Members</a></li>
                            <li><a href="">New Applications</a></li>
                            <li><a href="">Rejected Applications</a></li>
                            <li><a href="">Renewed Applications</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="bell"></i><span>Thoughts</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="">Manage Thoughts</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="file"></i><span>Reports</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="">Reports</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="settings"></i><span>Site Management</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="">Import Members</a></li>
                            <li><a href="{{ route('category') }}">Manage Category</a></li>
                            <li><a href="">Manage Logo</a></li>
                            <li><a href="">Manage Home Sliders</a></li>
                            <li><a href="">Manage About Us</a></li>
                            <li><a href="">Manage Officials</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>