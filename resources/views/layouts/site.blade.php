<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>@yield('title')</title>
    <meta name="keywords" content=@yield('keywords')>
    <meta name="description" content=@yield('description')>
    <meta name="author" content=@yield('author')>
    <!-- owl carousel style -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.2.4/assets/owl.carousel.min.css" />
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/site/css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/site/css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{ asset('assets') }}/site/css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="{{ asset('assets') }}/site/images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/site/css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet"
        href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/{{ asset('assets') }}/site/css/font-awesome.css">

    <!-- owl stylesheets -->
    <link rel="stylesheet" href="{{ asset('assets') }}/site/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/site/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">

    @yield("css")
    @yield("javascript")
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('home._header')
        @yield("content")
        @include('home._footer')
        @yield("footer")
</body>

</html>
