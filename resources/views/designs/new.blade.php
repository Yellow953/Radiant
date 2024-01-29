@extends('layouts.app')

@section('title', 'Custom Design')

@section('description', 'Design your style, your way. Create custom T-shirts, hoodies, and hats effortlessly on our
page. Draw, import images, and more to craft a unique statement. Start now')

@section('keywords', 'custom design, design your own, personalized fashion, T-shirts, hoodies, pants, hats, draw, import
images, unique style, fashion statement, Radiant')

@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/5.3.1/fabric.min.js"
    integrity="sha512-CeIsOAsgJnmevfCi2C7Zsyy6bQKi43utIjdA87Q0ZY84oDqnI0uwfM9+bKiIkI75lUeI00WG/+uJzOmuHlesMA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Page Content -->
<div class="page-heading products-heading header-text">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-content">
                    <h4>Create your own clothes...</h4>
                    <h2>Custom Design</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="products mt-0 w-100" id="products">
                <h3 class="mb-3 mt-5">Products</h3>
                <div class="products-list d-flex d-md-block flex-row">
                    @forelse ($products as $product)
                    <div class="card m-1 product-custom-img" data-product-id="{{ $product->id }}"
                        data-direction="front">
                        <img src="{{ asset($product->image_front) }}" alt="{{ $product->name }}">
                    </div>
                    <div class="card m-1 product-custom-img" data-product-id="{{ $product->id }}" data-direction="back">
                        <img src="{{ asset($product->image_back) }}" alt="{{ $product->name }}">
                    </div>
                    @empty
                    No Products Yet...
                    @endforelse
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h3 class="mb-3 mt-5">Whiteboard: </h3>
            <div id="zoom-container" style="width: 550px; height: 550px; overflow: auto;">
                <div id="whiteboard-container" class="d-flex justify-content-center"
                    style="background: url({{ asset('assets/images/no_img.png')}}); background-position: center; background-size: contain; background-repeat: no-repeat;">
                    <canvas id="whiteboard" width="500" height="500"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <h3 class="mb-3 mt-5">Controls: </h3>
            <div
                class="controls d-flex flex-wrap flex-row flex-md-column align-items-center justify-content-between w-100">
                <input type="range" id="strokeWidth" min="1" max="20" value="5">

                <input type="color" id="colorPicker" value="#000000">

                <button id="resetButton" class="btn bg-blue">
                    <i class="fa-solid fa-rotate-right"></i>
                </button>

                <button id="deleteTool" class="btn bg-blue">
                    <i class="fa-solid fa-trash"></i>
                </button>

                <label class="btn bg-blue" id="eraserToggle">
                    <input type="checkbox" id="eraserCheckbox" style="display: none;">
                    <i class="fa-solid fa-eraser"></i>
                </label>

                <label class="btn bg-blue" for="imageUpload" id="imageUploadButton">
                    <input type="file" id="imageUpload" accept="image/*" style="display: none;">
                    <i class="fa-solid fa-image"></i>
                </label>

                <button id="penTool" class="btn bg-blue">
                    <i class="fa-solid fa-pen"></i>
                </button>

                <button id="imageTool" class="btn bg-blue">
                    <i class="fa-solid fa-arrow-pointer"></i>
                </button>

                <button id="textTool" class="btn bg-blue">
                    <i class="fa-solid fa-font"></i>
                </button>

                <button id="zoomIn" class="btn bg-blue">
                    <i class="fa-solid fa-magnifying-glass-plus"></i>
                </button>

                <button id="zoomOut" class="btn bg-blue">
                    <i class="fa-solid fa-magnifying-glass-minus"></i>
                </button>
            </div>
        </div>
        <div class="col-md-12">
            <div class="d-flex justify-content-md-end">
                <button id="saveButton" class="btn bg-blue">Save Design</button>
            </div>
        </div>
        <div class="col-md-12">
            @include('layouts._flash')
        </div>
    </div>

    <div class="container mb-5">
        <h3 class="my-4">My Designs</h3>
        <div class="row w-100 overflow-x-auto">
            @forelse (auth()->user()->designs as $design)
            <div class="col-md-3 card m-1 my-design" @if ($design->direction == 'front')
                style="background-image: url('{{ asset($design->product->image_front) }}');"
                @elseif($design->direction == 'back')
                style="background-image: url('{{ asset($design->product->image_back) }}');"
                @endif
                id="design-{{ $design->id }}">

                <img src="{{ asset($design->image_path) }}"
                    alt="{{ $design->product->name }} {{ ucwords($design->direction) }} Design">

                <div class="overlay-icons">
                    <button type="button" class="btn btn-info" data-toggle="modal"
                        data-target="#designModal{{ $design->id }}">
                        <i class="fa-solid fa-eye"></i>
                    </button>
                    <button class="btn btn-danger delete-design-button" onclick="deleteDesign('{{ $design->id }}')">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>

                <!-- Design Modal -->
                <div class="modal fade" id="designModal{{ $design->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="designModalLabel{{ $design->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="color-primary">{{ ucwords($design->product->name) }} - {{
                                    ucwords($design->direction) }}</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body py-0 px-4">
                                <div class="alert alert-warning fade show mt-4" role="alert">
                                    <div class="row">
                                        <div class="col-1 my-auto">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-exclamation-triangle-fill"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5m.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                                            </svg>
                                        </div>
                                        <div class="col-11 my-auto">
                                            Dont worry if the design isn't displayed exactly as you wanted, our
                                            designers will fix it
                                        </div>
                                    </div>
                                </div>
                                <div
                                    style="background-image: url('@if ($design->direction == 'front'){{ asset($design->product->image_front) }}@else{{ asset($design->product->image_back) }}@endif'); background-size:contain; background-repeat: no-repeat; background-position: center;">
                                    <img src="{{ asset($design->image_path) }}"
                                        alt="{{ $design->product->name }} {{ ucwords($design->direction) }} Design">
                                </div>

                                <div class="my-3 mx-auto">
                                    <div class="d-flex justify-content-between">
                                        <div class="text-success">${{ number_format($design->product->price, 2) }}
                                        </div>
                                        <div class="text-danger" style="text-decoration: line-through;">${{
                                            number_format(($design->product->price +
                                            $design->product->price * 0.2), 2) }}</div>
                                    </div>

                                    @if($design->product->description)
                                    <p class="my-3 text-center">
                                        {{$design->product->description}}
                                    </p>
                                    @endif

                                    <form action="#" method="post" enctype="multipart/form-data" class="w-100 my-2">
                                        <div class="w-md-100 d-flex justify-content-center">
                                            <input type="number" name="quantity" id="quantity"
                                                class="form-control custom-field mx-1" value="1" step="1">
                                            <select name="size" id="size" class="form-select custom-field mx-1">
                                                @foreach (Helper::get_sizes() as $size)
                                                <option value="{{ $size }}" {{ $size=='M' ? 'selected' : '' }}>{{ $size
                                                    }}</option>
                                                @endforeach
                                            </select>

                                            <button type="button"
                                                onclick="addToCart({{$design->product->id}}, {{ $design->id }}, this.form)"
                                                class="btn bg-blue mx-2 rounded d-flex align-items-center">
                                                <span class="fa fa-plus mr-1"></span>
                                                Cart
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="m-5">
                No Designs Yet
            </div>
            @endforelse
        </div>
    </div>
</div>

<script src="{{ asset('assets/js/custom-design.js') }}"></script>

<script>
    function deleteDesign(designId) {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
            if (confirm('Are you sure you want to delete this design?')) {
                const xhr = new XMLHttpRequest();
                xhr.open('GET', `/designs/${designId}/destroy`, true);
                xhr.setRequestHeader('Content-Type', 'application/json');
                xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
    
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4) {
                        if (xhr.status === 200) {
                            removeDesignFromUI(designId);
                            showAlert('success', 'Design deleted successfully!');
                        } else {
                            const response = JSON.parse(xhr.responseText);
                            showAlert('error', response.error.message);
                        }
                    }
                };
    
                xhr.send();
            }
        }
    
        function removeDesignFromUI(designId) {
            const designElement = document.getElementById(`design-${designId}`);
            
            if (designElement) {
                designElement.remove();
            }
        }

        function showAlert(type, message) {
            const alertContainer = document.getElementById('alert-container');
            const alertClass = (type === 'success') ? 'alert-success' : 'alert-danger';
    
            const alertElement = document.createElement('div');
            alertElement.className = `alert ${alertClass}`;
            alertElement.innerText = message;
    
            alertContainer.appendChild(alertElement);
    
            setTimeout(() => {
                alertElement.remove();
            }, 5000);
        }
</script>

<script>
    function addToCart(productId, designId, form) {
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
                designId: designId,
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