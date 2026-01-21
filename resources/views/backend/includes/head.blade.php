<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ appName() }} | @yield('title', appName())</title>
    <meta name="description" content="@yield('meta_description', appName())">
    <meta name="keywords" content="@yield('meta_keywords', appName())">
    <meta name="author" content="@yield('meta_author', appName())">
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
    <meta name="format-detection" content="telephone=no">
    <meta name="format-detection" content="email=no">
    <meta name="theme-color" content="#ffffff">

    <!-- Language -->
    <meta http-equiv="content-language" content="en-US" />

    <!-- Geo-location -->
    <meta name="geo.region" content="US" />
    <meta name="geo.placename" content="United States" />
    <meta name="geo.position" content="Latitude;Longitude" />
    <meta name="ICBM" content="Latitude, Longitude" />

    <!-- Open Graph / Facebook -->
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="@yield('title', appName())" />
    <meta property="og:url" content="{{ env('APP_URL') }}" />
    <meta property="og:site_name" content="{{ appName() }}" />
    <meta property="og:description" content="@yield('meta_description', appName())" />
    <meta property="og:image" content="{{ asset('images') }}/Beesist-Logo.png" />

    <!-- Twitter -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="@yield('title', appName())" />
    <meta name="twitter:description" content="@yield('meta_description', appName())" />
    <meta name="twitter:image" content="{{ asset('images') }}/Beesist-Logo.png" />

    <!-- Schema.org Markup -->
    <meta itemprop="name" content="@yield('title', appName())">
    <meta itemprop="description" content="@yield('meta_description', appName())">
    <meta itemprop="image" content="{{ asset('images') }}/Beesist-Logo.png">

    <!-- Additional Meta Tags -->
    <meta name="rating" content="General">
    <meta name="revisit-after" content="7 days">
    <meta name="robots" content="index,follow">
    <meta name="referrer" content="no-referrer-when-downgrade">

    <!-- Dublin Core Meta Tags -->
    <meta name="DC.title" content="@yield('title', appName())">
    <meta name="DC.subject" content="@yield('meta_keywords', appName())">
    <meta name="DC.description" content="@yield('meta_description', appName())">
    <meta name="DC.creator" content="@yield('meta_author', appName())">

    <!-- Mobile Specific Meta -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Apple Touch Icon (Standard) -->
    <link rel="apple-touch-icon" href="{{ asset('images/beesist-icon.png') }}">

    <!-- Apple Touch Icon (Retina) -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/beesist-icon.png') }}">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ env('APP_URL') }}" />


