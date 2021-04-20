<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
      {{-- csrf token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">
    <title>
      @yield('title')
    </title>
    @include('admin.partials.css')
  </head>
