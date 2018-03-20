<?php
/**
 * Auth     : Nguyễn Thành Đạt.
 * Email    : 'ntdat.tb@gmail.com'
 * Phone    : 0969.730.726
 * Website  : http://ariweb.net
 */
?>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{!! url('public/admin') !!}/plugins/images/favicon.png">
    <title>@yield('title')</title>
    <!-- Bootstrap Core CSS -->
    @yield('style')
    <script>
        var baseURL = "{!! url('/') !!}";
    </script>
</head>
<body class="fix-sidebar">
<!-- Preloader -->
<div class="preloader">
    <div class="cssload-speeding-wheel"></div>
</div>
<div id="wrapper">
    <!-- Top Navigation -->
@include('admin.common.nav_top')
<!-- End Top Navigation -->
    <!-- Left navbar-header -->
@include('admin.common.slide_bar')
<!-- Left navbar-header end -->
    <!-- Page Content -->
    <div id="page-wrapper">
        @yield('content')
        <footer class="footer text-center"> 2017 &copy; Thành Đạt</footer>
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
@yield('scripts')
<!--Style Switcher -->

<script src="{!! url('public/admin/') !!}/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
<script src="{!! url('public/admin/') !!}/plugins/plugin-soanthao/ckeditor/ckeditor.js"></script>
<script src="{!! url('public/admin/') !!}/plugins/plugin-soanthao/ckfinder/ckfinder.js"></script>
<script src="{!! url('public/admin/') !!}/plugins/plugin-soanthao/func_ckfinder.js"></script>
<script src="{!! url('public/admin/assets') !!}/js/myscripts.js"></script>
</body>
</html>

