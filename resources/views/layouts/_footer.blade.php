{{-- Start Footer --}}
<footer>
    <div class="container">
        <div class="row py-5">
            <div class="col-md-4">
                <h3>Browse</h3>

                <ul>
                    <li>
                        <a href="{{ route('home') }}" class="nav-link">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('shop') }}" class="nav-link">Collections</a>
                    </li>
                    <li>
                        <a href="{{ route('designs.new') }}" class="nav-link">Customize</a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}" class="nav-link">About</a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}" class="nav-link">Contact</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4">
                <h3>Contact</h3>

                <ul>
                    <li>
                        <a href="mailto:test@test.com" class="nav-link">
                            <span><i class="fa-solid fa-envelope"></i></span>
                            test@test.com</a>
                    </li>
                    <li>
                        <a href="tel:96170285659" class="nav-link">
                            <span><i class="fa-solid fa-phone"></i></span>
                            +96170285659</a>
                    </li>
                    <li>
                        <a href="#" class="nav-link">
                            <span><i class="fa-brands fa-whatsapp"></i></span>
                            Whatsapp</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4">
                <h3>Social Medias</h3>

                <ul>
                    <li>
                        <a href="#" class="nav-link">
                            <span><i class="fa-brands fa-facebook-f"></i></span>
                            Facebook</a>
                    </li>
                    <li>
                        <a href="#" class="nav-link">
                            <span><i class="fa-brands fa-instagram"></i></span>
                            Instagram</a>
                    </li>
                    <li>
                        <a href="#" class="nav-link">
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