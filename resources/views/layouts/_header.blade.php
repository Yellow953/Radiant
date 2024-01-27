{{-- Start Header --}}
<header>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('assets/logo/logo.png') }}" alt="Radiant Logo" class="logo-header">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"
                style="background: transparent; border: none;">
                <span class="navbar-toggler-icon" style="font-size:30px"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ route('home') }}">Home
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->is('shop') ? 'active' : '' }}" href="#"
                            id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            Collections
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach (Helper::get_categories() as $category)
                            <a class="dropdown-item text-center"
                                href="{{ route('shop', ['category_id' => $category->id]) }}">
                                {{ucwords($category->name)}}</a>
                            @endforeach
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('customize') ? 'active' : '' }}"
                            href="{{ route('customize') }}">Customize</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('about') ? 'active' : '' }}"
                            href="{{ route('about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}"
                            href="{{ route('contact') }}">
                            Contact
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('cart') ? 'active' : '' }}" href="{{ route('cart') }}">
                            Cart(<span id="cartCount">{{ Helper::cart_count() }}</span>)
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
{{-- End Header --}}