{{-- Start Footer --}}
<footer>
    <div class="container">
        <div class="row py-5">
            <div class="col-md-4">
                <h3>Browse</h3>

                <ul>
                    <li>
                        <a href="{{ route('home') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('shop') }}"
                            class="nav-link {{ request()->is('shop') ? 'active' : '' }}">Collections</a>
                    </li>
                    <li>
                        <a href="{{ route('customize') }}"
                            class="nav-link {{ request()->is('customize') ? 'active' : '' }}">Customize</a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}"
                            class="nav-link {{ request()->is('about') ? 'active' : '' }}">About</a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}"
                            class="nav-link {{ request()->is('contact') ? 'active' : '' }}">Contact</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4">
                <h3>Contact</h3>

                <ul>
                    <li>
                        <a href="mailto:radiantserviceslb@gmail.com" class="nav-link" target="_blank">
                            <span><i class="fa-solid fa-envelope"></i></span>
                            radiantserviceslb@gmail.com</a>
                    </li>
                    <li>
                        <a href="tel:96179308778" class="nav-link" target="_blank">
                            <span><i class="fa-solid fa-phone"></i></span>
                            +96179308778</a>
                    </li>
                    <li>
                        <a href="https://wa.me/96179308778/?text=Hello!%20I%20would%20like%20to%20order."
                            class="nav-link" target="_blank">
                            <span><i class="fa-brands fa-whatsapp"></i></span>
                            Whatsapp</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4">
                <h3>Social Media</h3>

                <ul>
                    <li>
                        <a href="https://www.facebook.com/pod.radiant" class="nav-link" target="_blank">
                            <span><i class="fa-brands fa-facebook-f"></i></span>
                            Facebook</a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/radiant.pod" class="nav-link" target="_blank">
                            <span><i class="fa-brands fa-instagram"></i></span>
                            Instagram</a>
                    </li>
                    <li>
                        <a href="https://www.tiktok.com/@radiant.pod" class="nav-link" target="_blank">
                            <span><i class="fa-brands fa-tiktok"></i></span>
                            TikTok</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row" style="border-top: 1px white solid">
            <div class="col-md-12">
                <div class="inner-content">
                    <p class="text-white">Copyright &copy; {{ date('Y') }} <a href="https://yellowtech.dev"
                            target="_blank">YellowTech</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>
{{-- End Footer --}}