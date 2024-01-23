@extends('auth.app')

@section('title', 'Login')

@section('content')
<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100 mx-2 mx-md-5">
            <div class="col-md-6 my-auto">
                <img src="{{ asset('assets/logo/logo.png') }}" class="img-fluid" alt="Radiant Logo">
            </div>
            <div class="col-md-6">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <h1 class="text-white">@yield('title')</h1>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="email">Email address</label>
                        <input type="email" id="email" name="email"
                            class="form-control form-control-lg @error('email') is-invalid @enderror"
                            value="{{ old('email') }}" required autocomplete="email" autofocus
                            placeholder="Enter a valid email address" />
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" id="password"
                            class="form-control form-control-lg @error('password') is-invalid @enderror" name="password"
                            required autocomplete="current-password" placeholder="Enter password" />
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between align-items-center text-white">
                        <!-- Checkbox -->
                        <div class="form-check mb-0">
                            <input class="form-check-input me-2" type="checkbox" id="remember" name="remember" {{
                                old('remember') ? 'checked' : '' }} />
                            <label class="form-check-label" for="remember">
                                Remember me
                            </label>
                        </div>
                        @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-body">Forgot password?</a>
                        @endif
                    </div>

                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" class="btn btn-primary btn-lg"
                            style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>

                        <p class="small fw-bold mt-2 pt-1 mb-0 text-white">Don't have an account? <a
                                href="{{ route('register') }}" class="link-danger"
                                style="color: #e80b8e!important; text-decoration: none;">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="d-flex flex-column flex-md-row text-center justify-content-center py-4 px-4 px-xl-5 bg-primary">
        <!-- Copyright -->
        <div class="text-white mb-3 mb-md-0">
            Copyright © 2024 <a href="https://yellowtech.dev"
                style="color: #f3eb25; text-decoration: none">YellowTech</a>
        </div>
        <!-- Copyright -->
    </div>
</section>
@endsection