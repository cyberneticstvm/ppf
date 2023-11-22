<header class="header header_default style_one get_sticky_header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-2 col-md-9 col-sm-9 col-xs-9 logo_column">
                <div class="header_logo_box">
                    <a href="index.html" class="logo navbar-brand">
                        <img src="{{ asset('/backend/assets/images/logo/logo-ppf.png') }}" alt="Creote Elementor" class="logo_default">
                        <img src="{{ asset('/backend/assets/images/logo/logo-ppf.png') }}" alt="Creote Elementor" class="logo__sticky">
                    </a>
                </div>
            </div>
            <div class="col-lg-10 col-md-3 col-sm-3 col-xs-3 menu_column">
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
                                <li class="menu-item nav-item">
                                    <a href="/" class="nav-link">
                                        <span>About PPF</span>
                                    </a>
                                </li>
                                <li class="menu-item nav-item">
                                    <a href="/" class="nav-link">
                                        <span>Officials</span>
                                    </a>
                                </li>
                                <li class="menu-item nav-item">
                                    <a href="/" class="nav-link">
                                        <span>Membership</span>
                                    </a>
                                </li>
                                <li class="menu-item nav-item">
                                    <a href="/" class="nav-link">
                                        <span>Events</span>
                                    </a>
                                </li>
                                <li class="menu-item nav-item">
                                    <a href="/" class="nav-link">
                                        <span>Publications</span>
                                    </a>
                                </li>
                                <li class="menu-item nav-item">
                                    <a href="/" class="nav-link">
                                        <span>Gallery</span>
                                    </a>
                                </li>
                                <li class="menu-item nav-item">
                                    <a href="/" class="nav-link">
                                        <span>Community</span>
                                    </a>
                                </li>
                                <li class="menu-item nav-item">
                                    <a href="/" class="nav-link">
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
                                <button type="button" class="contact-toggler"><i class="icon-bar"></i></button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>