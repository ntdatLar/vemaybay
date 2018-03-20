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
    <link href="{!! url('public/admin/') !!}/plugins/bower_components/switchery/dist/switchery.min.css" rel="stylesheet" />
    <link href="{!! asset('public/admin/assets/css/mycss.css')  !!}" rel="stylesheet" />
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
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">@yield('module')</h4>
                </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

                    <ol class="breadcrumb">
                        <li><a href="#">@yield('module')</a></li>
                        <li class="active">@yield('title')</li>
                    </ol>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            @yield('content')
        </div>
        <!-- /.container-fluid -->
        <footer class="footer text-center"> 2017 &copy; Thành Đạt</footer>
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<script src="{!! url('public/admin/') !!}/plugins/bower_components/switchery/dist/switchery.min.js"></script>
@yield('scripts')
<!--Style Switcher -->
<!-- icheck -->
<script src="{!! url('public/admin/') !!}/plugins/bower_components/icheck/icheck.min.js"></script>
<script src="{!! url('public/admin/') !!}/plugins/bower_components/icheck/icheck.init.js"></script>
<script src="{!! url('public/admin/') !!}/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
<script src="{!! url('public/admin/') !!}/plugins/plugin-soanthao/ckeditor/ckeditor.js"></script>
<script src="{!! url('public/admin/') !!}/plugins/plugin-soanthao/ckfinder/ckfinder.js"></script>
<script src="{!! url('public/admin/') !!}/plugins/plugin-soanthao/func_ckfinder.js"></script>

<script>
    var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
    $('.js-switch').each(function() {
        new Switchery($(this)[0], $(this).data());

    });
</script>
<script src="{!! url('public/admin/assets') !!}/js/myscripts.js"></script>
</body>
</html>

