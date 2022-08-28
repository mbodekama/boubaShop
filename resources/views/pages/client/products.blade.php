@extends('../../layouts/partials_client/master')

@section('content')

        <div class="breadcrumb-area bg-gray">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <ul>
                        <li>
                            <a href="{{ route('products') }}">Acceuil</a>
                        </li>
                        <li class="active">Boutique - Liste des produits</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="shop-area pt-120 pb-120 section-padding-2">
            <div class="container-fluid">
                <div class="row flex-row-reverse">
                    <div class="col-lg-9">
                        <div class="shop-topbar-wrapper">




                            <div class="sidebar-widget mb-40">
                                <h4 class="sidebar-widget-title">Rechercher </h4>
                                <div class="sidebar-search">
                                    <form action="{{ route('products') }}" method="GET" class="sidebar-search-form" action="#">
                                        <input type="text" placeholder="Mot clé..." name="search">
                                        <button type="submit">
                                            <i class="icon-magnifier"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <form action="{{ route('products') }}" method="GET" class="product-sorting-wrapper">
                                <div class="product-shorting shorting-style">
                                    <label>Afficher :</label>
                                    <select name="perPage">
                                        <option value="16"> 16</option>
                                        <option value="32"> 32</option>
                                        <option value="50"> 50</option>
                                    </select>
                                </div>
                                <div class="product-show shorting-style">
                                    <label>Catégories :</label>
                                    <select name="categorie">
                                        <option value="0"> </option>
                                        @foreach($categos as $catego)
                                        <option value="{{ $catego->id }}"> {{ $catego->categorie }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="product-show shorting-style">
                                    <button type="submit" title="recherche filtré">Filtré les produits</button>

                                </div> 
                            </form>
                        </div>
 
                        <div class="shop-bottom-area">
                            <div class="tab-content jump">
                                <div id="shop-1" class="tab-pane active">
                                    <div class="row">
                                        @foreach ($products as $product)
                                        	
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                            <div class="single-product-wrap mb-35">
                                                <div class="product-img product-img-zoom mb-15">
                                                    <a href="{{ route('article',$product->slug) }}">

                                                        <img src="{{ asset($product->img) }}" alt="">
                                                    </a>
                                                    @if($product->fakePrice)
                                                    <span class="pro-badge left bg-red">
                                                        
                                                        {{ '- '.fakePrice($product->prix,$product->fakePrice).' %' }}
                                                        
                                                    </span>
                                                    @endif
                                                    <div class="product-action-2 tooltip-style-2">
                                                        <button title="Wishlist">
                                                            <i class="icon-heart"></i></button>
                                                       
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
                                                        <span>(2)</span>
                                                    </div>
                                                    <h3><a href="detail-product.php"> {{ $product->nom }} </a></h3>
                                                    <div class="product-price-2">
                                                        <span>
                                                            {{ formatPrice($product->prix).' '.getDeviceSymbole() }} 
                                                        </span>
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
                                                        <span>(2)</span>
                                                    </div>
                                                    <h3><a href="detail-product.php">{{ $product->nom }}</a></h3>
                                                    <div class="product-price-2">
                                                        <span>
                                                            {{ formatPrice($product->prix).' '.getDeviceSymbole() }} </span>
                                                    </div>
                                                    <form  action="{{ route('article',$product->slug) }}" 
                                                            class="pro-add-to-cart">
                                                        {{-- <input type="hidden" name="slug" value="{{ $product->slug }}"> --}}
                                                        <button type="submit" title="Add to Cart">
                                                            Voir l'article
                                                        </button>
                                                    </form >
                                                </div>
                                            </div>
                                        </div>
                                   @endforeach
                                        
                                    </div>
                                </div>
                             
                            </div>


                            {{ $products->links() }}
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="sidebar-wrapper sidebar-wrapper-mrg-right">

                            <div class="sidebar-widget shop-sidebar-border mb-35 pt-40">
                                <h4 class="sidebar-widget-title">Categories </h4>
                                <div class="shop-catigory">
                                    <ul>
                                        @foreach($categos as $catego)
                                        <li>
                                            <a href="{{ route('products',"categorie=".$catego->id) }}">{{ $catego->categorie }}</a>
                                        </li>
                                        @endforeach
                                         
                                    </ul>
                                </div>
                            </div>
                            <div class="sidebar-widget shop-sidebar-border mb-40 pt-40">
                                <h4 class="sidebar-widget-title">Filtrer par prix </h4>
                                <div class="price-filter">
                                    <span>Entre:  100.00 - 1.300.00  FCFA</span>
                                    <div id="slider-range"></div>
                                    <div class="price-slider-amount">
                                        <div class="label-input">
                                            <input type="text" id="amount" name="price" placeholder="Prix" />
                                        </div>
                                        <button type="button">Filtrer</button>
                                    </div>
                                </div>
                            </div>
                          
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection