<header class="main-nav">
    <div class="sidebar-user text-center"><a class="setting-primary" href="javascript:void(0)"><i data-feather="settings"></i></a><img class="img-90 rounded-circle" src="{{ asset('/backend/assets/images/dashboard/1.png') }}" alt="">
        <div class="badge-bottom"><span class="badge badge-primary">New</span></div><a href="javascript:void(0)">
            <h6 class="mt-3 f-14 f-w-600">{{ Auth::user()->name }}</h6>
        </a>
        <p class="mb-0 font-roboto"><a href="{{ (Auth::user()->type == 'admin' || Auth::user()->type == 'editor') ? route('change.password') : route('change.password.user') }}">Change Password</a></p>
    </div>
    @if(Auth::user()->type == 'admin' || Auth::user()->type == 'editor')
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
                            <li><a href="{{ route('event') }}">Manage Events</a></li>
                        </ul>
                    </li>
                    <!--<li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="airplay"></i><span>Benevolent Activities</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="{{ route('benevolent') }}">Manage Benevolent Activities</a></li>
                        </ul>
                    </li>-->
                    <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="layout"></i><span>Scrolling Messages</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="{{ route('scrolling') }}">Manage Scrolling Messages</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="book-open"></i><span>Publications</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="{{ route('publication') }}">Manage Publications</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="book-open"></i><span>Jobs</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="{{ route('job') }}">Manage Jobs</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="bookmark"></i><span>Advertisements</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="{{ route('advertisement') }}">Manage Advertisents</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="image"></i><span>Gallery</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="{{ route('gallery') }}">Manage Gallery</a></li>
                        </ul>
                    </li>
                    <!--<li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="users"></i><span>Committee Management</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="">Manage Committee</a></li>
                        </ul>
                    </li>-->
                    @if(Auth::user()->type == 'admin')
                    <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="user-plus"></i><span>Member Management</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="{{ route('member') }}">Registered Members</a></li>
                            <li><a href="{{ route('member.pending') }}">New Applications</a></li>
                            <li><a href="{{ route('member.rejected') }}">Rejected Applications</a></li>
                            <li><a href="{{ route('member.renewal') }}">Renewed Applications</a></li>
                        </ul>
                    </li>
                    @endif
                    <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="bell"></i><span>Thoughts</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="{{ route('thought') }}">Manage Thoughts</a></li>
                        </ul>
                    </li>
                    <!--<li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="file"></i><span>Reports</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="">Reports</a></li>
                        </ul>
                    </li>-->
                    <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="settings"></i><span>Site Management</span></a>
                        <ul class="nav-submenu menu-content">
                            <!--<li><a href="">Import Members</a></li>-->
                            <li><a href="{{ route('category') }}">Manage Category</a></li>
                            <li><a href="{{ route('logo') }}">Manage Logo & Header</a></li>
                            <li><a href="{{ route('slider') }}">Manage Home Sliders</a></li>
                            <li><a href="{{ route('about') }}">Manage About Us</a></li>
                            <li><a href="{{ route('official') }}">Manage Officials</a></li>
                            <li><a href="{{ route('region') }}">Manage Unit Officials</a></li>
                            <li><a href="{{ route('industry') }}">Manage Industry / Specialization</a></li>
                            <li><a href="{{ route('profession') }}">Manage Profession</a></li>
                            <li><a href="{{ route('qualification') }}">Manage Qualification</a></li>
                        </ul>
                    </li>

                    <li class="sidebar-main-title">
                        <div>
                            <h6>Search </h6>
                        </div>
                    </li>
                    <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="user"></i><span>Search Member</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="{{ route('admin.search.member') }}">Search</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
    @else
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
                            <h6>Profile </h6>
                        </div>
                    </li>
                    <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="home"></i><span>Manage Profile</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="{{ route('user.profile.show', encrypt(member()->id)) }}">View Profile</a></li>
                            <li><a href="{{ route('user.profile.edit', encrypt(member()->id)) }}">Edit Profile</a></li>
                            <li><a href="{{ route('user.profile.settings', encrypt(member()->id)) }}">Settings</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Search </h6>
                        </div>
                    </li>
                    <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="user"></i><span>Search Member</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="{{ route('search.member') }}">Search</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @endif
</header>