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
@section('module','Quản lý menu')
@section('style')
    <link href="{!! url('public/admin/assets') !!}/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{!! url('public/admin/') !!}/plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <!-- Menu CSS -->
    <link href="{!! url('public/admin') !!}/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <link href="{!! url('public/admin') !!}/plugins/bower_components/icheck/skins/all.css" rel="stylesheet">
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
        .clearImg{
            background: #a94442;
            height: 25px !important;
            width: 25px;
            text-align: center;
            line-height: 25px;
            font-size: 15px;
            display: block;
            border-radius: 100%;
            color: #fff;
            margin-top: 2px;
        }
        .clearImg:hover,.clearImg:active{
            color: #fff;
        }
        .imgEdit{
            margin-top: 10px;
        }
    </style>
@endsection
@section('content')
    <!-- .row -->
    <div class="row">
        <form data-toggle="validator" method="post" action="{!! $link_form !!}" enctype="multipart/form-data">
            <div class="col-sm-7">
                <div class="white-box">
                    <h3 class="box-title m-b-0 text-info">{!! $title !!} :</h3>
                    @if(isset($detail) && $detail->id)
                    <p class="text-right"><a style="font-size: 15px" href="{!! route('admin.cte.getAdd') !!}" class="text-success"> <i  class="fa fa-plus-circle text-success" aria-hidden="true"></i> Thêm mới</a></p>
                    @endif

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
                        <input type="text" hidden name="_token" value="{!! csrf_token() !!}">
                        <div class="form-group">
                            <label for="name" class="control-label">Tên (tiêu đề)</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Tên" value="{{ @$detail->name?$detail->name:old('name')  }}" required data-error="Tên không được để trống">
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group">
                            <label for="alias" class="control-label">#</label>
                            <input type="text" class="form-control" id="alias" name="alias" value="{{ @$detail->alias?$detail->alias:old('alias')  }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="order" class="control-label">Sắp xếp</label>
                            <input type="number" class="form-control" id="order" name="order"  value="{{ @$detail->order?$detail->order:old('order')  }}" min="0" max="999">
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="cate_id" class="control-label">Chọn Danh mục</label>
                            <select class="form-control" name="parent_id" id="cate_id">
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                @if(isset($detail) && $detail->status == 1)
                                    <?php $status = 'checked="checked"' ?>
                                @else
                                    <?php $status = '' ?>
                                @endif
                                <input type="checkbox" value="1" id="active" name="status" {{ $status }}  class="js-switch" data-color="#99d683"> hiển thị
                            </div>
                        </div>
                        <div class="form-group" id="contentN">
                            <label for="content" class="control-label">Bài viết (Chi tiết)</label>
                            <span class="help-block with-errors"></span>
                            <textarea id="content" class="form-control" name="content">{{ @$detail->content?$detail->content:old('content')  }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="keywords" class="control-label">Từ khóa</label>
                            <span class="help-block with-errors"></span>
                            <textarea id="keywords" class="form-control" name="keywords" >{{ @$detail->keywords?$detail->keywords:old('keywords')  }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="description" class="control-label">Descript</label>
                            <span class="help-block with-errors"></span>
                            <textarea id="description" class="form-control" name="description">{{ @$detail->description?$detail->description:old('description')  }}</textarea>
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
                        <div class="checkbox">
                            @if(isset($detail) && $detail->home == 1)
                                <?php $home = 'checked=checked' ?>
                            @else
                                <?php $home = '' ?>
                            @endif
                            <input type="checkbox" id="home" value="1" name="home" {{ $home }}  class="js-switch" data-color="#99d683"/> Hiển thị trang chủ
                        </div>
                            @if(isset($detail) && $detail->top == 1)
                                <?php $top = 'checked=checked' ?>
                            @else
                                <?php $top = '' ?>
                            @endif
                        <div class="checkbox">
                            <input type="checkbox" id="top" value="1" name="top" {{ $top }}  class="js-switch" data-color="#99d683"/> Hiển thị trên top
                        </div>
                        @if(isset($detail) && $detail->footer == 1)
                            <?php $footer = 'checked=checked' ?>
                        @else
                            <?php $footer = '' ?>
                        @endif
                        <div class="checkbox">
                            <input type="checkbox" id="footer" value="1" name="footer" {{ $footer }}  class="js-switch" data-color="#99d683"/> Hiển thị cuối trang
                        </div>
                    </div>
                    <div class="form-checkbox">
                        <label for="" class="control-label">Loại danh mục</label>
                        <div class="radio">
                            <input type="radio" value="1" name="type"  class="check" @if(isset($detail) && $detail->type==1) {!! 'checked' !!} @endif data-radio="iradio_flat-green" id="radio-"/> Bài viết
                        </div>
                        <div class="radio">
                            <input type="radio" value="2" name="type"  class="check" @if(isset($detail) && $detail->type==2) {!! 'checked' !!} @endif data-radio="iradio_flat-green" id="radio"/> Danh mục tin
                        </div>
                        <div class="radio">
                            <input type="radio" value="3" name="type"  class="check" @if(isset($detail) && $detail->type==3) {!! 'checked' !!} @elseif(!isset($detail)) {!! 'checked' !!} @endif data-radio="iradio_flat-green" id="radio"/> Danh mục sản phẩm
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="white-box">
                            <h3 class="box-title">Ảnh đại diện <span>(Nếu có)</span></h3>
                            <input type="file" id="input-file-disable-remove" name="avatar" class="dropify" data-show-remove="true" multiple />
                            @if(isset($detail) && $detail->avatar != '')
                            <div class="form-group">
                                <img src="{!! asset('resources/upload/cate') !!}/{!! $detail->avatar !!} " alt="" class="img-responsive" width="100">
                                <a href="javascript:void(0)" class="clearImg" type="button" ><i class="fa fa-times"></i></a>
                            </div>
                            @endif
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
        @if(isset($detail) && $detail->parent_id != '')
            <?php $select = $detail->parent_id  ?>
        @else
            <?php $select = old('parent_id')?old('parent_id'):0 ?>
        @endif
    <script>
        id          = "<?=$id?>" ;
        src         = "<?=$src?>";
        text_pdt    = 'danh-muc' ;
        cate_product    = '<option value="0">Danh mục cha</option><?php showCate($data['cate_product'],0,'',$select)?>';
        cate_post       = '<option value="0">Danh mục cha</option><?php showCate($data['cate_post'],0,'',$select)?>';
        cate_page       = '<option value="0">Danh mục cha</option><?php showCate($data['cate_page'],0,'',$select)?>';
    </script>
    <script>
        $("#addImg").click(function () {
            $('#showInput').append('<div class="form-group"><div class="white-box"><h3 class="box-title"></h3><input type="file" id="input-file-disable-remove" name="images" class="dropify" data-show-remove="true"/></div></div>');
        });
        $("#clear").click(function () {
            $(this ).parent().slideUp(600,function (){
                $(this).remove();
            });
        });
        /*category*/
        var flag = $(this).find('input[name="type"]:checked').attr('value');
        if(flag == 1){
            $('#contentN').slideDown(500);
            $('#cate_id').html(cate_page);
        }else
        if(flag == 2){
            $('#cate_id').html(cate_post);
        }else{
            $('#cate_id').html(cate_product);
        }
    </script>
@endsection