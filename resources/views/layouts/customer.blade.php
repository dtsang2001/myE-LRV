<!DOCTYPE HTML>
<html lang="vi">
<head>

    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="referrer" content="no-referrer-when-downgrade" />

    <title>@yield('title')</title>

    <base href="{{asset('')}}">
    
    <link rel="stylesheet" href="public/assets/css/fonts-google.css" />

    <link rel="stylesheet" href="public/assets/libs/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="public/assets/fonts/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="public/assets/fonts/Lineicons/style.css" />
    <link rel="stylesheet" href="public/assets/css/plugins.css" />

    <!-- REVOLUTION STYLE SHEETS -->
    <link rel="stylesheet" type="text/css" href="public/assets/libs/revolution/css/settings.css" />
    <!-- REVOLUTION NAVIGATION STYLES -->
    <link rel="stylesheet" type="text/css" href="public/assets/libs/revolution/css/navigation.css" />
    <!-- Main Style -->
    <link rel="stylesheet" href="public/assets/css/style.css" />
    <!-- Responsive Styles -->
    <link rel="stylesheet" href="public/assets/css/responsive.css" />
    <!-- Common space -->
    <link rel="stylesheet" href="public/assets/css/common-space.css">
    <!-- My Style -->
    <link rel="stylesheet" href="public/dist/css/myStyle.css">
    @yield('meta')


</head>
<body class="appear-animate">

<div class="page-loading-wrapper">
    <div class="progress-bar-loading">
        <div class="back-loading progress-bar-inner">
            <svg version="1.1" x="0px" y="0px"
                 viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
                <path d="M3.7,12h10.6l15.1,54.6c0.4,1.6,1.9,2.7,3.6,2.7h46.4c1.5,0,2.8-0.9,3.4-2.2l16.9-38.8c0.5-1.2,0.4-2.5-0.3-3.5
                    c-0.7-1-1.8-1.7-3.1-1.7H45c-2,0-3.7,1.7-3.7,3.7s1.7,3.7,3.7,3.7h45.6L76.9,62H35.8L20.7,7.3c-0.4-1.6-1.9-2.7-3.6-2.7H3.7
                    C1.7,4.6,0,6.3,0,8.3S1.7,12,3.7,12z"/>
                <path d="M29.5,95.4c4.6,0,8.4-3.8,8.4-8.4s-3.8-8.4-8.4-8.4s-8.4,3.8-8.4,8.4C21.1,91.6,24.8,95.4,29.5,95.4z"/>
                <path d="M81.9,95.4c0.2,0,0.4,0,0.6,0c2.2-0.2,4.3-1.2,5.7-2.9c1.5-1.7,2.2-3.8,2-6.1c-0.3-4.6-4.3-8.1-8.9-7.8s-8.1,4.4-7.8,8.9
                    C73.9,91.9,77.5,95.4,81.9,95.4z"/>
            </svg>
        </div>
        <div class="front-loading progress-bar-inner">
            <svg version="1.1" x="0px" y="0px"
                 viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
                <path d="M3.7,12h10.6l15.1,54.6c0.4,1.6,1.9,2.7,3.6,2.7h46.4c1.5,0,2.8-0.9,3.4-2.2l16.9-38.8c0.5-1.2,0.4-2.5-0.3-3.5
                    c-0.7-1-1.8-1.7-3.1-1.7H45c-2,0-3.7,1.7-3.7,3.7s1.7,3.7,3.7,3.7h45.6L76.9,62H35.8L20.7,7.3c-0.4-1.6-1.9-2.7-3.6-2.7H3.7
                    C1.7,4.6,0,6.3,0,8.3S1.7,12,3.7,12z"/>
                <path d="M29.5,95.4c4.6,0,8.4-3.8,8.4-8.4s-3.8-8.4-8.4-8.4s-8.4,3.8-8.4,8.4C21.1,91.6,24.8,95.4,29.5,95.4z"/>
                <path d="M81.9,95.4c0.2,0,0.4,0,0.6,0c2.2-0.2,4.3-1.2,5.7-2.9c1.5-1.7,2.2-3.8,2-6.1c-0.3-4.6-4.3-8.1-8.9-7.8s-8.1,4.4-7.8,8.9
                    C73.9,91.9,77.5,95.4,81.9,95.4z"/>
            </svg>
        </div>
        <div class="progress-bar-number">0%</div>
    </div>
