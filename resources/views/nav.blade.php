<!--<header class="header header_default style_one get_sticky_header">-->
<div class="navbar_outer mod_btn_enable">
    <div class="medium-container">
        <div class="row align-items-left">
            <!--<div class="col-lg-2 col-md-9 col-sm-9 col-xs-9 logo_column">
                <div class="header_logo_box">
                    <a href="/" class="logo navbar-brand">
                        <img src="{{ asset('/backend/assets/images/logo/logo-ppf.png') }}" alt="PPF Logo" class="logo_default">
                        <img src="{{ asset('/backend/assets/images/logo/logo-ppf.png') }}" alt="PPF Logo" class="logo__sticky">
                    </a>
                </div>
            </div>-->
            <div class="col-lg-12 menu_column">
                <div class="navbar_togglers hamburger_menu">
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                </div>
                <div class="header_content_collapse">
                    <div class="header_menu_box">
                        <div class="navigation_menu">
                            <ul id="myNavbar" class="navbar_nav">
                                <li class="menu-item nav-item {{ (request()->segment(1) == '') ? 'active' : '' }}">
                                    <a href="/" class="nav-link">
                                        <span>Home</span>
                                    </a>
                                </li>
                                <li class="menu-item nav-item {{ (request()->segment(1) == 'about') ? 'active' : '' }}">
                                    <a href="/about" class="nav-link">
                                        <span>About PPF</span>
                                    </a>
                                </li>
                                <li class="menu-item nav-item {{ (request()->segment(1) == 'officials') ? 'active' : '' }}">
                                    <a href="/officials" class="nav-link">
                                        <span>Officials</span>
                                    </a>
                                </li>
                                <li class="menu-item nav-item {{ (request()->segment(1) == 'membership') ? 'active' : '' }}">
                                    <a href="{{ route('membership') }}" class="nav-link">
                                        <span>Membership</span>
                                    </a>
                                </li>
                                <li class="menu-item nav-item {{ (request()->segment(1) == 'events') ? 'active' : '' }}">
                                    <a href="/events" class="nav-link">
                                        <span>Events</span>
                                    </a>
                                </li>
                                <!--<li class="menu-item nav-item {{ (request()->segment(1) == 'benevolent') ? 'active' : '' }}">
                                    <a href="/benevolent" class="nav-link">
                                        <span>Benevolent</span>
                                    </a>
                                </li>-->
                                <li class="menu-item nav-item {{ (request()->segment(1) == 'publications') ? 'active' : '' }}">
                                    <a href="/publications" class="nav-link">
                                        <span>Publications</span>
                                    </a>
                                </li>
                                <li class="menu-item nav-item {{ (request()->segment(1) == 'gallery') ? 'active' : '' }}">
                                    <a href="/gallery" class="nav-link">
                                        <span>Gallery</span>
                                    </a>
                                </li>
                                <li class="menu-item nav-item {{ (request()->segment(1) == 'community') ? 'active' : '' }}">
                                    <a href="/community" class="nav-link">
                                        <span>Community</span>
                                    </a>
                                </li>
                                <li class="menu-item nav-item {{ (request()->segment(1) == 'contact') ? 'active' : '' }}">
                                    <a href="/contact" class="nav-link">
                                        <span>Contact</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="header_right_content">
                        <ul>
                            <li>
                                <button type="button" class="search-toggler"><i class="icon-search"></i></button>
                            </li>
                            <li class="header-button">
                                <a href="{{ route('login') }}" target="_blank" rel="" class="theme-btn one"> Login </a>
                            </li>
                            <li>
                                <button type="button" class="contact-toggler" title="Share Your Thoughts"><i class="icon-bar"></i></button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--</header>-->