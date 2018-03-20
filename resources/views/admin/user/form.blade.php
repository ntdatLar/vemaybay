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
@section('module','Quản lý quản thành viên')
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
                            <a style="font-size: 15px" href="{!! route('admin.usr.getAdd') !!}" class="text-success"> <i  class="fa fa-plus-circle text-success" aria-hidden="true"></i> Thêm mới</a>
                    @endif
                        <a style="font-size: 15px" href="{!! route('admin.usr.getList') !!}" class="text-success"> <i class="fa fa-list-ul text-success" aria-hidden="true"></i> Danh sách</a>
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
                        <label for="name" class="control-label">Tên đăng nhập</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Tên đăng nhập" required data-error="Tên không được để trống" value="{!! @$detail->name?$detail->name:old('name') !!}">
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="control-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" required data-error="Email không được để trống" value="{!! @$detail->email?$detail->email:old('email') !!}">
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="control-label">Tên hiển thị</label>
                        <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Tên hiển thị" value="{!! @$detail->fullname?$detail->fullname:old('fullname') !!}">
                    </div>

                    <div class="form-group">
                        <label for="name" class="control-label">Mật khẩu</label>
                        <input type="password" class="form-control" id="password" name="password" required data-error="Mật khẩu không được để trống" placeholder="Mật khẩu" value="">
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="control-label">Nhập lại mật khẩu</label>
                        <input type="password" class="form-control" id="repassword" name="repassword" required data-error="Nhập lại mật khẩu không được để trống" placeholder="Nhập lại mật khẩu" value="">
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="white-box">
                    <h3 class="box-title m-b-0"></h3>
                    <div class="form-group">
                        @if(isset($detail) && $detail->status == 1)
                            <?php $status = 'checked="checked"' ?>
                        @else
                            <?php $status = '' ?>
                        @endif
                        <div class="checkbox">
                            <input type="checkbox" id="status" {!! $status !!} name="status" value="1">
                            <label for="status"> Hoạt động </label>
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