</div>

<div id="search-fullwidth" class="mfp-hide mfp-with-anim">
    <form method="get" class="searchform" action="#">
        <input type="text" placeholder="Bạn muốn tìm gì?" value="" name="search" />
        <button class="submit"><i class="fa fa-search"></i></button>
    </form>
</div>

<div id="page">
    <!-- Header Chính -->
    <header id="header" class="header-shadow header-full-center">
        <div class="topbar">
            <div class="row">
                <div class="topbar-right col-sm-12">
                    <ul class="top-navigation">

                        <!-- Đăng Nhập -->
                        @if(Auth::check())
                        <li class="currency-switcher">
                            <a href="{{ route('account') }}">
                                <img class="avatar" src="uploads/{{ Auth::user()->avatar }}" width="35px" style="height: 35px; object-fit: cover; border-radius: 50%">
                                <b style="padding-left: 10px">{{ Auth::user()->name }}</b>
                            </a>
                            <ul class="top-navigation-submenu" style="width: 100%">
                                <li>
                                    <a href="{{ route('account') }}"><small>TÀI KHOẢN</small></a>
                                </li>
                                <li>
                                    <a href="#"><small>GIỎ HÀNG</small></a>
                                </li>
                                @if(Auth::user()->level != 0)
                                <li>
                                    <a href="{{ route('admin') }}"><small>TRANG QUẢN TRỊ</small></a>
                                </li>
                                @endif
                                <li>
                                    <a href="{{ route('logout_fe') }}"><small>ĐĂNG XUẤT</small></a>
                                </li>
                            </ul>
                        </li>
                        @else
                        <li class="myaccount-item">
                            <a href="{{ route('login_fe') }}">đăng nhập</a>
                            <div class="top-navigation-submenu">
                                <h3 class="submenu-heading">Login</h3>
                                <form class="login" action="{{ route('post_login_fe') }}" method="POST">
                                    
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">

                                    <div class="myaccount-form">
                                        <p>
                                            <label for="username">Địa chỉ email</label>
                                            <input type="text" id="email" name="email" class="input-text">
                                        </p>
                                        <p>
                                            <label for="password">Mật khẩu</label>
                                            <input type="password" id="password" name="password" class="input-text">
                                        </p>
                                        <p>
                                            <input type="submit" value="Login" name="login" class="btn btn-dark-b">

                                            <label class="inline" for="rememberme">
                                                <input type="checkbox" value="forever" id="rememberme" name="rememberme">Nhớ tài khoản
                                            </label>
                                            <a href="" class="forget-password">Quên mật khẩu?</a>
                                        </p>
                                    </div>
                                    <div class="myaccount-create">
                                        Bạn chưa có tài khoản?
                                        <a href="{{ route('login_fe') }}">
                                            <input type="submit" value="đăng ký" name="create" class="btn btn-gray pull-right">
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </li>
                        @endif

                        <!-- Giỏ hàng -->
                        <li class="shopping-bag-item">
                            <a href="{{ route('cart') }}">giỏ hàng <span>{{ $cart->total_items }}</span></a>

                            <div class="top-navigation-submenu">
                                <div class="shopping-bag">
                                    
                                    @if($cart->items)
                                    <div class="bag-products">
                                        @foreach($cart->items as $item)
                                        <div class="bag-product">
                                            <figure>
                                                <a href="#" class="bag-product-img">
                                                    <img src="uploads/{{ $item['image']->url }}" class="img-responsive">
                                                </a>
                                            </figure>
                                            <div class="bag-product-details">
                                                <h4 class="bag-product-title">
                                                    <a href="#">{{ $item['name'] }}</a>
                                                </h4>

                                                <div class="bag-product-price">
                                                    Giá: <span class="amount"><b>{{ number_format($item['unit_price']) }}đ</b></span>
                                                </div>

                                                <div class="bag-product-qty">
                                                    Số lượng: {{ $item['quantity'] }}
                                                </div>
                                            </div>
                                            <a title="Xóa sản phẩm" class="remove" href="{{ route('delete-cart', ['id' => $item['id']]) }}"></a>
                                        </div><!-- .bag-product -->
                                        @endforeach
                                    </div>

                                    <div class="bag-buttons">
                                        <a class="btn-block btn btn-dark-b" href="{{ route('cart') }}">Xem Giỏ Hàng</a>
                                    </div>
                                    @else
                                    <div>
                                        <img class="center-block" src="uploads/cart_null.jpg">
                                    </div>
                                    <p class="cart_block_no_products">Giỏ hàng của bạng trống</p>
                                    @endif

                                </div><!-- .shopping-bag -->
                            </div>

                        </li>
                    </ul><!-- .top-navigation -->
                </div><!-- .topbar-right -->

            </div>
        </div><!-- .topbar -->    

        <div class="navbar-container sticky-header">

        <!-- Menu Chính -->
            <div class="navbar-container-inner clearfix">

                <!-- Logo -->
                <div class="branding">
                    <h1 class="logo">
                        <a href="index.html"><img src="uploads/logo.png"></a>
                    </h1>
                </div><!-- .branding -->

                <div class="mobile-tool">

                    <!-- Icon Menu Hiện Thị Mobile -->
                    <a id="hamburger-icon" href="#" title="Menu">
                        <span class="hamburger-icon-inner">
                            <span class="line line-1"></span>
                            <span class="line line-2"></span>
                            <span class="line line-3"></span>
                        </span>
                    </a>

                    <!-- Gio hàng hiện thị Mobile -->
                    <a href="woocommerce-cart.html" class="mobile-tool-cart">
                        <i class="icon-Shopping-Cart"></i>
                        <span>2</span>
                    </a>
                </div>
                <nav class="main-nav" id="nav">
                    <ul id="main-nav-tool">
                        <li class="search-action">
                            <a href="#search-fullwidth"><i class="fa fa-search"></i></a>
                        </li>
                    </ul><!-- #main-nav-tool -->
                    <div class="container">
                        <div class="main-navigation-outer">
                            <ul id="main-navigation">

                                <!-- Home -->
                                <li>
                                    <a href="{{route('home')}}">Trang Chính</a>
                                </li>

                                <!-- Shop -->
                                <li>
                                    <a href="{{route('product_fe')}}">Sản Phẩm</a>
                                </li>

                                <!--  Giới thiệu -->
                                <li>
                                    <a href="{{route('contact')}}">Giới thiệu</a>
                                </li>

                                <!-- Liên Hệ -->
                                <li>
                                    <a href="{{route('about')}}">Liên Hệ</a>
                                </li>

                                <!-- Blog -->
                                <li>
                                    <a href="../front_end/news.php">Tin Tức</a>
                                </li>

                            </ul><!-- #main-navigation -->
                        </div>
                    </div>
                </nav><!-- .main-nav -->
            </div>
        </div><!-- .navbar-container -->

        <!-- Menu Hiện Thị Mobile -->
        <nav class="main-nav-mobile" id="nav-mobile">
            <ul class="navigation-mobile">

                <li class="active">
                    <a href="{{ route('home') }}">Trang Chính</a>
                </li>
                
                <li>
                    <a href="woocommerce-shop.html">Sản Phẩm</a>
                </li>

                <li>
                    <a href="pages-about.html">Giới thiệu</a>
                </li>

                <li>
                    <a href="pages-contact.html">Liên Hệ</a>
                </li>

                <li>
                    <a href="blog-gird-3columns.html">Tin Tức</a>
                </li>

                <li>
                    <a href="woocommerce-myaccount.html">Đăng Nhập</a>
                </li>

                <li>
                    <form action="#" class="searchform" method="get">
                        <input type="text" name="s" value="" placeholder="Tìm kiếm">
                        <button class="submit"><i class="fa fa-search"></i></button>
                    </form>
                </li>

            </ul>
        </nav>
    </header>

    <!-- Main -->
    @yield('content')
    
