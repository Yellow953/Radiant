@extends('layouts.app')

@section('title', 'Return Policy')

@section('description', 'Elevate your style with Radiant. Unleash your creativity and make a statement. Your fashion
journey starts here.')

@section('keywords', 'Radiant, Radiant.pod, Radiant.pod lebanon, Radiant custom apparel Lebanon, High-quality print on
demand by Radiant, Radiant clothing customization in Lebanon, Design your own clothes with Radiant in Lebanon, Custom
apparel Lebanon, High-quality print on demand Lebanon,Custom clothing Lebanon, Clothing customization Lebanon, Design
your own clothes Lebanon, Apparel printing Lebanon, Custom wardrobe Lebanon, Print on demand services Lebanon')

@section('content')

<div class="header-overlay">
</div>

<div class="container">
    <h2 class="color-pink">Return Policy</h2>

    <div class="my-5">
        <p>
            Thank you for shopping at {{ route('home') }}. We want to make sure you are happy with your purchase. If for
            any reason you are not satisfied with your purchased product, we offer a 15-day return period.
        </p>

        <h3 class="mt-5 mb-3 color-primary">Return Period</h3>
        <p>You have the right to return your product within 15 days of receiving the product.</p>

        <h3 class="mt-5 mb-3 color-primary">Return Conditions</h3>
        <p>
            The product must be in unused and perfect condition.
            Original packaging and all accessories must be present.
            The return process must be requested via our customer service via email <a
                href="mailto:radiantserviceslb@gmail.com">radiantserviceslb@gmail.com</a>.
        </p>

        <h3 class="mt-5 mb-3 color-primary">Return Procedure</h3>
        <p>
            Contact our customer service via email to request the return.
            You will receive instructions and a return label from us.
            Pack the product securely in the original packaging.
            Send the package to the specified address.
            Refund: After receiving and inspecting the returned product, we will refund you the purchase price. The
            refund will be made to the original payment method.
        </p>

        <h3 class="mt-5 mb-3 color-primary">Please note:</h3>
        <p>
            The costs for return shipping are borne by the customer.
            We reserve the right to refuse returns that do not comply with the above conditions.
            Customer service: If you have any further questions or need support, please feel free to contact our
            customer
            service at <a href="mailto:radiantserviceslb@gmail.com">radiantserviceslb@gmail.com</a>.
        </p>

        <p>
            Thank you for your trust in {{ route('home') }}!
        </p>
    </div>
</div>

@endsection