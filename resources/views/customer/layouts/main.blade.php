<!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('customer.partials.head')
        <body>
        @include('customer.partials.header')
        <!-- Nội dung conter -->
         <div id="main-site">
            @yield('content')
         </div><!--  end -->
        <!-- chân trang -->
        @include('customer.partials.footer')
        @include('customer.partials.scripts')
    </body>
</html>
