@extends('admin.app')

@section('content')
<div class="container">
    <a href="{{ route('products') }}" class="btn text-secondary">
        <h3>
            < back</h3>
    </a>

    <div class="row mt-3">
        <div class="offset-md-2 col-md-8">
            <div class="card border">
                <div class="card-header bg-info">
                    <h2 class="font-weight-bolder text-center my-4">New Product</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('products.create') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="category_id" class="col-form-label">Category *</label>
                            <select class="custom-select" name="category_id" required>
                                <option value="">Choose a category</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}" {{old('category_id')==$category->id ? 'selected' :
                                    ''}} {{$category->name == "Others" ? 'selected' : ''}}>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-form-label">Name *</label>
                            <input class="form-control" name="name" required type="text" placeholder="Product"
                                value="{{old('name')}}">
                        </div>
                        <div class="form-group">
                            <label for="price" class="col-form-label">Price *</label>
                            <input class="form-control" name="price" required type="number" step="0.01"
                                value="{{old('price')}}">
                        </div>
                        <div class="form-group">
                            <label for="image_front" class="col-form-label">Image Front</label>
                            <input class="form-control image" name="image_front" type="file">
                        </div>
                        <div class="form-group">
                            <label for="image_back" class="col-form-label">Image Back</label>
                            <input class="form-control image" name="image_back" type="file">
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-form-label">Description</label>
                            <textarea name="description" class="form-control" rows="7">{{old('description')}}</textarea>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div class="mx-4 d-flex">
                                    <input class="form-check-input border" type="checkbox" name="can_customize"
                                        id="can_customize" {{ old('can_customize') ? 'checked' : '' }}>

                                    <label class="form-check-label mx-3" for="can_customize">
                                        {{ __('Can Customize') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mx-4 d-flex">
                                    <input class="form-check-input border" type="checkbox" name="best_seller"
                                        id="best_seller" {{ old('best_seller') ? 'checked' : '' }}>

                                    <label class="form-check-label mx-3" for="best_seller">
                                        {{ __('Best Seller') }}
                                    </label>
                                </div>
                            </div>
                        </div>


                        <div class="w-100 mt-5">
                            <button type="submit" class="btn btn-info w-100">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection