<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>403 Forbidden - Radiant</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/png" href="{{asset('assets/logo/logo.png')}}">

    <link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/font-awesome.min.css')}}">

    <!-- style css -->
    <link rel="stylesheet" href="{{asset('admin/css/typography.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/default-css.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/responsive.css')}}">
</head>

<body>
    <!-- error area start -->
    <div class="error-area py-auto text-center">
        <div class="container">
            <div class="error-content">
                <h2>403</h2>
                <p>Access to this resource on the server is denied</p>
                <a href="{{ route('home') }}">Back to Homepage</a>
            </div>
        </div>
    </div>
    <!-- error area end -->
</body>

</html>