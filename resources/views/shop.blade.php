@extends('layouts.app')

@section('title', 'Shop')

@section('description', 'Explore Radiant collections. Elevate your wardrobe with stunning T-shirts, hoodies, and hats.
Or create your own...')

@section('keywords', 'shop, categories, T-shirts, hoodies, pants, hats, fashion, style, Radiant')

@section('content')
<!-- Page Content -->
<div class="page-heading products-heading header-text">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-content">
                    <h4>Hoodies, Shirts, Pants, Hats, ...</h4>
                    <h2>Shop</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="products">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="filters categories">
                    <ul>
                        <li>
                            <a href="{{ route('shop') }}" class="{{ !request()->query('category_id') ? 'active' : ''}}">
                                All Products
                            </a>
                        </li>
                        @foreach (Helper::get_categories() as $category)
                        <li>
                            <a href="{{ route('shop', ['category_id' => $category->id]) }}"
                                class="{{ request()->query('category_id') == $category->id ? 'active' : ''}}">
                                {{ucwords($category->name)}}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-12">
                <div class="filters-content">
                    <div class="row grid">
                        <div class="col-lg-4 col-md-4 all des">
                            <div class="product-item">
                                <a href="#"><img src="{{ asset('assets/images/product_01.jpg') }}"
                                        alt="Product Image"></a>
                                <div class="down-content">
                                    <a href="#">
                                        <h4>Tittle goes here</h4>
                                    </a>
                                    <h6>${{ number_format(18.25, 2) }}</h6>
                                    <p>Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla
                                        aspernatur.</p>
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 all dev">
                            <div class="product-item">
                                <a href="#"><img src="{{ asset('assets/images/product_02.jpg') }}"
                                        alt="Product Image"></a>
                                <div class="down-content">
                                    <a href="#">
                                        <h4>Tittle goes here</h4>
                                    </a>
                                    <h6>$16.75</h6>
                                    <p>Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla
                                        aspernatur.</p>
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                    <span>Reviews (24)</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 all gra">
                            <div class="product-item">
                                <a href="#"><img src="{{ asset('assets/images/product_03.jpg') }}"
                                        alt="Product Image"></a>
                                <div class="down-content">
                                    <a href="#">
                                        <h4>Tittle goes here</h4>
                                    </a>
                                    <h6>$32.50</h6>
                                    <p>Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla
                                        aspernatur.</p>
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                    <span>Reviews (36)</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 all gra">
                            <div class="product-item">
                                <a href="#"><img src="{{ asset('assets/images/product_04.jpg') }}"
                                        alt="Product Image"></a>
                                <div class="down-content">
                                    <a href="#">
                                        <h4>Tittle goes here</h4>
                                    </a>
                                    <h6>$24.60</h6>
                                    <p>Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla
                                        aspernatur.</p>
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                    <span>Reviews (48)</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 all dev">
                            <div class="product-item">
                                <a href="#"><img src="{{ asset('assets/images/product_05.jpg') }}"
                                        alt="Product Image"></a>
                                <div class="down-content">
                                    <a href="#">
                                        <h4>Tittle goes here</h4>
                                    </a>
                                    <h6>$18.75</h6>
                                    <p>Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla
                                        aspernatur.</p>
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                    <span>Reviews (60)</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 all des">
                            <div class="product-item">
                                <a href="#"><img src="{{ asset('assets/images/product_06.jpg') }}"
                                        alt="Product Image"></a>
                                <div class="down-content">
                                    <a href="#">
                                        <h4>Tittle goes here</h4>
                                    </a>
                                    <h6>$12.50</h6>
                                    <p>Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla
                                        aspernatur.</p>
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                    <span>Reviews (72)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                {{-- {{ $products->links() }} --}}
            </div>
        </div>
    </div>
</div>
@endsection