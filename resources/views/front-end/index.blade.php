<?php
    $name_web = 'Phongvebinhduong.vn';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- Mirrored from www.elines.vn/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Mar 2018 16:47:06 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<!-- /Added by HTTrack -->

<head id="Head1">
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <meta name="revisit-after" content="1 days" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1,minimum-scale=1" />
    @include('front-end.common.s_top')
    <title>Vé máy bay, đại lý vé máy bay giá rẻ eLines</title>
    <meta name="description" content="Ve may bay, đại lý bán vé máy bay eLines chuyên cung cấp vé máy bay giá rẻ của  hãng hàng không trong nước và quốc tế." />
    <meta name="keywords" content="ve may bay, ve may bay gia re, ve may bay khuyen mai" />

</head>

<body>
<div id="page-wrapper" class="elines-home">

    {{--header--}}
    @include('front-end.common.header')
    {{--slider--}}
    @include('front-end.common.slider')
</div>
<section id="content ">
@yield('content')
</section>

@include('front-end.common.footer')

{{--<div class="banner-lr banner-left hidden-xs hidden-sm" style=" margin-left: -780px !important; "> <a href="https://www.facebook.com/elines.vn/"> <img src="/images/themeforest/elines/banner-ve-tet-2017-1.jpg" alt="banner trai" /> </a> </div> <div class="banner-lr banner-right" > <a href="https://www.facebook.com/elines.vn/"> <img src="/images/themeforest/elines/banner-ve-tet-2017-3.jpg" alt="banner phai" /> </a> </div>--}}
@include('front-end.common.s_footer')
{{--js--}}
</body>
<!-- Mirrored from www.elines.vn/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Mar 2018 16:47:27 GMT -->

</html>