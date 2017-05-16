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
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/initial.css">
    @yield('styles')

    <!-- JS -->
    <script src="/js/initial.js"></script>
</head>
<body>
<!--header-->
<div class="header">
    <div class="header-two navbar navbar-default">
        <div class="container">
            <div class="nav navbar-nav logo">
                <h1><a href="index.html">Modern <b>Shoppe</b><span class="tag">Everything for Kids world </span> </a></h1>
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
        <div class="footer-info">
            <div class="col-md-4 footer-grids">
                <h4 class="footer-logo"><a href="index.html">Modern <b>Shoppe</b> <span class="tag">Everything for Kids world </span> </a></h4>
                <p>© 2016 Modern Shoppe . All rights reserved | Design by <a href="http://w3layouts.com" target="_blank">W3layouts</a></p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

@yield('scripts')
<script src="/js/app.js"></script>
</body>
</html>
