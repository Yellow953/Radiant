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

<div class="col-md-12 my-5">
    <h2 class="text-center text-md-start color-primary m-5">Top Selling Products</h2>

    <div class="best-sellers">
        <div class="owl-clients owl-carousel bg-white">
            @foreach ($best_sellers as $item)
            <a href="{{ route('shop') }}">
                <div class="client-item" style="width: 70%; margin-left: 15%;">
                    <img src="{{ asset($item->image_front) }}" alt="{{ ucwords($item->name) }}"
                        class="bestseller-image">

                    <h4 class="text-center color-pink">{{ ucwords($item->name) }}</h4>
                </div>
            </a>
            @endforeach
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