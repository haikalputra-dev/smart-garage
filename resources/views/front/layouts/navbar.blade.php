    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Section Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="canvas-open">
        <i class="icon_menu"></i>
    </div>
    <div class="offcanvas-menu-wrapper">
        <div class="canvas-close">
            <i class="icon_close"></i>
        </div>
        <div class="header-configure-area">
            @if ( Auth::user() )
                <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                <button type="submit" class="bk-btn">{{ Auth::user()->nama }}</button>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            @else
                <a href="{{ route('login') }}" class="bk-btn">Login</a>
            @endif
        </div>
        <nav class="mainmenu mobile-menu">
            <ul>
                @if (request()->routeIs('landing'))
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="#about-us">About Us</a></li>
                <li><a href="#garasi">Garasi</a></li>
                <li><a href="#services">Services</a></li>
                @else
                <li><a href="{{ url('/') }}">Home</a></li>
                @endif
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <ul class="top-widget">
            <li><i class="fa fa-phone"></i> (88) 412 663</li>
            <li><i class="fa fa-envelope"></i> info.wheelhouse@gmail.com</li>
        </ul>
    </div>
    <!-- Offcanvas Menu Section End -->

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="top-nav">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="tn-left">
                            <li><i class="fa fa-phone"></i> (88) 412 663</li>
                            <li><i class="fa fa-envelope"></i> info.wheelhouse@gmail.com</li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <div class="tn-right">
                            @if ( Auth::user()->role == 'Pelanggan' )
                                <a href="{{ route('profil.pengguna') }}" class="bk-btn">{{ Auth::user()->nama }}</a>
                                @elseif(Auth::user()->role == 'Staff')
                                <a href="{{ route('admin.dashboard') }}" class="bk-btn">{{ Auth::user()->nama }}</a>
                                @elseif(Auth::user()->role == 'Admin')
                                <a href="{{ route('admin.dashboard') }}" class="bk-btn">{{ Auth::user()->nama }}</a>
                            @else
                                <a href="{{ route('login') }}" class="bk-btn">Login</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-item">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="logo">
                            <a href="#home">
                                <img src="{{ asset('foto/logo-company2-v3.png') }}" alt="" style="height: 45px">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="nav-menu">
                            <nav class="mainmenu">
                                <ul>
                                    @if (request()->routeIs('landing'))
                                    <li><a href="{{ url('/') }}">Home</a></li>
                                    <li><a href="#about-us">About Us</a></li>
                                    <li><a href="#garasi">Garasi</a></li>
                                    <li><a href="#services">Services</a></li>
                                    @else
                                    <li><a href="{{ url('/') }}">Home</a></li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->