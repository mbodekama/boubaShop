<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>BOuba Ecommerce</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.png') }}">

    <!-- All CSS is here
  ============================================ -->

    <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/signericafat.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/cerebrisans.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/elegant.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/linear-icon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/easyzoom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>

<body>

    <div class="main-wrapper bg-gray-9">
        <header class="header-area bg-orange">
            <div class="header-large-device">
                <div class="header-top header-top-ptb-7 border-bottom-9">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xl-2 col-lg-2">
                                <div class="logo">
                                    <a href="{{ route('products') }}"><img src="{{ asset('assets/images/logo/logo-3.png') }}" alt="logo"></a>
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-7">
                                <div class="categori-search-wrap categori-search-wrap-modify-2">
                                    <div class="categori-style-1">
                                        <select class="nice-select nice-select-style-1">
                                            <option>Toutes catégories </option>
                                           {{--  <option>Clothing </option>
                                            <option>T-Shirt</option>
                                            <option>Shoes</option>
                                            <option>Jeans</option> --}}
                                        </select>
                                    </div>
                                    <div class="search-wrap-3">
                                        <form action="#">
                                            <input placeholder="Search Products..." type="text">
                                            <button class="orange"><i class="lnr lnr-magnifier"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3">
                                <div class="header-action header-action-flex">
                                    <div class="same-style-2 same-style-2-white same-style-2-hover-black same-style-2-font-inc">
                                        <a href="#"><i class="icon-user"></i></a>
                                    </div>
                                   {{--  <div class="same-style-2 same-style-2-white same-style-2-hover-black same-style-2-font-inc">
                                        <a href="#"><i class="icon-heart"></i><span class="pro-count black">03</span></a>
                                    </div> --}}
                                    <div class="same-style-2 same-style-2-white same-style-2-hover-black same-style-2-font-inc header-cart">
                                        <a class="cart-active" href="#">
                                            <i class="icon-basket-loaded"></i><span class="pro-count black">00</span>
                                            <span class="cart-amount white"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
{{--                 <div class="header-bottom">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <div class="main-menu main-menu-white main-menu-font-size-14 main-menu-padding-3 main-menu-lh-5 main-menu-hover-black ">
                                    <nav class="">
                                        <ul>
                                            <li><a href="index.php">HOME </a> </li>

                                             
                                            </li>
                                            <li><a href="shop.html">NOUVEAUTE <i class="icon-arrow-down"></i> </a>
                                                <ul class="mega-menu-style mega-menu-mrg-1">
                                                    <li>
                                                        <ul>
 
                                                            <li>
                                                                <a href="shop.html"><img src="{{ asset('assets/images/banner/banner-12.png') }}" alt=""></a>
                                                            </li>
                                                            <li>
                                                                <a href="shop.html"><img src="{{ asset('assets/images/banner/banner-12.png') }}" alt=""></a>
                                                            </li>
                                                            <li>
                                                                <a href="shop.html"><img src="{{ asset('assets/images/banner/banner-12.png') }}" alt=""></a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><a href="#">CATEGORIES <i class="icon-arrow-down"></i> </a>
                                                <ul class="sub-menu-style">
                                                    <li><a href="about-us.html">Clothing</a></li>
                                                    <li><a href="cart.html">T-Shirt</a></li>
                                                    <li><a href="checkout.html">Shoes </a></li>
                                                    <li><a href="my-account.html">Jeans</a></li>


                                                </ul>
                                            </li>

                                            <li><a href="shop.html">MEN </a></li>
                                            <li><a href="shop.html">WOMEN</a></li>
                                            <li><a href="shop.html">FAQ </a></li>
                                            <li><a href="contact.php">CONTACT </a></li>

                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="header-small-device small-device-ptb-1">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-5">
                            <div class="mobile-logo">
                                <a href="index.html">
                                    <img alt="" src="{{ asset('assets/images/logo/logo-3.png') }}">
                                </a>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="header-action header-action-flex">
                                <div class="same-style-2 same-style-2-white same-style-2-hover-black same-style-2-font-inc">
                                    <a href="login-register.html"><i class="icon-user"></i></a>
                                </div>
                                <div class="same-style-2 same-style-2-white same-style-2-hover-black same-style-2-font-inc">
                                    <a href="wishlist.html"><i class="icon-heart"></i><span class="pro-count black">03</span></a>
                                </div>
                                <div class="same-style-2 same-style-2-white same-style-2-hover-black same-style-2-font-inc header-cart">
                                    <a class="cart-active" href="#">
                                        <i class="icon-basket-loaded"></i><span class="pro-count black">02</span>
                                    </a>
                                </div>
                                <div class="same-style-2 same-style-2-white same-style-2-hover-black main-menu-icon">
                                    <a class="mobile-header-button-active" href="#"><i class="icon-menu"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Mobile menu start -->
        <div class="mobile-header-active mobile-header-wrapper-style">
            <div class="clickalbe-sidebar-wrap">
                <a class="sidebar-close"><i class="icon_close"></i></a>
                <div class="mobile-header-content-area">
                    <div class="mobile-search mobile-header-padding-border-1">
                        <form class="search-form" action="#">
                            <input type="text" placeholder="Search here…">
                            <button class="button-search"><i class="icon-magnifier"></i></button>
                        </form>
                    </div>
                    <div class="mobile-menu-wrap mobile-header-padding-border-2">
                    <div class="mobile-social-icon">
                        <a class="facebook" href="#"><i class="icon-social-facebook"></i></a>
                        <a class="twitter" href="#"><i class="icon-social-twitter"></i></a>
                        <a class="pinterest" href="#"><i class="icon-social-pinterest"></i></a>
                        <a class="instagram" href="#"><i class="icon-social-instagram"></i></a>
                    </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- mini cart start -->
        <div class="sidebar-cart-active">
            <div class="sidebar-cart-all">
                <a class="cart-close" href="#"><i class="icon_close"></i></a>
                <div class="cart-content">
                    <h3>Shopping Panier</h3>
                    <ul>
                        @for ($i=0; $i < 5; $i++)
                            <li class="single-product-cart">
                                <div class="cart-img">
                                    <a href="#"><img src="{{ asset('assets/images/cart/cart-1.jpg') }}" alt=""></a>
                                </div>
                                <div class="cart-title">
                                    <h4><a href="#">Nom Article</a></h4>
                                    <span> 1 × $49.00   </span>
                                </div>
                                <div class="cart-delete">
                                    <a href="#">×</a>
                                </div>
                            </li>
                           
                        @endfor

                
                    </ul>
                    <div class="cart-total">
                        <h4>Sous- total: <span>170.00 FCFA</span></h4>
                    </div>
                    <div class="cart-checkout-btn">
                        <a class="no-mrg btn-hover cart-btn-style" href="checkout.php">Voir panier</a>
                    </div>
                </div>
            </div>
        </div>

