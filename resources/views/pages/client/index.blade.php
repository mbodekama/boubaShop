@extends('../../layouts/partials_client/master')

@section('content')

    <!-- SLIDER -->

        <div class="slider-area bg-gray-10">
            <div class="container">
                <div class="hero-slider-active-2 nav-style-1 nav-style-1-modify-2 nav-style-1-orange">
                    <div class="single-hero-slider single-hero-slider-hm10 single-animation-wrap">
                        <div class="row slider-animated-1">
                            <div class="col-lg-5 col-md-5 col-12 col-sm-12">
                                <div class="hero-slider-content-6 slider-content-hm9 slider-content-hm10">
                                    <h5 class="animated">Best Seller</h5>
                                    <h1 class="animated">new ipad pro <br>& phone x</h1>
                                    <p class="animated">Prodctect your house with home secure wifi camere indoor/outdoor</p>
                                    <div class="btn-style-1">
                                        <a class="animated btn-1-padding-4 btn-1-orange btn-1-font-14" href="detail-product.php">Explore Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-12 col-sm-12">
                                <div class="hm10-hero-slider-img">
                                    <img class="animated" src="{{ asset('assets/images/slider/hm-10-slider-1.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-hero-slider single-hero-slider-hm10 single-animation-wrap">
                        <div class="row slider-animated-1">
                            <div class="col-lg-5 col-md-5 col-12 col-sm-12">
                                <div class="hero-slider-content-6 slider-content-hm9 slider-content-hm10">
                                    <h5 class="animated">Best Seller</h5>
                                    <h1 class="animated">new ipad pro <br>& phone x</h1>
                                    <p class="animated">Prodctect your house with home secure wifi camere indoor/outdoor</p>
                                    <div class="btn-style-1">
                                        <a class="animated btn-1-padding-4 btn-1-orange btn-1-font-14" href="detail-product.php">Explore Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-12 col-sm-12">
                                <div class="hm10-hero-slider-img">
                                    <img class="animated" src="{{ asset('assets/images/slider/hm-10-slider-1.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-hero-slider single-hero-slider-hm10 single-animation-wrap">
                        <div class="row slider-animated-1">
                            <div class="col-lg-5 col-md-5 col-12 col-sm-12">
                                <div class="hero-slider-content-6 slider-content-hm9 slider-content-hm10">
                                    <h5 class="animated">Best Seller</h5>
                                    <h1 class="animated">new ipad pro <br>& phone x</h1>
                                    <p class="animated">Prodctect your house with home secure wifi camere indoor/outdoor</p>
                                    <div class="btn-style-1">
                                        <a class="animated btn-1-padding-4 btn-1-orange btn-1-font-14" href="detail-product.php">Explore Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-12 col-sm-12">
                                <div class="hm10-hero-slider-img">
                                    <img class="animated" src="{{ asset('assets/images/slider/hm-10-slider-1.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- SLIDER -->



        <div class="product-area pb-70">
            <div class="container">
                <div class="section-wrap-1">
                    <div class="section-title-deal-wrap mb-30">
                        <div class="section-title-8">
                            <h2>En promotion</h2>
                        </div>
                         
                    </div>
                    <div class="product-slider-active-8 dot-style-2 dot-style-2-position-static dot-style-2-mrg-3 nav-style-5 nav-style-5-modify">
                        @for ($i=0; $i < 10; $i++) 
                       
                            <div class="product-plr-1">
                                    <div class="single-product-wrap">
                                        <div class="product-img product-img-zoom mb-20">
                                            <a href="detail-product.php">
                                                <img src="{{ asset('assets/images/product/product-41.jpg') }}" alt="">
                                            </a>
                                            <span class="pro-badge left bg-red">-40%</span>
                                            <div class="product-action-2">
                                                <button title="Wishlist"><i class="icon-heart"></i></button>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap-3">
                                            <h3 class="mrg-none"><a class="orange" href="detail-product.php">Nm Article</a></h3>
                                            <div class="product-rating-wrap-2">
                                                <div class="product-rating-4">
                                                    <i class="icon_star"></i>
                                                    <i class="icon_star"></i>
                                                    <i class="icon_star"></i>
                                                    <i class="icon_star"></i>
                                                    <i class="icon_star"></i>
                                                </div>
                                                <span>(4)</span>
                                            </div>
                                            <div class="product-price-4">
                                                <span class="new-price">$38.50 </span>
                                                <span class="old-price">$42.85</span>
                                            </div>
                                             
                                            
                                        </div>
                                        <div class="product-content-wrap-3 product-content-position-2 pro-position-2-padding-dec">
                                            <h3 class="mrg-none"><a class="orange" href="detail-product.php">Nm Article </a></h3>
                                            
                                            <div class="product-price-4">
                                                <span class="new-price">$38.50 </span>
                                                <span class="old-price">$42.85</span>
                                            </div>
                                             
                                            <center class="pro-add-to-cart-2">
                                                <button title="">Ajouter au panier</button>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                        @endfor
                                
                    


                        
                    </div>
                </div>
            </div>
        </div>

        @for($j=0; $j<3 ; $j++) 
       
        <div class="banner-product-wrap pb-70">
            <div class="container">
                <div class="section-wrap-3">
                    <div class="row">
                        <div class="col-lg-4 col-md-6" style="background-color: #c6c3c3;">
                        <div class="section-title-btn-wrap mb-25">
                                    <div class="section-title-8">
                                        <h4>Par catégorie</h4>
                                        <h2>NOM CATEGORIE</h2>
                                    </div>
                                    
                                </div>
                            <div class="banner-wrap">
                                <div class="banner-img banner-img-zoom">
                                    <a href="product-sortby-catg.php"><img src="{{ asset('assets/images/banner/banner-290.jpg') }}" alt=""></a>
                                </div>
                                <div class="banner-content-23 text-center">
                                     
                                    <div class="banner-btn-3">
                                        <a href="product-sortby-catg.php">Voir plus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-6">
                            <div class="product-area ">
 
                                <div class="tab-content jump">
                                    <div class="container">
                                        <div class="section-wrap-2">
                                            <div class="row">
                                                            @for ($i=0; $i < 6; $i++) 
                                                                 
                                                                    <div class="col-lg-4 col-md-6">
                                                                            <div class="single-product-wrap">
                                                                                <div class="product-img product-img-zoom mb-20">
                                                                                    <a href="detail-product.php">
                                                                                        <img src="{{ asset('assets/images/product/product-41.jpg') }}" alt="">
                                                                                    </a>
                                                                                    <span class="pro-badge left bg-red">-40%</span>
                                                                                    <div class="product-action-2">
                                                                                        <button title="Wishlist"><i class="icon-heart"></i></button>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="product-content-wrap-3">
                                                                                    <h3 class="mrg-none"><a class="orange" href="detail-product.php">Nm Article</a></h3>
                                                                                    <div class="product-rating-wrap-2">
                                                                                        <div class="product-rating-4">
                                                                                            <i class="icon_star"></i>
                                                                                            <i class="icon_star"></i>
                                                                                            <i class="icon_star"></i>
                                                                                            <i class="icon_star"></i>
                                                                                            <i class="icon_star"></i>
                                                                                        </div>
                                                                                        <span>(4)</span>
                                                                                    </div>
                                                                                    <div class="product-price-4">
                                                                                        <span class="new-price">$38.50 </span>
                                                                                        <span class="old-price">$42.85</span>
                                                                                    </div>
                                                                                     
                                                                                    
                                                                                </div>
                                                                                <div class="product-content-wrap-3 product-content-position-2 pro-position-2-padding-dec">
                                                                                    <h3 class="mrg-none"><a class="orange" href="detail-product.php">Nm Article </a></h3>
                                                                                    
                                                                                    <div class="product-price-4">
                                                                                        <span class="new-price">$38.50 </span>
                                                                                        <span class="old-price">$42.85</span>
                                                                                    </div>
                                                                                     
                                                                                    <center class="pro-add-to-cart-2">
                                                                                        <button title="">Ajouter au panier</button>
                                                                                    </center>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                            @endfor
                         
                                              
                                            </div>
                                        </div>
                                    </div>
 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endfor
@endsection