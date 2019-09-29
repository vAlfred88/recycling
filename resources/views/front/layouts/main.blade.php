<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport"
          content="minimum-scale=1.0, target-densitydpi=device-dpi, width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="HandheldFriendly" content="true">
    <meta name="MobileOptimized" content="320">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('partials.favicons')
    <title>Recycling – портал для участников рынка переработки вторсырья</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/adaptive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/v-adaptive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/hotfix.css') }}">
    @stack('css')
</head>
<body>
<div id="wrapper">
    <div id="main">
        @include('front.layouts.partials.header')

        <main class="main-page all-main-page">
            @yield('content')
            <div id="subfooter"></div>
        </main>

        @include('front.layouts.partials.footer')
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/front/app.js') }}"></script>

    @stack('scripts')
</div>
</body>
</html>
