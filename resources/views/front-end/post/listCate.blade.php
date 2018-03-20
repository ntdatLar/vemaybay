@extends('front-end.home')
@section('style')

        <!-- Popup CSS -->
<link href="{!! url('public/home/') !!}/plugins/bower_components/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">
<!-- morris CSS -->
<link href="{!! url('public/home/') !!}/plugins/bower_components/dropzone-master/dist/dropzone.css" rel="stylesheet" type="text/css" />

<link href="{!! url('public/home/') !!}/plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
<link href="{!! url('public/home/') !!}/plugins/bower_components/owl.carousel/owl.carousel.min.css" rel="stylesheet" type="text/css" />
<link href="{!! url('public/home/') !!}/plugins/bower_components/owl.carousel/owl.theme.default.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="row">
    @include('front-end.wget.slidebar_left')
    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
        <hr class="m-t-5">
        @include('front-end.post.item',$post)
    </div>
    @include('front-end.wget.slidebar_right')
</div>
@endsection
@section('script')

@endsection
