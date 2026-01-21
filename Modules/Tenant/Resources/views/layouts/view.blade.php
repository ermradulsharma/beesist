<?php $t = time(); ?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    @include('backend.includes.head')
    @stack('before-styles')
    <link href="{{ mix('css/backend.css') }}" rel="stylesheet">
    @livewireStyles
    <link href="https://fonts.googleapis.com/css?family=Beth+Ellen|Noto+Sans+SC:500&display=swap&subset=chinese-simplified,vietnamese" rel="stylesheet">
    <style>
        @font-face {
            font-family: Kai;
            src: url('{{ base_path() . ' /public/' }}css/wts11.ttf') format('truetype');
        }

        body {
            margin: 0cm 1cm 1.2cm 1cm;
            font-family: Arial, sans-serif;
            font-size: 13px !important;
            line-height: 18px
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            display: block
        }

        h3 {
            margin-top: 20px;
            color: #ec1f27;
            font-size: 22px
        }

        h4 {
            font-size: 18px
        }

        h4,
        h5 {
            color: #000
        }

        h5 {
            font-size: 16px
        }

        a,
        label {
            font-size: inherit
        }

        ol,
        ul {
            padding-left: 20px
        }

        .ol OL {
            counter-reset: item;
            padding-left: 0px
        }

        .ol LI {
            position: relative;
            line-height: 16px;
            display: block;
            margin: 7px 0;
            padding-left: 25px;
            text-align: justify;
        }

        .ol LI ol li {
            padding-left: 40px;
        }

        .ol LI:before {
            content: counters(item, ".") ". ";
            padding-right: 10px;
            left: 0;
            position: absolute;
            counter-increment: item;
            font-weight: 600;
            font-size: 13px
        }

        .no-ol li {
            position: static;
            margin: 0;
            padding-left: 0;
            text-align: justify;
        }

        ul.no-ol li:before {
            display: none
        }

        .no-ol.lease_terms {
            list-style: circle !important;
            list-style-position: inside !important
        }

        .no-ol.lease_terms LI {
            display: block !important
        }

        small {
            color: #999;
            font-size: 11px
        }

        table tbody tr td {
            color: #000;
            font-size: 14px;
            padding: 5px !important
        }

        table tbody tr:nth-child(2n+2) {
            background: rgba(0, 0, 0, .02)
        }

        table tbody tr {
            background: rgba(0, 0, 0, .04)
        }

        .signtyped {
            font-family: 'Beth Ellen', 'SimHei', sans-serif, cursive;
            font-weight: 500;
            font-size: 16px;
            letter-spacing: 1px;
            box-sizing: border-box;
            text-align: center
        }

        .sign-pad.signtyped,
        .sign-pad.signtyped img {
            width: 150px;
            height: 65px
        }

        .sign-pad.signtyped {
            margin: 10px 0;
            border: 0;
            padding: 0;
            color: #000aff;
        }

        .sign-pad.signtyped img {
            display: block;
            width: 150px;
            height: 65px;
        }

        .typedsign {
            text-align: left
        }

        .form-row-group-border {
            border: 1px dashed #666;
            padding: 20px
        }

        div.breakNow {
            page-break-inside: avoid;
            page-break-after: always
        }

        p {
            margin: 0 0 5px;
            text-align: justify;
        }

        .color-red {
            color: #e32124
        }

        @page {
            margin: 94px 0 0px 0;
        }

        header {
            position: fixed;
            top: -64px;
            left: 1cm;
            right: 1cm;
            height: 54px;
        }

        .pdf-heading {
            margin-bottom: 15px;
            text-align: center
        }
    </style>
    @stack('after-styles')
</head>

<body>
    <header>
        <img src="{{ asset('images/Bolld-pdf-header.png') }}" style="width:100%; height:auto" />
    </header>
    @yield('content')

    @stack('before-scripts')
    <script src="{{ mix('js/manifest.js') }}"></script>
    <script src="{{ mix('js/vendor.js') }}"></script>
    <script src="{{ mix('js/backend.js') }}"></script>
    @livewireScripts
    @stack('after-scripts')
</body>

</html>
