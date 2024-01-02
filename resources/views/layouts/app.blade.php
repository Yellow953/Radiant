<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="http://localhost">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Font --}}
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">

    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('assets/logo/logo.ico') }}" type="image/x-icon">

    <title>Radiant | @yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">


    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('template/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('template/assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/templatemo-sixteen.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/owl.css') }}">

    {{-- Custom styles --}}
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
</head>

<body>
    <main>
        @include('layouts._preloader')

        @include('layouts._header')

        @yield('content')

        @include('layouts._footer')
    </main>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Additional Scripts -->
    <script src="{{ asset('template/assets/js/custom.js') }}"></script>
    <script src="{{ asset('template/assets/js/owl.js') }}"></script>
    <script src="{{ asset('template/assets/js/slick.js') }}"></script>
    <script src="{{ asset('template/assets/js/isotope.js') }}"></script>
    <script src="{{ asset('template/assets/js/accordions.js') }}"></script>

    <script language="text/Javascript">
        cleared[0] = cleared[1] = cleared[2] = 0;
        function clearField(t){
            if(! cleared[t.id]){
                cleared[t.id] = 1;
                t.value='';
                t.style.color='#fff';
            }
        }
    </script>
</body>