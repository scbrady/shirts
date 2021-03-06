<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <!-- Mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- CSS -->
    {{--<link href="https://fonts.googleapis.com/css?family=Passion+One" rel="stylesheet">--}}
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/initial.css">
    @yield('styles')

    <!-- JS -->
    <script src="/js/initial.js"></script>

    <!-- Favicon -->
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
</head>
<body>
<!--header-->
<div class="header">
    <div class="header-two navbar navbar-default">
        <div class="container">
            <div class="logo">
                <img src="/img/sdl.png" />
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>

<div class="single">
    <div class="container">
        @yield('content')
    </div>
</div>

<!--footer-->
<div class="footer">
    <div class="container">
        <div class="footer-content">
            <img class="footer-logo" src="/img/sdl.png" />
            <p>© 2017 Spark Deals. All rights reserved</p>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

@yield('scripts')
<script src="/js/app.js"></script>
</body>
</html>
