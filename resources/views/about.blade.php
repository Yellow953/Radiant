@extends('layouts.app')

@section('title', 'About Us')

@section('description', 'Discover Radiant where passion meets quality. Uncover our commitment to creativity and
individual expression in fashion.')

@section('keywords', 'about us, Radiant, fashion, quality, creativity, individual expression')

@section('content')
<!-- Page Content -->
<div class="page-heading about-heading header-text"
    style="background: url({{ asset('assets/images/image2.png') }}); background-size:cover;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-content">
                    <h4>About Us</h4>
                    <h2>Get To Know Us</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="best-features about-features">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2 class="color-primary">Who we are?</h2>
                </div>
            </div>

            <div class="col-md-6 my-auto">
                <div class="left-content">
                    <p>
                        At Radiant, we believe in the power of personal expression. Fashion is more than what you wear;
                        it's a statement, a canvas for your individuality. Established with a passion for quality and
                        creativity, we bring you a collection that blends comfort with style.
                    </p>
                    <ul class="social-icons">
                        <li><a href="https://www.facebook.com/pod.radiant" target="_blank"><i
                                    class="fa fa-facebook"></i></a></li>
                        <li><a href="https://www.instagram.com/radiant.pod" target="_blank"><i
                                    class="fa fa-instagram"></i></a></li>
                        <li><a href="https://www.tiktok.com/@radiant.pod" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-tiktok" viewBox="0 0 16 16">
                                    <path
                                        d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3z" />
                                </svg>
                            </a>
                        </li>
                        <li><a href="mailto:radiantserviceslb@gmail.com" target="_blank"><i
                                    class="fa fa-envelope"></i></a>
                        </li>
                        <li>
                            <a href="https://wa.me/96179308778/?text=Hello!%20I%20would%20like%20to%20order."
                                target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-whatsapp" viewBox="0 0 16 16">
                                    <path
                                        d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 my-auto">
                <div class="right-image">
                    <img src="{{ asset('assets/images/img3.jpg')}}" alt="Radiant About Us Image">
                </div>
            </div>
        </div>
    </div>
</div>


<div class="team-members">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2 class="color-primary">Our Team Members</h2>
                </div>
            </div>
            <div class="col-md-4">
                <div class="team-member">
                    <div class="thumb-container">
                        <img src="{{ asset('assets/images/team_01.jpg')}}" alt="Team 1">
                        <div class="hover-effect">
                            <div class="hover-content">
                                <ul class="social-icons">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="down-content">
                        <h4>Rami Khalaf</h4>
                        <span>Founder</span>
                        <p>Passionate leader and visionary, guiding our team towards success.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="team-member">
                    <div class="thumb-container">
                        <img src="{{ asset('assets/images/team_02.jpg')}}" alt="Team 2">
                        <div class="hover-effect">
                            <div class="hover-content">
                                <ul class="social-icons">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="down-content">
                        <h4>Sarah Abi-Nassif</h4>
                        <span>Product Expert</span>
                        <p>Expert in product development, ensuring top-notch quality and innovation.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="team-member">
                    <div class="thumb-container">
                        <img src="{{ asset('assets/images/team_03.jpg')}}" alt="Team 3">
                        <div class="hover-effect">
                            <div class="hover-content">
                                <ul class="social-icons">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="down-content">
                        <h4>Nadim Farhat</h4>
                        <span>Chief Marketing</span>
                        <p>Innovative marketer, driving brand awareness and market growth.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="happy-clients bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2 class="color-primary">Happy Partners</h2>
                </div>
            </div>
            <div class="col-md-12">
                <div class="owl-clients owl-carousel bg-white">
                    <div class="client-item">
                        <img src="{{ asset('assets/images/yellowtech.png') }}" alt="Yellow Tech Logo">
                    </div>
                    <div class="client-item">
                        <img src="{{ asset('assets/images/physicstimeline.png') }}" alt="Physics Timeline Logo">
                    </div>
                    <div class="client-item">
                        <img src="{{ asset('assets/images/aloeveranaturale.png') }}" alt="Aloe Vera Naturale Logo">
                    </div>
                    <div class="client-item">
                        <img src="{{ asset('assets/images/radiant.png') }}" alt="Radiant Logo">
                    </div>
                    <div class="client-item">
                        <img src="{{ asset('assets/images/canada.png') }}" alt="Match Me With Canada Logo">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection