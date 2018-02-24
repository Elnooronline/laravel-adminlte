<!DOCTYPE html>
<html dir="{{ config('adminlte.appearence.dir') }}">
<head>
    @include('adminlte::layout.assets.head')

    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/vendor/adminlte/dist/css/skins/skin-{{ $skin = config('adminlte.appearence.skin') }}.min.css">
    <link rel="stylesheet" href="/vendor/adminlte/custom/css/styles.css">
</head>
<body class="hold-transition skin-{{ $skin }} sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

    @include('adminlte::layout.header')

    @include('adminlte::layout.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>
    <!-- /.content-wrapper -->

    @include('adminlte::layout.footer')
</div>
<!-- ./wrapper -->

@include('adminlte::layout.assets.footer')
<!-- SlimScroll -->
<script src="{{ url('vendor/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ url('vendor/adminlte/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
@stack('scripts')
</body>
</html>
