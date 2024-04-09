@extends('layouts.app')

@section('title', 'Contact Us')

@section('description', 'Connect with Radiant. Questions or ideas? Reach out through email or phone. We re here to make
your fashion experience seamless.')

@section('keywords', 'radiant.pod contact us, radiant.pod contact us lebanon, radiant.pod get in touch, Radiant,
Radiant.pod, Radiant.pod lebanon, Radiant custom apparel Lebanon, High-quality print on demand by Radiant, Radiant
clothing customization in Lebanon, Design your own clothes with Radiant in Lebanon, Custom apparel Lebanon, High-quality
print on demand Lebanon,Custom clothing Lebanon, Clothing customization Lebanon, Design your own clothes Lebanon,
Apparel printing Lebanon, Custom wardrobe Lebanon, Print on demand services Lebanon')

@section('content')
<!-- Page Content -->
<div class="page-heading contact-heading header-text"
    style="background: url({{ asset('assets/images/image2.png') }}); background-size:cover;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-content">
                    <h4>Contact Us</h4>
                    <h2>Get In Touch</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="find-us">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2 class="color-primary">Our Location on Maps</h2>
                </div>
            </div>
            <div class="col-md-8">
                <div id="map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3311.117241332163!2d35.582645!3d33.912382!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMzPCsDU0JzQ0LjYiTiAzNcKwMzQnNTcuNSJF!5e0!3m2!1sen!2sde!4v1706458937603!5m2!1sen!2sde"
                        width="100%" height="350" style="border:0;" allowfullscreen loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="col-md-4">
                <div class="left-content">
                    <h3 class="color-pink mb-4">Get In Touch</h3>
                    <p>
                        Have questions, ideas, or just want to say hello? We're all ears! Reach out to us through the
                        following channels:
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
                                    class="fa fa-envelope"></i></a></li>
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
        </div>
    </div>
</div>

<div class="send-message">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2 class="color-primary">Submit Your Idea</h2>
                </div>
            </div>
            <div class="col-md-8 mb-5">
                <div class="contact-form">
                    <form id="contact-form" action="{{ route('contact.submit') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <fieldset>
                                    <input name="name" type="text" class="form-control" id="name"
                                        placeholder="Full Name *" required>
                                </fieldset>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <fieldset>
                                    <input name="email" type="text" class="form-control" id="email"
                                        placeholder="E-Mail Address *" required>
                                </fieldset>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <fieldset>
                                    <input name="idea" type="text" class="form-control" id="idea" placeholder="Idea *"
                                        required>
                                </fieldset>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <fieldset>
                                    <label for="image">Image</label>
                                    <input name="image" type="file" class="form-control" id="image">
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="filled-button">Send Message</button>
                                </fieldset>
                            </div>
                        </div>

                        <div class="col-lg-12" id="success-message" style="display: none;">
                            <p class="text-success">Thank you for your submission! We will get back to you soon.</p>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <ul class="accordion">
                    <li>
                        <a class="color-pink" href="#">How to Submit a Design Idea for Review</a>
                        <div class="content">
                            <p>If you want to submit your design idea for review, visit our 'contact' page and complete
                                the form with your creative vision. Our team will thoroughly review your submission and
                                reach out if it aligns with our brand and values.</p>
                        </div>
                    </li>
                    <li>
                        <a class="color-pink" href="#">What Happens After I Submit My Design?</a>
                        <div class="content">
                            <p>Once you've submitted your design, our team will carefully review it. If your idea
                                complements our brand and style, we'll contact you to discuss the details and
                                potentially bring your design to life on our apparel.</p>
                        </div>
                    </li>
                    <li>
                        <a class="color-pink" href="#">Notification Process for Chosen Designs</a>
                        <div class="content">
                            <p>If your design is selected, we'll notify you through the contact information provided
                                during the submission. Keep an eye on your email and be prepared to collaborate with us
                                to turn your creative vision into reality!</p>
                        </div>
                    </li>
                    <li>
                        <a class="color-pink" href="#">Submitting Multiple Design Ideas</a>
                        <div class="content">
                            <p>Yes, you can submit multiple design ideas! We encourage you to share as many creative
                                concepts as you'd like. Each idea will undergo a thorough review, and if selected, we'll
                                collaborate with you to showcase your unique creativity on our apparel.</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#contact-form').submit(function (e) {
            e.preventDefault(); 
            // Perform AJAX request
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (response) {
                    $('#contact-form').hide();
                    $('#success-message').show();
                },
                error: function (error) {
                    console.error('Error submitting the form:', error);
                }
            });
        });
    });
</script>

@endsection