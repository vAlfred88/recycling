<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport"
          content="minimum-scale=1.0, target-densitydpi=device-dpi, width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="HandheldFriendly" content="true">
    <meta name="MobileOptimized" content="320">
    <title>@stack('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/adaptive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/v-adaptive.css')}}">

</head>
<body>

<div class="log-reg-wrapper tb">
    @yield('content')
</div>

<script src="{{asset('js/jquery-1.12.1.js')}}"></script>
<script src="{{asset('js/jquery.jscrollpane.js')}}"></script>
<script src="{{asset('js/jquery.mousewheel.js')}}"></script>
<script src="{{asset('js/slick.js')}}"></script>
<script src="{{asset('js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('js/jquery.arcticmodal.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>

</body>
</html>
