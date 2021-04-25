<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="{{Str::replaceLast(',', '', $theme_options['favicon'] ?? '')}}"/>
    <meta name="author" content="ThemeStarz">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="google-site-verification" content="FmPO275g37H5kixUCgMLJmeKmuYpk-ZX5SXaa6iFhGU" />
    @include('seo_manager.seo_frontend_component')
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;1,300;1,400;1,500&display=swap" rel="stylesheet">
    @include('customer.partials.css')
    <script id='NAPhoneMobileCRM-widget-script' src='https://cdn.na.com.vn/scripts/NAPhoneCRM.js?business_id=6f83c5e589f646b282f19f25906c93fb' type='text/javascript' charset='UTF-8' async></script>
</head>
