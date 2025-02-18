@extends('layouts.app')

@section('title', 'Shop')

@section('description', 'Explore Radiant collections. Elevate your wardrobe with stunning T-shirts, hoodies, and hats.
Or create your own...')

@section('keywords', 'Radiant, Radiant.pod, Radiant.pod lebanon, Radiant custom apparel Lebanon, High-quality print on
demand by Radiant, Radiant clothing customization in Lebanon, Design your own clothes with Radiant in Lebanon, Custom
apparel Lebanon, High-quality print on demand Lebanon,Custom clothing Lebanon, Clothing customization Lebanon, Design
your own clothes Lebanon, Apparel printing Lebanon, Custom wardrobe Lebanon, Print on demand services Lebanon, Customize
hoodies lebanon, customize
tshirts lebanon, customize hats lebanon')

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

<div class="products my-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="filters categories">
                    <ul class="p-0 m-0">
                        <li>
                            <a href="{{ route('shop') }}"
                                class="{{ !request()->query('category_id') ? 'color-pink' : ''}}">
                                All Products
                            </a>
                        </li>
                        @foreach (Helper::get_active_categories() as $category)
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
                            <a type="button" class="w-100 nav-link" data-toggle="modal"
                                data-target="#exampleModal{{$product->id}}">
                                <div class="product-item">
                                    <div class="w-100 d-flex justify-content-between">
                                        <span class="icon mx-4 mt-3 feature_box_col_one" style="color: #e80b8e"
                                            data-toggle="tooltip" data-placement="top"
                                            title="Product Quality Guaranteed and can be returned...">
                                            <i class="fa-solid fa-ranking-star"></i>
                                        </span>
                                        <span class="icon mx-4 mt-3 feature_box_col_three" style="color: #f3eb25;"
                                            data-toggle="tooltip" data-placement="top"
                                            title="Product Quality Guaranteed and can be returned...">
                                            <i class="fa-solid fa-rotate-left"></i>
                                        </span>
                                    </div>
                                    <img src="{{ asset($product->direction == 'front' ? $product->image_front : $product->image_back) }}"
                                        alt="Product Image">
                                    <div class="down-content">
                                        <h4 class="text-center">{{ ucwords($product->name) }}</h4>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <section class="modals">
                            <div class="modal fade" id="exampleModal{{$product->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="color-primary">{{ucwords($product->name)}}</h3>

                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body py-0 px-4">
                                            <div class="w-100 d-flex justify-content-between">
                                                <span class="icon mx-4 mt-3 feature_box_col_one" style="color: #e80b8e"
                                                    data-toggle="tooltip" data-placement="top"
                                                    title="Product Quality Guaranteed and can be returned...">
                                                    <i class="fa-solid fa-ranking-star"></i>
                                                </span>
                                                <span class="icon mx-4 mt-3 feature_box_col_three"
                                                    style="color: #f3eb25;" data-toggle="tooltip" data-placement="top"
                                                    title="Product Quality Guaranteed and can be returned...">
                                                    <i class="fa-solid fa-rotate-left"></i>
                                                </span>
                                            </div>
                                            <div id="productImageCarousel{{$product->id}}" class="carousel slide"
                                                data-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active" style="justify-content: center;">
                                                        <img src="{{ asset($product->direction == 'front' ? $product->image_front : $product->image_back) }}"
                                                            class="img-modal rounded" alt="Product Front Image">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="{{ asset($product->direction == 'front' ? $product->image_back : $product->image_front) }}"
                                                            class="img-modal" alt="Product Back Image">
                                                    </div>
                                                </div>
                                                <a class="carousel-control-prev"
                                                    href="#productImageCarousel{{$product->id}}" role="button"
                                                    data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next"
                                                    href="#productImageCarousel{{$product->id}}" role="button"
                                                    data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>

                                            <div class="w-50 my-3 mx-auto">
                                                <div class="d-flex justify-content-between">
                                                    <div class="text-success">${{ number_format($product->price, 2) }}
                                                    </div>
                                                    <div class="text-danger" style="text-decoration: line-through;">${{
                                                        number_format(($product->price +
                                                        $product->price * 0.2), 2) }}</div>
                                                </div>

                                                @if($product->description)
                                                <p class="my-3 text-center">
                                                    {{$product->description}}
                                                </p>
                                                @endif

                                                <form action="#" method="post" enctype="multipart/form-data"
                                                    class="w-100 my-2">
                                                    <div class="w-md-100 d-flex justify-content-center">
                                                        <input type="number" name="quantity" id="quantity"
                                                            class="form-control custom-field mx-1" value="1" step="1">
                                                        <select name="size" id="size"
                                                            class="form-select custom-field mx-1">
                                                            @foreach (Helper::get_sizes() as $size)
                                                            <option value="{{ $size }}" {{ $size=='M' ? 'selected' : ''
                                                                }}>{{ $size }}</option>
                                                            @endforeach
                                                        </select>

                                                        <button type="button"
                                                            onclick="addToCart({{$product->id}}, this.form)"
                                                            class="btn bg-blue mx-2 rounded d-flex align-items-center">
                                                            <span class="fa fa-plus mr-1"></span>
                                                            Cart
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
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


<script>
    function addToCart(productId, form) {
        var quantity = parseInt(form.querySelector('#quantity').value) || 1;
        var size = form.querySelector('#size').value || 'M';

        try {
            var cart = JSON.parse(getCookie('cart'));
        } catch (error) {
            var cart = {};
        }

        if (cart[productId]) {
            cart[productId].quantity += quantity;
        } else {
            cart[productId] = {
                quantity: quantity,
                size: size,
            };
        }

        document.cookie = 'cart=' + JSON.stringify(cart) + ';path=/';

        var currentCount = parseInt(document.getElementById('cartCount').innerText) || 0;
        var newCount = currentCount + 1;
        document.getElementById('cartCount').innerText = newCount;

        alert('Item added to cart!');
    }

    function getCookie(name) {
        var match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
        if (match) return match[2];
    }
</script>
@endsection