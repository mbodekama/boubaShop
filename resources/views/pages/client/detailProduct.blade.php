@extends('../../layouts/partials_client/master')

@section('content')
        <div class="breadcrumb-area bg-gray">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <ul>
                        <li>
                            <a href="{{ route('products') }}">Boutique</a>
                        </li>
                        <li class="active">Description article</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="product-details-area pt-120 pb-115">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="product-details-tab">
                            <div class="product-dec-right pro-dec-big-img-slider">
                                <div class="easyzoom-style">
                                    <div class="easyzoom easyzoom--overlay">
                                        <a href="{{ asset($product->img) }}">
                                            <img src="{{ asset($product->img) }}" alt="">
                                        </a>
                                    </div>
                                    <a class="easyzoom-pop-up img-popup" href="{{ asset($product->img) }}">
                                        <i class="icon-size-fullscreen"></i></a>
                                </div>
                                @foreach(getImg($product->id) as $otherImg)
                                <div class="easyzoom-style">
                                    <div class="easyzoom easyzoom--overlay">
                                        <a href="{{ asset($otherImg->images) }}">
                                            <img src="{{ asset($otherImg->images) }}" alt="">
                                        </a>
                                    </div>
                                    <a class="easyzoom-pop-up img-popup" href="{{ asset($otherImg->images) }}">
                                        <i class="icon-size-fullscreen"></i></a>
                                </div>
                                @endforeach
                               
                                 
                                 
                            </div>
                            <div class="product-dec-left product-dec-slider-small-2 product-dec-small-style2">
                                 
                                <div class="product-dec-small">
                                    <img src="{{ asset($product->img) }}" alt="">
                                </div>
                                @foreach(getImg($product->id) as $otherImg)
                                <div class="product-dec-small">
                                    <img src="{{ asset($otherImg->images) }}" alt="">
                                </div>
                                @endforeach
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="product-details-content pro-details-content-mt-md">
                            <h2>{{ $product->nom }}</h2>
                            <div class="product-ratting-review-wrap">
                                <div class="product-ratting-digit-wrap">
                                    <div class="product-ratting">
                                                            @php $val  = rand(1,5) @endphp
                                                            @for($i=1; $i<=5; $i++)
                                                                @if($i<=$val)
                                                                    <i class="icon_star "></i>
                                                                @else
                                                                    <i class="icon_star gray"></i>
                                                                @endif
                                                            @endfor
                                    </div>
                                    <div class="product-digit">
                                        <span>5.0</span>
                                    </div>
                                </div>
{{--                                 <div class="product-review-order">
                                    <span>62 Reviews</span>
                                    <span>242 orders</span>
                                </div> --}}
                            </div>
                            <p>
                            {{ Str::words($product->description,5,'...') }} 
                                <a  style="color: #ff2f2f;" href="#description"> Lire la suite</a>

                            </p>
                            <div class="pro-details-price">
                                <span class="new-price">{{ formatPrice($product->prix).' '.getDeviceSymbole() }} </span>
                                <span class="old-price">{{ $product->fakePrice }}</span>
                            </div>
 
                            <div class="pro-details-quality">
                                <span>Quantité:</span>
                                <div class="cart-plus-minus">
                                    <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1">
                                </div>
                            </div>
                            <div class="product-details-meta">
                                <ul>
                                    <li>
                                        <span>En stock:</span> <a class="h3" href="#">{{ $product->quantite }}</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="pro-details-action-wrap">
                                <div class="pro-details-add-to-cart">
                                    <a title="Add to Cart" href="#">Facebook </a>
                                </div>
                                <div class="pro-details-add-to-cart">
                                    <a title="Add to Cart" href="#">Whastapp </a>
                                </div>
                                {{-- <div class="pro-details-action">
                                    <a title="Add to Wishlist" href="#"><i class="icon-heart"></i></a>
                                    <a title="Add to Compare" href="#"><i class="icon-refresh"></i></a>
                                    <a class="social" title="Social" href="#"><i class="icon-share"></i></a>
                                    <div class="product-dec-social">
                                        <a class="facebook" title="Facebook" href="#"><i class="icon-social-facebook"></i></a>
                                        <a class="twitter" title="Twitter" href="#"><i class="icon-social-twitter"></i></a>
                                        <a class="instagram" title="Instagram" href="#"><i class="icon-social-instagram"></i></a>
                                        <a class="pinterest" title="Pinterest" href="#"><i class="icon-social-pinterest"></i></a>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="description-review-wrapper pb-110" id="description">
            <div class="container" >
                <div class="row">
                    <div class="col-lg-12">
                        <div class="dec-review-topbar nav mb-45">
                            <a class="active" data-bs-toggle="tab" href="#des-details1">Description de l'article</a> 
                        </div>
                        <div class="tab-content dec-review-bottom">
                            <div id="des-details1" class="tab-pane active">
                                <div class="description-wrap">
                                    <p>
                                        {{ $product->description }}
                                    </p>
                                </div>
                            </div>
                         
 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="related-product pb-115">
            <div class="container">
                <div class="section-title mb-45 text-center">
                    <h2>De la même catégorie</h2>
                </div>
                <div class="related-product-active">
                   @foreach($sameCatego as $ele )

                        <div class="product-plr-1">
                            <div class="single-product-wrap">
                                <div class="product-img product-img-zoom mb-15">
                                    <a href="{{ route('article',$ele->slug) }}">
                                        <img src="{{ asset($ele->img) }}" alt="">
                                    </a>
                                    <div class="product-action-2 tooltip-style-2">
                                        <button title="Wishlist"><i class="icon-heart"></i></button>
                                        <button title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen icons"></i></button>
                                        <button title="Compare"><i class="icon-refresh"></i></button>
                                    </div>
                                </div>
                                <div class="product-content-wrap-2 text-center">
                                    <div class="product-rating-wrap">
                                        <div class="product-rating">
                                           @php $val  = rand(1,5) @endphp
                                            @for($i=1; $i<=5; $i++)
                                                @if($i<=$val)
                                                    <i class="icon_star "></i>
                                                @else
                                                    <i class="icon_star gray"></i>
                                                @endif
                                            @endfor
                                        </div>
                                        <span>({{ $val }})</span>
                                    </div>
                                    <h3><a href="#"></a></h3>
                                    <div class="product-price-2">
                                        <span>{{ formatPrice($ele->prix).' '.getDeviceSymbole() }} </span>
                                    </div>
                                </div>
                                <div class="product-content-wrap-2 product-content-position text-center">
                                    <div class="product-rating-wrap">
                                        <div class="product-rating">
                                           
                                            @for($i=1; $i<=5; $i++)
                                                @if($i<=$val)
                                                    <i class="icon_star "></i>
                                                @else
                                                    <i class="icon_star gray"></i>
                                                @endif
                                            @endfor
                                        </div>
                                        <span>({{ $val }})</span>
                                    </div>
                                    <h3><a href="{{ route('article',$ele->slug) }}">{{ $ele->nom }}</a></h3>
                                    <div class="product-price-2">
                                        <span></span>
                                    </div>
                                    <div class="pro-add-to-cart">
                                                    <form  action="{{ route('article',$ele->slug) }}" 
                                                            class="pro-add-to-cart">
                                                        {{-- <input type="hidden" name="slug" value="{{ $product->slug }}"> --}}
                                                        <button type="submit" title="Add to Cart">
                                                            Voir l'article
                                                        </button>
                                                    </form >
                                        {{-- <button title="Voir l'article">Ajouter au panier</button> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
@endsection