</div>
    <!-- Footer -->
    <div id="footer">
    <!-- Thông tin khuyển mãi vận chuyển -->
        <footer id="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="flip-box">
                            <div class="flip-box-before">miễn phí vận chuyển</div>
                            <div class="flip-box-after">cho tất cả các đơn hàng trên 1.000.000đ</div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="flip-box">
                            <div class="flip-box-before">đổi trả miễn phí</div>
                            <div class="flip-box-after">90 ngày đổi trả miễn phí</div>
                        </div>
                    </div>
                </div>
            </div><!-- .container -->
        </footer>
        
        <footer id="footer-area" class="no-padding">
            <div class="row equal_height">
                <div class="col-lg-8 col-md-12">
                    <div class="footer-area-inner">
                        <div class="row">

                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="widget-container widget_nav_menu">
                                    <h3 class="widget-title">Thông tin</h3>
                                    <ul>
                                        <li><a href="pages-about.html">Giới thiệu</a></li>
                                        <li><a href="pages-contact.html">Liên Hệ</a></li>
                                        <li><a href="blog-gird-3columns.html">Tin Tức</a></li>
                                        <li><a href="woocommerce-shop.html">Cửa Hàng</a></li>
                                        <li class="nav-copyright">&copy; 2020 Dephinus</li>
                                    </ul>
                                </div><!-- .widget-container -->
                            </div>

                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="widget-container widget_nav_menu">
                                    <h3 class="widget-title">bộ sưu tập</h3>
                                    <ul>
                                        @foreach($categories as $cat)
                                        <li><a href="#">{{$cat->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </div><!-- .widget-container -->
                            </div>

                            <div class="col-md-5 col-sm-5 col-xs-12">
                                <div class="widget-container widget_nav_menu">
                                    <h3 class="widget-title">nhận tin mới</h3>
                                    <form action="#" method="get" class="newsletters-form style2">
                                        <input type="email" placeholder="Nhập địa chỉ email của bạn"/>
                                        <button class="submit"><i class="icon-Right-3"></i></button>
                                    </form>
                                </div><!-- .widget-container -->
                                <div class="widget-container mar-top-60">
                                    <ul class="social-nav">
                                        <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a> </li>
                                        <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a> </li>
                                        <li><a href="#" target="_blank"><i class="fa fa-instagram"></i></a> </li>
                                        <li><a href="#" target="_blank"><i class="fa fa-linkedin"></i></a> </li>
                                    </ul>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 footer-area-right" style="background: url('uploads/about.jfif') no-repeat center center;">
                    <div class="widget-container widget-hover-content no-margin">
                        <h3 class="widget-title">Câu chuyện của chúng tôi</h3>
                        <div class="widget-hover-element">
                            <p class="no-margin">Cùng với quá trình phát triển của Hawk, hiện nay các sản phẩm đã có mặt hơn 60 đại lý trên khắp cả nước để sẵn sàng đáp ứng nhu cầu sử dụng ngày một tăng của khách hàng với hàng trăm mẫu sản phẩm đa dạng về kiểu dáng và chủng loại.</p>
                        </div>
                    </div>
                </div><!-- .footer-area-right -->

            </div>
        </footer><!-- #footer-area -->
    </div><!-- #footer -->

</div><!-- #page -->

<!-- JS -->
<script type="text/javascript" src="public/assets/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="public/assets/js/jquery-ui.min.js"></script>
<!-- Javascript Page Loader-->
<script type="text/javascript" src="public/assets/js/pace.min.js" data-pace-options='{ "ajax": false }'></script>
<script type="text/javascript" src="public/assets/js/page-loading.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script type="text/javascript" src="public/assets/libs/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="public/assets/js/plugins.js"></script>

<!-- REVOLUTION JS FILES -->
<script type="text/javascript" src="public/assets/libs/revolution/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="public/assets/libs/revolution/js/jquery.themepunch.revolution.min.js"></script>

<!-- Javascript Main File -->
<script type="text/javascript" src="public/assets/js/main.js"></script>
<!-- My Jquery -->
<script src="public/dist/js/myJquery.js"></script>

</body>
</html>