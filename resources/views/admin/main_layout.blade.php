<!DOCTYPE html>
<html>
    @include('admin.partials.head')
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
<div class="wrapper">
    @include('admin.partials.nav')
    @include('admin.partials.sidebar')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
    @yield('content')
    </div>
    </section>
    <!-- /.content -->
  </div>
    @include('admin.partials.footer')
</div>
<!-- ./wrapper -->
@include('admin.partials.scripts')
<script>
    @stack('internal_js')
</script>


</body>
</html>
