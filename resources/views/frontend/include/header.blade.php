<header class="ltn__header-area ltn__header-3 section-bg-6">
    <!-- ltn__header-top-area start -->
    <div class="ltn__header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="ltn__top-bar-menu">
                        <ul>
                            <li><a href="mailto:info@webmail.com?Subject=Flower%20greetings%20to%20you"><i class="icon-mail"></i> {{ $top_menu->gmail }}</a></li>
                            <li><a href="locations.html"><i class="icon-placeholder"></i> {{ $top_menu->address }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="top-bar-right text-right text-end">
                        <div class="ltn__top-bar-menu">
                            <ul>
                                <li>
                                    <!-- ltn__language-menu -->
                                    <div class="ltn__drop-menu ltn__currency-menu ltn__language-menu">
                                        <ul>
                                            <li><a href="#" class="dropdown-toggle"><span class="active-currency">English</span></a>
                                                <ul>
                                                    <li><a href="#">Arabic</a></li>
                                                    <li><a href="#">Bengali</a></li>
                                                    <li><a href="#">Chinese</a></li>
                                                    <li><a href="#">English</a></li>
                                                    <li><a href="#">French</a></li>
                                                    <li><a href="#">Hindi</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <!-- ltn__social-media -->
                                    <div class="ltn__social-media">
                                        <ul>
                                            <li><a href="{{ $top_menu->facebook }}" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="{{ $top_menu->twitter }}" title="Twitter"><i class="fab fa-twitter"></i></a></li>

                                            <li><a href="{{ $top_menu->instagram}}" title="instagram"><i class="fab fa-instagram"></i></a></li>
                                            <li><a href="#" title="Dribbble"><i class="fab fa-dribbble"></i></a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ltn__header-top-area end -->
    <!-- ltn__header-middle-area start -->
    <div class="ltn__header-middle-area">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="site-logo">

                        <a href="{{ route('home')}}"><img src="{{ asset('admin/logo_images/'.$logos->logo_img) }}" alt="Logo"></a>

                    </div>
                </div>
                <div class="col header-contact-serarch-column d-none d-lg-block">
                    <div class="header-contact-search">
                        <!-- header-feature-item -->
                        <div class="header-feature-item">
                            <div class="header-feature-icon">
                                <i class="icon-call"></i>
                            </div>
                            <div class="header-feature-info">
                                <h6>Phone</h6>
                                <p><a href="tel:0123456789">{{ $logos->phone_number }}<br></a></p>
                            </div>
                        </div>
                        <!-- header-search-2 -->
                        <div class="header-search-2">
                            <form id="#123" method="get"  action="#">
                                <input type="text" name="search" value="" placeholder="Search here..."/>
                                <button type="submit">
                                    <span><i class="icon-search"></i></span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <!-- header-options -->
                    <div class="ltn__header-options">
                        <ul>
                            <li class="d-none">
                                <!-- ltn__currency-menu -->
                                <div class="ltn__drop-menu ltn__currency-menu">
                                    <ul>
                                        <li><a href="#" class="dropdown-toggle"><span class="active-currency">USD</span></a>
                                            <ul>
                                                <li><a href="login.html">USD - US Dollar</a></li>
                                                <li><a href="wishlist.html">CAD - Canada Dollar</a></li>
                                                <li><a href="register.html">EUR - Euro</a></li>
                                                <li><a href="account.html">GBP - British Pound</a></li>
                                                <li><a href="wishlist.html">INR - Indian Rupee</a></li>
                                                <li><a href="wishlist.html">BDT - Bangladesh Taka</a></li>
                                                <li><a href="wishlist.html">JPY - Japan Yen</a></li>
                                                <li><a href="wishlist.html">AUD - Australian Dollar</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="d-lg-none">
                                <!-- header-search-1 -->
                                <div class="header-search-wrap">
                                    <div class="header-search-1">
                                        <div class="search-icon">
                                            <i class="icon-search  for-search-show"></i>
                                            <i class="icon-cancel  for-search-close"></i>
                                        </div>
                                    </div>
                                    <div class="header-search-1-form">
                                        <form action="{{ route('search') }}"  method="GET">

                                            <input type="text" name="search" value="" placeholder="Search here..."/>
                                            <button type="submit">
                                                <span><i class="icon-search"></i></span>
                                            </button>
                                        </form>
                                    </div>

                                </div>
                            </li>
                            <li class="d-none---">
                                <!-- user-menu -->
                                <div class="ltn__drop-menu user-menu">
                                    @auth
                                        <h6> {{ auth()->user()->name }}!</h6>
                                    @else
                                        <h6></h6>
                                    @endauth
                                    <ul>
                                        <li>
                                            <a href="#"><i class="icon-user"></i></a>
                                            <ul>
                                                <li><a href="{{ route('login') }}">Sign in</a></li>
                                                <li><a href="{{route('register') }}">Register</a></li>
                                                @if(auth()->check())
                                                <li><a href="{{ route('my.account') }}">My Account</a></li>
                                                <li><a href="" onclick="event.preventDefault(); document.getElementById('logoutForm').submit()">logout</a></li>
                                                    {{-- <button type="submit">logout</button> --}}
                                                   @else
                                                     <p></p>
                                                    @endif
                                                    <form action="{{ route('logout') }}" method="POST" id="logoutForm">
                                                        @csrf
                                                    </form>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <!-- mini-cart 2 -->
                                <div class="mini-cart-icon mini-cart-icon-2">
                                    <a href="#ltn__utilize-cart-menu" class="ltn__utilize-toggle">
                                        <span class="mini-cart-icon">
                                            <i class="icon-shopping-cart"></i>
                                            <sup class="bg-danger">{{ count(Cart::content()) }}</sup>
                                        </span>
                                        <h6><span>Your Cart</span> <span class="ltn__secondary-color">$89.25</span></h6>

                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ltn__header-middle-area end -->
    <!-- header-bottom-area start -->


    <div class="header-bottom-area ltn__border-top ltn__header-sticky  ltn__sticky-bg-white ltn__primary-bg--- section-bg-1 menu-color-white--- d-none d-lg-block" ">
        <div class="container">
            <div class="row">
                <div class="col header-menu-column justify-content-center">
                    <div class="sticky-logo">
                        <div class="site-logo">
                            <a href="{{ route('home')}}"><img src="{{ asset('/')}}frontend/img/logo.png" alt="Logo"></a>
                        </div>
                    </div>
                    <div class="header-menu header-menu-2">
                        <nav>
                            <div class="ltn__main-menu">
                                <ul>
                                    <li class="menu-icon"><a href="{{ route('home')}}">Home</a>
                                        <ul class="sub-menu menu-pages-img-show ltn__sub-menu-col-2---">
                                            <li>
                                                <a href="index.html">Home Style 01</a>

                                            </li>
                                            <li>
                                                <a href="index-2.html">Home Style 02</a>

                                            </li>
                                            <li>
                                                <a href="index-3.html">Home Style 03</a>

                                            </li>

                                        </ul>
                                    </li>
                                    <li class="menu-icon"><a href="#">About</a>
                                        <ul>
                                            <li><a href="{{ route('about.us') }}">About Us</a></li>
                                            <li><a href="{{ route('team.us') }}">Our Team</a></li>
                                            <li><a href="{{ route('faq') }}">Faq</a></li>
                                            <li><a href="service-details.html">Service Details</a></li>

                                        </ul>
                                    </li>
                                    <li class="menu-icon"><a href="{{ route('shop') }}">Shop</a>

                                    </li>
                                    <li class="menu-icon"><a href="{{ route('service') }}">Service</a>

                                    </li>
                                    <li class="menu-icon"><a href="#">News</a>
                                        <ul>
                                            <li><a href="blog.html">News</a></li>
                                            <li><a href="blog-grid.html">News Grid</a></li>
                                            <li><a href="blog-left-sidebar.html">News Left sidebar</a></li>
                                            <li><a href="blog-right-sidebar.html">News Right sidebar</a></li>
                                            <li><a href="blog-details.html">News details</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-icon"><a href="#">Pages</a>
                                        <ul class="mega-menu">
                                            <li><a href="#">Inner Pages</a>
                                                <ul>
                                                    <li><a href="portfolio.html">Gallery</a></li>
                                                    <li><a href="portfolio-2.html">Gallery - 02</a></li>
                                                    <li><a href="portfolio-details.html">Gallery Details</a></li>
                                                    <li><a href="team.html">Team</a></li>
                                                    <li><a href="team-details.html">Team Details</a></li>
                                                    <li><a href="faq.html">FAQ</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Inner Pages</a>
                                                <ul>
                                                    <li><a href="history.html">History</a></li>
                                                    <li><a href="contact.html">Appointment</a></li>
                                                    <li><a href="locations.html">Google Map Locations</a></li>
                                                    <li><a href="404.html">404</a></li>
                                                    <li><a href="contact">Contact</a></li>
                                                    <li><a href="coming-soon.html">Coming Soon</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Shop Pages</a>
                                                <ul>
                                                    <li><a href="shop.html">Shop</a></li>
                                                    <li><a href="shop-left-sidebar.html">Shop Left sidebar</a></li>
                                                    <li><a href="shop-right-sidebar.html">Shop right sidebar</a></li>
                                                    <li><a href="shop-grid.html">Shop Grid</a></li>
                                                    <li><a href="product-details.html">Shop details </a></li>
                                                    <li><a href="cart.html">Cart</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="shop.html"><img src="{{ asset('/')}}frontend/img/banner/menu-banner-1.png" alt="#"></a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="contact">Contact</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header-bottom-area end -->
</header>
