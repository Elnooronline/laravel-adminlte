<!DOCTYPE html>
<html dir="{{ config('adminlte.appearence.dir') }}">
<head>
    @include('adminlte::layout.assets.head')

    <!-- iCheck -->
    <link rel="stylesheet" href="vendor/adminlte/plugins/iCheck/square/blue.css">
</head>
<body class="hold-transition register-page">
    @yield('content')
    @include('adminlte::layout.assets.footer')
    <!-- iCheck -->
    <script src="/vendor/adminlte/plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' /* optional */
        });
      });
</script>
</body>
</html>
