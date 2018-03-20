<?php
/**
 * Auth     : Nguyễn Thành Đạt.
 * Email    : 'ntdat.tb@gmail.com'
 * Phone    : 0969.730.726
 * Website  : http://ariweb.net
 */
$id = 10+1;
$src = url();
?>

@extends('admin.master')
@section('title',$title)
@section('module','Quản lý banner')
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
        <?php //pre($detail);?>
    <!-- .row -->
    <div class="row">
        <form data-toggle="validator" method="post" action="{!! $link !!}" enctype="multipart/form-data">
            <input type="text" hidden readonly name="_token" value="{!! csrf_token() !!}" >
            <div class="col-sm-7">
                <div class="white-box">
                    <h3 class="box-title m-b-0">{!! $title !!}</h3>
                    <p class="text-right">
                    @if(isset($detail) && $detail->id)
                            <a style="font-size: 15px" href="{!! route('admin.banner.getAdd') !!}" class="text-success"> <i  class="fa fa-plus-circle text-success" aria-hidden="true"></i> Thêm mới</a>
                    @endif
                        <a style="font-size: 15px" href="{!! route('admin.banner.getList') !!}" class="text-success"> <i class="fa fa-list-ul text-success" aria-hidden="true"></i> Danh sách</a>
                    </p>

                    @if(Session::has('flash_messages'))
                        <div class="col-lg-12 my-alert">
                            <div class="alert alert-{!! Session::get('flash_level') !!}">
                                {!! Session::get('flash_messages') !!}
                            </div>
                        </div>
                    @endif

                    <hr>
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
                        <label for="name" class="control-label">Tiêu đề ảnh</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Tiêu đề ảnh" required data-error="Tiêu đề ảnh không được để trống" value="{!! @$detail->title?$detail->title:old('title') !!}">
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="control-label">Link đích</label>
                        <input type="text" class="form-control" id="link" name="link" placeholder="Link đích" required data-error="Link đích không được để trống" value="{!! @$detail->link?$detail->link:old('link') !!}">
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <div class="white-box">
                            <h3 class="box-title">Ảnh </h3>
                            <input type="file" id="input-file-disable-remove" name="name" class="dropify" data-show-remove="true" value="" />
                        </div>
                    </div>
                    @if(isset($detail) && $detail->name != '')
                        <div id="showImg">
                            <div class="form-group" id="parentImg">
                                <img src="{!! url('/resources/upload/banner') !!}/{!! $detail->name !!}" alt="" width="150">
                            </div>
                        </div>
                    @endif

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="white-box">
                    <h3 class="box-title m-b-0"></h3>
                    <div class="form-group">
                        <div class="checkbox">
                            @if(isset($detail) && $detail->status == 1)
                                <?php $status = 'checked' ?>
                            @else
                                <?php $status = '' ?>
                            @endif
                            <input type="checkbox" data-size="small" value="1" data-type="status" data-src="{!! route('admin.pdt.postUpdateItem') !!}" name="status" {{ $status }}  class="js-switch" data-color="#99d683"> Hiển thị
                        </div>

                        <div class="checkbox">
                            @if(isset($detail) && $detail->slider == 1)
                                <?php $slider = 'checked' ?>
                            @else
                                <?php $slider = '' ?>
                            @endif
                            <input type="checkbox" data-size="small" data-type="slider" data-src="{!! route('admin.banner.postUpdateItem') !!}" value="1" name="slider" {{ $slider }}  class="js-switch" data-color="#99d683"/> Slider
                        </div>
                        <div class="checkbox">
                            @if(isset($detail) && $detail->footer == 1)
                                <?php $footer = 'checked' ?>
                            @else
                                <?php $footer = '' ?>
                            @endif
                            <input type="checkbox" data-size="small" data-type="footer" data-src="{!! route('admin.banner.postUpdateItem') !!}" value="1" name="footer" {{ $footer }}  class="js-switch"  data-color="#99d683"/>Dưới
                        </div>
                        <div class="checkbox">
                            @if(isset($detail) && $detail->top == 1)
                                <?php $top = 'checked' ?>
                            @else
                                <?php $top = '' ?>
                            @endif
                            <input type="checkbox" data-size="small" data-type="top" data-src="{!! route('admin.banner.postUpdateItem') !!}" value="1" name="top" {{ $top }}  class="js-switch" data-color="#99d683"/>Trên
                        </div>
                        <div class="checkbox">
                            @if(isset($detail) && $detail->left == 1)
                                <?php $left = 'checked' ?>
                            @else
                                <?php $left = '' ?>
                            @endif
                            <input type="checkbox" data-size="small" data-type="left" data-src="{!! route('admin.banner.postUpdateItem') !!}" value="1" name="left" {{ $left }}  class="js-switch" data-color="#99d683"/>Trái
                        </div>
                        <div class="checkbox">
                            @if(isset($detail) && $detail->right == 1)
                                <?php $right = 'checked' ?>
                            @else
                                <?php $right = '' ?>
                            @endif
                            <input type="checkbox" data-size="small" data-type="right" data-src="{!! route('admin.banner.postUpdateItem') !!}" value="1" name="right" {{ $right }}  class="js-switch"  data-color="#99d683"/>Phải
                        </div>
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
        text_pdt    = 'chi-tiet-san-pham' ;
    </script>
@endsection