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
                    <h4>Hoodies, Shirts, Pants, ...</h4>
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
                            <a href="{{ route('shop') }}"
                                class="{{ !request()->query('category_id') ? 'color-pink' : ''}}">
                                All Products
                            </a>
                        </li>
                        @foreach (Helper::get_categories() as $category)
                        <li>
                            <a href="{{ route('shop', ['category_id' => $category->id]) }}"
                                class="{{ request()->query('category_id') == $category->id ? 'color-pink' : ''}}">
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
                        @forelse ($products as $product)
                        <div class="col-md-3 all des">
                            <div class="product-item">
                                <a href="#"><img src="{{ asset('assets/images/product_01.jpg') }}"
                                        alt="Product Image"></a>
                                <div class="down-content">
                                    <h4 class="text-center">{{ ucwords($product->name) }}</h4>
                                    <p>{{ Str::limit($product->description, 100) }}</p>
                                    <div class="d-flex justify-content-between">
                                        <div class="text-success">${{ number_format($product->price, 2) }}</div>
                                        <div class="text-danger" style="text-decoration: line-through;">${{
                                            number_format(($product->price +
                                            $product->price * 0.2), 2) }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-md-12 all des">
                            <p class="text-center mb-5">No Available Products at this moment...</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
@endsection