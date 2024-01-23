@extends('layouts.app')

@section('title', 'Home')

@section('description', 'Elevate your style with Radiant. Unleash your creativity and make a statement. Your fashion
journey starts here.')

@section('keywords', 'premium apparel, fashion, style, custom design, T-shirts, hoodies, pants, hats, Radiant')

@section('content')
<!-- Banner Starts Here -->
<div class="banner header-text">
    <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
            <div class="row">
                <div class="col-md-6">
                    <div class="text-content">
                        <h2>Cozy Comfort</h2>
                        <h4>Explore Our Latest Hoodie Collection</h4>
                    </div>
                </div>
                <div class="offset-md-1 col-md-4">
                    <img src="{{ asset('assets/images/hoodies.png') }}" alt="Hoodies">
                </div>
            </div>
        </div>
        <div class="banner-item-02">
            <div class="row">
                <div class="col-md-6">
                    <div class="text-content">
                        <h2>Classic Style</h2>
                        <h4>Discover New Shirts for Every Occasion</h4>
                    </div>
                </div>
                <div class="offset-md-1 col-md-4">
                    <img src="{{ asset('assets/images/shirts.png') }}" alt="Shirts">
                </div>
            </div>
        </div>
        <div class="banner-item-03">
            <div class="row">
                <div class="col-md-6">
                    <div class="text-content">
                        <h2>Elevate Your Look</h2>
                        <h4>Shop Trendy Pants for Every Style</h4>
                    </div>
                </div>
                <div class="offset-md-1 col-md-4">
                    <img src="{{ asset('assets/images/pants.png') }}" alt="Pants">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner Ends Here -->

<div class="latest-products">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Latest Products</h2>
                    <a href="{{ route('shop') }}">view all products <i class="fa fa-angle-right"></i></a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="product-item">
                    <a href="#"><img src="{{ asset('assets/images/product_01.jpg') }}" alt="Product Image"></a>
                    <div class="down-content">
                        <a href="#">
                            <h4>Tittle goes here</h4>
                        </a>
                        <h6>$25.75</h6>
                        <p>Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.</p>
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
            <div class="col-md-3">
                <div class="product-item">
                    <a href="#"><img src="{{ asset('assets/images/product_02.jpg') }}" alt="Product Image"></a>
                    <div class="down-content">
                        <a href="#">
                            <h4>Tittle goes here</h4>
                        </a>
                        <h6>$30.25</h6>
                        <p>Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.</p>
                        <ul class="stars">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                        </ul>
                        <span>Reviews (21)</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="product-item">
                    <a href="#"><img src="{{ asset('assets/images/product_03.jpg') }}" alt="Product Image"></a>
                    <div class="down-content">
                        <a href="#">
                            <h4>Tittle goes here</h4>
                        </a>
                        <h6>$20.45</h6>
                        <p>Sixteen Clothing is free CSS template provided by TemplateMo.</p>
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
            <div class="col-md-3">
                <div class="product-item">
                    <a href="#"><img src="{{ asset('assets/images/product_04.jpg') }}" alt="Product Image"></a>
                    <div class="down-content">
                        <a href="#">
                            <h4>Tittle goes here</h4>
                        </a>
                        <h6>$15.25</h6>
                        <p>Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.</p>
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
        </div>
    </div>
</div>

<div class="best-features">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>About Radiant</h2>
                </div>
            </div>
            <div class="col-md-8">
                <div class="left-content">
                    <h4>Looking for the best products?</h4>
                    <p><a rel="nofollow" href="https://templatemo.com/tm-546-sixteen-clothing" target="_parent">This
                            template</a> is free to use for your business websites. However, you have no permission
                        to redistribute the downloadable ZIP file on any template collection website. <a rel="nofollow"
                            href="https://templatemo.com/contact">Contact us</a> for more info.</p>
                    <ul class="featured-list">
                        <li><a href="#">Lorem ipsum dolor sit amet</a></li>
                        <li><a href="#">Consectetur an adipisicing elit</a></li>
                        <li><a href="#">It aquecorporis nulla aspernatur</a></li>
                        <li><a href="#">Corporis, omnis doloremque</a></li>
                        <li><a href="#">Non cum id reprehenderit</a></li>
                    </ul>
                    <a href="about.html" class="filled-button">Read More</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="right-image">
                    <img src="{{ asset('assets/images/img13.jpg') }}" alt="Feature Image">
                </div>
            </div>
        </div>
    </div>
</div>

{{-- start why choose us --}}
<div class="feat bg-gray pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="section-head col-sm-12">
                <h4><span>Why Choose</span> Radiant?</h4>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="item-why"> <span class="icon feature_box_col_one">
                        <i class="fa-solid fa-ranking-star"></i>
                    </span>
                    <h6>Quality Guaranteed</h6>
                    <p>
                        Our seasoned professionals excel in diverse technologies, ensuring cutting-edge solutions for
                        your unique requirements.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="item-why"> <span class="icon feature_box_col_two" style="color: #e80b8e;">
                        <i class="fa-solid fa-fingerprint"></i>
                    </span>
                    <h6>Customized Designs</h6>
                    <p>We don't believe in one-size-fits-all. Every project receives a bespoke touch, aligning perfectly
                        with your business goals.</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="item-why"> <span class="icon feature_box_col_three" style="color: #f3eb25;">
                        <i class="fa-solid fa-rotate-left"></i>
                    </span>
                    <h6>Return Policy</h6>
                    <p>Beyond delivery, our commitment extends to continuous support, updates, and maintenance, ensuring
                        your systems run seamlessly</p>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end why choose us --}}
@endsection