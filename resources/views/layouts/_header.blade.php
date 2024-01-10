{{-- Start Header --}}
<header class="">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('assets/logo/logo.png') }}" alt="Radiant Logo" class="logo-header">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('home') }}">Home
                        </a>
                    </li>
                    <li class="nav-item dropdown {{ request()->is('shop') ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Collections
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach (Helper::get_categories() as $category)
                            <a class="dropdown-item" href="/shop?category_id={{ $category->id }}">
                                {{ucwords($category->name)}}</a>
                            @endforeach
                        </div>
                    </li>
                    <li class="nav-item {{ request()->is('custom-design') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('designs.new') }}">Custom Design</a>
                    </li>
                    <li class="nav-item {{ request()->is('about') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('about') }}">About Us</a>
                    </li>
                    <li class="nav-item {{ request()->is('contact') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
{{-- End Header --}}