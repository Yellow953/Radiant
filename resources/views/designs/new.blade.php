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
        <div class="col-md-9">
            <h3 class="mb-3 mt-5">Whiteboard: </h3>
            <div id="zoom-container" style="width: 550px; height: 550px; overflow: auto;">
                <div id="whiteboard-container" class="d-flex justify-content-center"
                    style="background: url({{ asset('assets/images/white_hoodie_back.png')}}); background-position: center; background-size: contain; background-repeat: no-repeat;">
                    <canvas id="whiteboard" width="500" height="500"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <h3 class="mb-3 mt-5">Controls: </h3>
            <div class="controls"
                style="height: 80%; display: flex; flex-direction: column; align-items: center; justify-content: space-between;">
                <input type="range" id="strokeWidth" min="1" max="20" value="5">

                <input type="color" id="colorPicker" value="#000000">

                <button id="resetButton" class="btn btn-primary">
                    <i class="fa-solid fa-rotate-right"></i>
                </button>

                <button id="deleteTool" class="btn btn-primary">
                    <i class="fa-solid fa-trash"></i>
                </button>

                <label class="btn btn-primary" id="eraserToggle">
                    <input type="checkbox" id="eraserCheckbox" style="display: none;">
                    <i class="fa-solid fa-eraser"></i>
                </label>

                <label class="btn btn-primary" for="imageUpload" id="imageUploadButton">
                    <input type="file" id="imageUpload" accept="image/*" style="display: none;">
                    <i class="fa-solid fa-image"></i>
                </label>

                <button id="penTool" class="btn btn-primary">
                    <i class="fa-solid fa-pen"></i>
                </button>

                <button id="imageTool" class="btn btn-primary">
                    <i class="fa-solid fa-arrow-pointer"></i>
                </button>

                <button id="textTool" class="btn btn-primary">
                    <i class="fa-solid fa-font"></i>
                </button>

                <button id="zoomIn" class="btn btn-primary">
                    <i class="fa-solid fa-magnifying-glass-plus"></i>
                </button>

                <button id="zoomOut" class="btn btn-primary">
                    <i class="fa-solid fa-magnifying-glass-minus"></i>
                </button>
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <div class="products mt-0 w-100" id="products">
                <h4 class="my-3">Products</h4>
                <div class="row w-100 overflow-x-auto">
                    @forelse ($products as $product)
                    <div class="card m-1 product-custom-img" data-product-id="{{ $product->id }}"
                        data-direction="front">
                        <img src="{{ asset($product->image_front) }}" alt="">
                    </div>
                    <div class="card m-1 product-custom-img" data-product-id="{{ $product->id }}" data-direction="back">
                        <img src="{{ asset($product->image_back) }}" alt="">
                    </div>
                    @empty
                    No Products Yet...
                    @endforelse
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="d-flex justify-content-md-end">
                <button id="saveButton" class="btn btn-primary">Save Design</button>
            </div>
        </div>
        <div class="col-md-12">
            @include('layouts._flash')
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h3 class="my-4">My Designs</h3>
            <div class="row w-100 overflow-x-auto">
                @forelse (auth()->user()->designs as $design)
                <div class="card m-1 my-design" @if ($design->direction == 'front')
                    style="background-image: url('{{ asset($design->product->image_front) }}');"
                    @elseif($design->direction == 'back')
                    style="background-image: url('{{ asset($design->product->image_back) }}');"
                    @endif
                    id="design-{{ $design->id }}">
                    <img src="{{ asset($design->image_path) }}"
                        alt="{{ $design->product->name }} {{ ucwords($design->direction) }} Design">

                    <div class="overlay-icons">
                        <button class="btn btn-info" onclick="viewDesign('{{ asset($design->image_path) }}')">
                            <i class="fa-solid fa-eye"></i>
                        </button>
                        <button class="btn btn-danger delete-design-button" onclick="deleteDesign('{{ $design->id }}')">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </div>
                </div>
                @empty
                No Designs Yet
                @endforelse
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('assets/js/custom-design.js') }}"></script>

<script>
    function viewDesign(imagePath) {
    }

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

@endsection