@extends('layouts.app')

@section('title', 'Privacy Policy')

@section('description', 'Radiant POD Privacy Policy')

@section('keywords', 'Radiant Privacy Policy, Radiant.pod Privacy Policy, Radiant.pod lebanon Privacy Policy')

@section('content')

<div class="header-overlay">
</div>

<div class="container">
    <h2 class="color-pink">Privacy Policy</h2>

    <div class="my-5">
        <p>Your privacy is important to us. It is Radiant.pod's policy to respect your privacy regarding any information
            we may collect from you across our website, <a href="{{ route('home') }}">{{ route('home') }}</a>, and other
            sites we own and operate.
        </p>

        <h3 class="mt-5 mb-3 color-primary">Information We Collect</h3>

        <p>We only ask for personal information when we truly need it to provide a service to you. We collect it by fair
            and lawful means, with your knowledge and consent. We also let you know why we’re collecting it and how it
            will be used.</p>

        <p>We collect information in the following ways:</p>

        <ol>
            <li>Information you provide directly: When you create an account, make a purchase, or contact us, you may
                provide personal information such as your name, email address, shipping address, and payment
                information.</li>
            <li>Automatically collected information: We may collect certain information automatically when you visit our
                website, including your IP address, browser type, device type, and browsing behavior.</li>
            <li>Cookies: We use cookies and similar tracking technologies to track activity on our website and store
                certain information. You can instruct your browser to refuse all cookies or to indicate when a cookie is
                being sent.</li>
        </ol>

        <h3 class="mt-5 mb-3 color-primary">How We Use Your Information</h3>

        <p>We use the information we collect for various purposes, including:</p>

        <ol>
            <li>Providing, maintaining, and improving our services.</li>
            <li>Communicating with you, including responding to your inquiries and providing customer support.</li>
            <li>Processing and fulfilling orders, including payment processing and shipping.</li>
            <li>Marketing and advertising our products and services.</li>
            <li>Complying with legal obligations.</li>
        </ol>

        <h3 class="mt-5 mb-3 color-primary">Information Sharing and Disclosure</h3>

        <p>We may share your personal information with third-party service providers who perform services on our behalf,
            such as payment processing, order fulfillment, and marketing. We may also share information in response to
            legal requests or to protect our rights, property, or safety.</p>

        <h3 class="mt-5 mb-3 color-primary">Security</h3>

        <p>We take reasonable measures to protect the confidentiality and security of your personal information.
            However, no method of transmission over the internet or electronic storage is completely secure, so we
            cannot guarantee absolute security.</p>

        <h3 class="mt-5 mb-3 color-primary">Changes to This Privacy Policy</h3>

        <p>We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new
            Privacy Policy on this page. You are advised to review this Privacy Policy periodically for any changes.</p>

        <h3 class="mt-5 mb-3 color-primary">Contact Us</h3>

        <p>If you have any questions or concerns about our Privacy Policy, please contact us at <a
                href="mailto:radiantserviceslb@gmail.com">radiantserviceslb@gmail.com</a>.</p>
    </div>
</div>

@endsection