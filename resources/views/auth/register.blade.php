@extends('auth.app')

@section('title', 'Register')

@section('content')
<style>
    @media only screen and (max-width: 600px) {
        .vh-100 {
            height: auto !important;
        }
    }
</style>

<section class="vh-100">
    <div class="container-fluid h-custom">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="row d-flex justify-content-center align-items-center h-100 mx-2 mx-md-5 py-4">
                <div class="col-md-6">
                    <img src="{{ asset('assets/logo/logo.png') }}" class="img-fluid" alt="Radiant Logo">
                </div>
                <div class="col-md-6">
                    <div class="row mt-2 mt-md-5">
                        <h1 class="text-white">@yield('title')</h1>
                        <div class="col-md-6">
                            <!-- Name input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="name">Name</label>
                                <input type="text" id="name" name="name"
                                    class="form-control form-control-lg @error('name') is-invalid @enderror"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus
                                    placeholder="Enter a valid Name" />
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="email">Email Address</label>
                                <input type="email" id="email" name="email"
                                    class="form-control form-control-lg @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}" required autocomplete="email"
                                    placeholder="Enter a valid Email Address" />
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <!-- Phone input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="phone">Phone Number</label>
                                <input type="tell" id="phone" name="phone"
                                    class="form-control form-control-lg @error('phone') is-invalid @enderror"
                                    value="{{ old('phone') }}" required autocomplete="phone"
                                    placeholder="Enter a valid Phone Number" />
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- Address input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="address">Address</label>
                                <input type="text" id="address" name="address"
                                    class="form-control form-control-lg @error('address') is-invalid @enderror"
                                    value="{{ old('address') }}" required autocomplete="address"
                                    placeholder="Enter a valid Address" />
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <!-- Password input -->
                            <div class="form-outline mb-3">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" id="password"
                                    class="form-control form-control-lg @error('password') is-invalid @enderror"
                                    name="password" required autocomplete="new-password" placeholder="Enter password" />
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- Password Confirmation input -->
                            <div class="form-outline mb-3">
                                <label class="form-label" for="password_confirmation">Confirm Password</label>
                                <input type="password" id="password_confirmation"
                                    class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror"
                                    name="password_confirmation" required placeholder="Confirm your password" />
                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary bg-blue btn-lg"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">Register</button>

                            <p class="small fw-bold mt-2 pt-1 mb-0 text-white">Already have an account? <a
                                    href="{{ route('login') }}" class="link-danger"
                                    style="color: #e80b8e!important; text-decoration: none;">Login</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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