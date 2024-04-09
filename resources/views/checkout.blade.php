@extends('layouts.app')

@section('title', 'Checkout')

@section('content')

<link rel="stylesheet" href="{{ asset('assets/css/cart.css') }}">

<!-- Page Content -->
<div class="page-heading products-heading header-text">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-content">
                    <h4>Checkout your Order</h4>
                    <h2>Checkout</h2>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin._flash')

{{-- Cart --}}
<div class="container my-5">
    <form action="{{ route('checkout.order') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row align-items-center">
            <div class="col-md-8 p-md-4 mb-auto items">
                <h2 class="mb-5 text-center">Items</h2>
                @forelse ($cart_items as $productID => $cart_item)
                <div class="cartItem row align-items-start">
                    @php
                    $product = Helper::get_product($productID);
                    @endphp

                    <div class="col-2 my-auto">
                        <img class="w-100 cart_image rounded" src="{{ asset($product->image_front) }}" alt="Image">
                    </div>
                    <div class="col-2 my-auto">
                        <h6>{{ ucwords($product->name) }}</h6>
                    </div>
                    <div class="col-3 my-auto text-center">
                        @if ( isset($cart_item['designId']) )
                        Customized
                        @else
                        Standard
                        @endif
                    </div>
                    <div class="col-1 my-auto">
                        {{ ucwords($cart_item['size']) }}
                    </div>
                    <div class="col-2 my-auto">
                        <span id="cartItemQuantity">{{ $cart_item['quantity'] }}</span> pc(s)
                    </div>
                    <div class="col-2 my-auto">
                        <span id="cartItem{{ $productID }}Price">
                            ${{ number_format($product->price *
                            $cart_item['quantity'], 2) }}
                        </span>
                    </div>
                </div>
                <hr>
                @empty
                <div class="my-3">No Items Yet</div>
                @endforelse
                <div class="row my-3 text-center">
                    <div class="offset-md-6 col-6 col-md-3">
                        Sub Total:
                    </div>
                    <div class="col-6 col-md-3">
                        $<span id="subtotal">{{ number_format($sub_total, 2) }}</span>
                    </div>
                </div>
                <div class="row my-3 text-center">
                    <div class="offset-md-6 col-6 col-md-3">
                        Promo:
                    </div>
                    <div class="col-6 col-md-3">
                        <input type="text" name="promo" id="promo" style="width: 125px; height: 35px"><a id="apply"
                            class="text-info size-2 mx-3">Apply</a>
                        <span id="promoValue"></span>
                    </div>
                </div>
                <div class="row my-3 text-center">
                    <div class="offset-md-6 col-6 col-md-3">
                        Shipping:
                    </div>
                    <div class="col-6 col-md-3">
                        $<span id="shipping">{{ number_format($shipping, 2) }}</span>
                    </div>
                </div>
                <div class="row my-3 text-center">
                    <div class="offset-md-6 col-6 col-md-3">
                        Total:
                    </div>
                    <div class="col-6 col-md-3">
                        $<span id="total">{{ number_format($total, 2) }}</span>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-info w-100 btn-rounded"
                        style="background-color: #20ace1;">Order</button>
                </div>
                <br><br>
            </div>
            <div class="col-md-4 p-md-4 mb-auto user">
                <h2 class="mb-5 text-center">User Information</h2>
                <div class="card p-2">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name">Name *: </label>
                            <input type="text" name="name" id="name" value="{{ ucwords(auth()->user()->name) }}"
                                class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="email">Email *: </label>
                            <input type="email" name="email" id="email" value="{{ auth()->user()->email }}"
                                class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone">Phone Number *: </label>
                            <input type="tel" name="phone" id="phone" value="{{ auth()->user()->phone }}"
                                class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="address">Address *: </label>
                            <input type="text" name="address" id="address" value="{{ auth()->user()->address }}"
                                class="form-control" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#apply').click(function () {
            const promoCode = $('#promo').val();
            
            $.ajax({
                method: 'POST',
                url: '{{ route("check_promo") }}',
                data: { promo: promoCode,_token: '{{ csrf_token() }}' },
                success: function (response) {
                    if (response.exists) {
                        let promoValue = response.value;
                        const subtotal = parseFloat($('#subtotal').text());
                        const shipping = parseFloat($('#shipping').text());
                        const total = calculateNewTotal(subtotal, promoValue, shipping);

                        $('#promo').hide();
                        $('#apply').hide();
                        $('.promo-value').show();
                        promoValue *= 100 ;
                        $('#promoValue').text(promoValue.toString() + "%");
                        
                        $('#total').text(total);
                    } else {
                        alert('Invalid promo code.');
                    }
                },
                error: function (error) {
                    console.error(error);
                }
            });
        });

        function calculateNewTotal(subtotal, promoValue, shipping) {
            const newTotal = subtotal - (subtotal * promoValue) + shipping;
            return newTotal;
        }
    });
</script>

@endsection