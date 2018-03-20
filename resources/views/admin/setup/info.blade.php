<?php
/**
 * Auth     : Nguyễn Thành Đạt.
 * Email    : 'ntdat.tb@gmail.com'
 * Phone    : 0969.730.726
 * Website  : http://ariweb.net
 */
$id = 0;
$src = url();
?>

@extends('admin.master')
@section('title',$title)
@section('module','Quản lý Bài viết')
@section('style')
    <link href="{!! url('public/admin/assets') !!}/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{!! url('public/admin/') !!}/plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <!-- Menu CSS -->
    <link href="{!! url('public/admin') !!}/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{!! url('public/admin') !!}/plugins/bower_components/dropify/dist/css/dropify.min.css">
    <link href="{!! url('public/admin') !!}/plugins/bower_components/dropzone-master/dist/dropzone.css" rel="stylesheet" type="text/css" />
    <!-- animation CSS -->
    <link href="{!! url('public/admin/assets') !!}/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{!! url('public/admin/assets') !!}/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="{!! url('public/admin/assets') !!}/css/colors/gray-dark.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .clearI{
            position: absolute;
        }
    </style>
@endsection
@section('content')
    <!-- .row -->
    <div class="row">
        <form data-toggle="validator" method="post" action="{!! $link !!}" enctype="multipart/form-data">
            <input type="text" hidden readonly name="_token" value="{!! csrf_token() !!}" >
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title m-b-0">{!! $title !!}</h3>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="white-box">

                    @if(Session::has('flash_messages'))
                        <div class="col-lg-12 my-alert">
                            <div class="alert alert-{!! Session::get('flash_level') !!}">
                                {!! Session::get('flash_messages') !!}
                            </div>
                        </div>
                    @endif
                    @if(count($errors) > 0)
                        <div class="col-lg-12 my-alert">
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{!! $error !!}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <hr>
                        </div>
                    @endif

                        <div class="form-group">
                            <label for="name" class="control-label">Tên : </label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Tên" required data-error="Tên không được để trống" value="{!! @$detail->name?$detail->name:old('name') !!}">
                            <div class="help-block with-errors"></div>
                            <p id="alias" name="alias"></p>
                        </div>
                        <div class="form-group">
                            <label for="name" class="control-label">Địa chỉ : </label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Địa chỉ" required data-error="Địa chỉ không được để trống" value="{!! @$detail->address?$detail->address:old('address') !!}">
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <div class="white-box">
                                <h3 class="box-title">Logo : </h3>
                                <input type="file" id="input-file-disable-remove" name="logo" class="dropify" data-show-remove="true" value="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="control-label">Tiêu đề : </label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Tieu đề" required data-error="Tiêu đề không được để trống" value="{!! @$detail->title?$detail->title:old('title') !!}">
                            <div class="help-block with-errors"></div>
                            <p id="alias" name="alias"></p>
                        </div>
                        <div class="form-group">
                            <label for="keywords" class="control-label">Từ khóa</label>
                            <span class="help-block with-errors"></span>
                            <textarea id="keywords" class="form-control" name="keywords" >{!! @$detail->keywords?$detail->keywords:old('keywords') !!}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="description" class="control-label">description</label>
                            <span class="help-block with-errors"></span>
                            <textarea id="description" class="form-control" name="description">{!! @$detail->description?$detail->description:old('description') !!}</textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Lưu</button>
                        </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="white-box">
                    <div class="form-group">
                        <label for="name" class="control-label">Email : </label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" required data-error="Email không được để trống" value="{!! @$detail->email?$detail->email:old('email') !!}">
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="control-label">Số điện thoại : </label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Số điện thoại" required data-error="Số điện thoại không được để trống" value="{!! @$detail->phone?$detail->phone:old('phone') !!}">
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="control-label">Hotline : </label>
                        <input type="text" class="form-control" id="hotline" name="hotline" placeholder="hotline" required data-error="hotline không được để trống" value="{!! @$detail->hotline?$detail->hotline:old('hotline') !!}">
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="control-label">Facebook : </label>
                        <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Facebook" value="{!! @$detail->facebook?$detail->facebook:old('facebook') !!}">

                    </div>

                    <div class="form-group">
                        <label for="name" class="control-label">Skype : </label>
                        <input type="text" class="form-control" id="skype" name="skype" placeholder="Skype" value="{!! @$detail->skype?$detail->skype:old('skype') !!}">

                    </div>

                    <div class="form-group">
                        <label for="name" class="control-label">google : </label>
                        <input type="text" class="form-control" id="google" name="google" placeholder="google" value="{!! @$detail->google?$detail->google:old('google') !!}">
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="control-label">youtube : </label>
                        <input type="text" class="form-control" id="youtube" name="youtube" placeholder="youtube" value="{!! @$detail->youtube?$detail->youtube:old('youtube') !!}">

                    </div>

                    <div class="form-group">
                        <label for="name" class="control-label">twitter : </label>
                        <input type="text" class="form-control" id="twitter" name="twitter" placeholder="twitter" value="{!! @$detail->twitter?$detail->twitter:old('twitter') !!}">

                    </div>

                    <div class="form-group">
                        <label for="name" class="control-label">Fanpage facebook (Khung nhúng): </label>
                        <textarea class="form-control" id="facebookF" name="facebookF" placeholder="Fanpage facebook">{!! @$detail->facebookF?$detail->facebookF:old('facebookF') !!}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="name" class="control-label">Bản đồ: </label>
                        <textarea class="form-control" id="maps" name="maps" placeholder="Bản đồ">{!! @$detail->maps?$detail->maps:old('maps') !!}</textarea>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="white-box">
                    <div class="form-group">
                        <label for="name" class="control-label">Logo : </label>
                        <img src="{!! url('resources/upload/theme/') !!}/{!! @$detail->logo !!}" class="img-responsive" alt="">
                    </div>
                    <div class="form-group">
                        <label for="name" class="control-label">fanpage : </label>
                        {!! @htmlspecialchars_decode($detail->facebookF) !!}
                    </div>

                    <div class="form-group">
                        <label for="name" class="control-label">Bản đồ : </label>
                        {!! @htmlspecialchars_decode($detail->maps) !!}
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- /.row -->
@endsection
@section('scripts')
    <!-- jQuery -->
    <script src="{!! url('public/admin/') !!}/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{!! url('public/admin/assets') !!}/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="{!! url('public/admin/') !!}/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="{!! url('public/admin/assets') !!}/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="{!! url('public/admin/assets') !!}/js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{!! url('public/admin/assets') !!}/js/custom.min.js"></script>
    <script src="{!! url('public/admin/assets') !!}/js/validator.js"></script>
    <script src="{!! url('public/admin/') !!}/plugins/bower_components/dropify/dist/js/dropify.min.js"></script>
    <script>
        $(document).ready(function(){
            // Basic
            $('.dropify').dropify();

            // Translated
            $('.dropify-fr').dropify({
                messages: {
                    default: 'Glissez-déposez un fichier ici ou cliquez',
                    replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                    remove:  'Supprimer',
                    error:   'Désolé, le fichier trop volumineux'
                }
            });

            // Used events
            var drEvent = $('#input-file-events').dropify();

            drEvent.on('dropify.beforeClear', function(event, element){
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });

            drEvent.on('dropify.afterClear', function(event, element){
                alert('File deleted');
            });

            drEvent.on('dropify.errors', function(event, element){
                console.log('Has Errors');
            });

            var drDestroy = $('#input-file-to-destroy').dropify();
            drDestroy = drDestroy.data('dropify')
            $('#toggleDropify').on('click', function(e){
                e.preventDefault();
                if (drDestroy.isDropified()) {
                    drDestroy.destroy();
                } else {
                    drDestroy.init();
                }
            })
        });
    </script>
    <script>
        id          = "<?=$id?>" ;
        src         = "<?=$src?>";
        text_pdt    = 'chi-tiet-bai-viet' ;
    </script>
@endsection