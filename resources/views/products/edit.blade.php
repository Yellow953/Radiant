@extends('admin.app')

@section('content')
<div class="container">
    <section class="navbar-header mt-2">
        <div class="navigation">
            <a href="{{ url()->previous() }}" class="text-decoration-none  btn btn-secondary px-3 py-2 text-uppercase">
                <i class="fa fa-arrow-left"></i>
                back
            </a>

            <div class="breadcrumb">
                <span><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></span> /
                <span><a href="{{ route('products') }}">Products</a>
                </span> /
                <span>Edit</span>
            </div>
        </div>
    </section>

    <div class="row mt-3">
        <div class="offset-md-2 col-md-8">
            <div class="card border">
                <div class="card-header bg-info">
                    <h2 class="font-weight-bolder text-center my-4">Edit Product</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('products.update', $product->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="category_id" class="col-form-label">Category *</label>
                            <select class="custom-select" name="category_id" required>
                                <option value="">Choose a category</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}" {{$product->category_id==$category->id ? 'selected' :
                                    ''}} {{$category->name == "Others" ? 'selected' : ''}}>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-form-label">Name *</label>
                            <input class="form-control" name="name" required type="text" placeholder="Product"
                                value="{{$product->name}}">
                        </div>
                        <div class="form-group">
                            <label for="price" class="col-form-label">Price *</label>
                            <input class="form-control" name="price" required type="number" step="0.01"
                                value="{{$product->price}}">
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="direction" class="col-form-label">Direction</label>
                                    <select class="form-control" name="direction">
                                        <option value="front" {{ $product->direction == 'front' ? 'selected' : ''
                                            }}>Front
                                        </option>
                                        <option value="back" {{ $product->direction == 'back' ? 'selected' : '' }}>Back
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="image_front" class="col-form-label">Image Front</label>
                                    <input class="form-control image" name="image_front" type="file">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="image_back" class="col-form-label">Image Back</label>
                                    <input class="form-control image" name="image_back" type="file">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description" class="col-form-label">Description</label>
                            <textarea name="description" class="form-control"
                                rows="7">{{$product->description}}</textarea>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div class="mx-4 d-flex">
                                    <input class="form-check-input border" type="checkbox" name="can_customize"
                                        id="can_customize" {{ $product->can_customize ? 'checked' : '' }}>

                                    <label class="form-check-label mx-3" for="can_customize">
                                        {{ __('Can Customize') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mx-4 d-flex">
                                    <input class="form-check-input border" type="checkbox" name="bestseller"
                                        id="bestseller" {{ $product->bestseller ? 'checked' : '' }}>

                                    <label class="form-check-label mx-3" for="bestseller">
                                        {{ __('Bestseller') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="w-100 mt-5">
                            <button type="submit" class="btn btn-info w-100">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection