@extends('auth.app')

@section('title')
Profile
@endsection

@section('content')
<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100 mx-2 mx-md-5">
            <div class="col-md-6 my-auto">
                <img src="{{ asset('assets/logo/logo.png') }}" class="img-fluid" alt="Radiant Logo">
            </div>
            <div class="col-md-6">
                <form method="POST" action="{{ route('profile.save') }}" class="login-form my-3">
                    @csrf

                    <div class="login-form-body bg-white px-5 py-4 rounded">
                        <h2 class="text-center">Profile</h2>

                        @include('admin._flash')

                        <div class="form-gp mb-3">
                            <label for="name">Name *</label>
                            <input type="text" id="name" name="name" value="{{auth()->user()->name}}" required
                                autocomplete="name" class="form-control">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-gp mb-3">
                            <label for="phone">Phone Number *</label>
                            <input type="phone" id="phone" name="phone" value="{{auth()->user()->phone}}"
                                autocomplete="phone" required class="form-control">
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-gp mb-3">
                            <label for="address">Address *</label>
                            <input type="text" id="address" name="address" value="{{auth()->user()->address}}" required
                                autocomplete="address" class="form-control">
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="submit-btn-area w-100">
                            <button id="form_submit" type="submit" class="btn btn-primary w-100">Update</button>
                        </div>
                        <div class="form-footer text-center mt-5">
                            <p class="text-muted">Change pasword?<a href="{{ route('password_edit') }}"
                                    class="text-decoration-none mx-1">Click here</a>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="d-flex flex-column flex-md-row text-center justify-content-center py-4 px-4 px-xl-5 bg-blue">
        <!-- Copyright -->
        <div class="text-white mb-3 mb-md-0">
            Copyright © 2024 <a href="https://yellowtech.dev"
                style="color: #f3eb25; text-decoration: none">YellowTech</a>
        </div>
        <!-- Copyright -->
    </div>
</section>
@endsection