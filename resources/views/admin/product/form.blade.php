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
@section('module','Quản lý sản phẩm')
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
                            <a style="font-size: 15px" href="{!! route('admin.pdt.getAdd') !!}" class="text-success"> <i  class="fa fa-plus-circle text-success" aria-hidden="true"></i> Thêm mới</a>
                    @endif
                        <a style="font-size: 15px" href="{!! route('admin.pdt.getList') !!}" class="text-success"> <i class="fa fa-list-ul text-success" aria-hidden="true"></i> Danh sách</a>
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
                            <label for="name" class="control-label">Tên (tiêu đề)</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Tên" required data-error="Tên không được để trống" value="{!! @$detail->name?$detail->name:old('name') !!}">
                            <div class="help-block with-errors"></div>
                            <p id="alias" name="alias"></p>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="num" class="control-label">Số lượng: </label>
                                        <input type="number" class="form-control" id="num" name="num" placeholder="Số lượng" data-error="Giá phải >= 0 và không được để trống " required min="0" value="{!! @$detail->num?$detail->num:old('num') !!}">
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label class="control-label">Chọn Danh mục</label>
                                        <div class="col-sm-12">
                                            <select class="form-control" name="cate_id">
                                                <option value="0">Chọn danh mục</option>
                                                @if(isset($detail->cate_id ))
                                                    <?php $select = $detail->cate_id  ?>
                                                @else
                                                    <?php $select = old('cate_id')?old('cate_id'):0 ?>
                                                @endif
                                                {!! $select !!}
                                                {!! showCate($cate,0,'',$select) !!}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="price_old" class="control-label">Giá: </label>
                                        <input type="number" class="form-control" id="price_old" name="price_old" placeholder="Giá" data-error="Giá phải > 0 và không được để trống " required min="0" value="{!! @$detail->price_old?$detail->price_old:old('price_old') !!}">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="percent" class="control-label">Khuyến mãi (%): </label>
                                        <input type="number" class="form-control" id="percent" name="percent" placeholder="Phần %" data-error="Khuyến mãi(%) phải > 0 và < 100% " required min="0" max="100" value="{!! @$detail->percent?$detail->percent:old('percent') !!}">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="price_new" class="control-label">Giá Bán: </label>
                                        <input type="number" class="form-control" id="price_new" name="price_new" placeholder="Giá bán" readonly min="0" value="{!! @$detail->price_new?$detail->price_new:old('price_new') !!}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <br>
                            <label for="" class="control-label">Giới thiệu ( <a href="javascript:void(0)" id="addIntro"><i class="ti-plus"></i> Thêm</a>)( <a href="javascript:void(0)" id="delIntro"><i class="fa fa-minus"></i> Xóa</a> )</label>
                            <div class="col-lg-12" id="introHtml">
                                    @if(isset($detail) && $detail->intro != '')
                                        <?php $intro = json_decode($detail->intro); ?>
                                        @if(count($intro) >0)
                                            @for($i=0;$i<count($intro[0]);$i++)
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="titleIntro[]" placeholder="Tiêu đề" value="{!! $intro[0][$i] !!}">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="textIntro[]" placeholder="Đoạn giới thiệu" value="{!! $intro[0][$i] !!}">
                                                        </div>
                                                    </div>
                                                    <a href="javascript:void(0)" class="clearI"><i class="fa fa-times text-danger"></i></a>
                                                </div>
                                            @endfor
                                        @endif
                                    @else
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="titleIntro[]" placeholder="Tiêu đề">
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="textIntro[]" placeholder="Đoạn giới thiệu">
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                <div id="introHtmlChild">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="content" class="control-label">Bài viết (Chi tiết)</label>
                            <span class="help-block with-errors"></span>
                            <textarea id="content" class="form-control" name="content"  required data-error="Bài viết không được để trống">{!! @$detail->content?$detail->content:old('content') !!}</textarea>
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
                    <h3 class="box-title m-b-0"></h3>
                    <div class="form-group">
                        @if(isset($detail) && $detail->status == 1)
                            <?php $status = 'checked="checked"' ?>
                        @else
                            <?php $status = '' ?>
                        @endif
                        <div class="checkbox">
                            <input type="checkbox" id="status" {!! $status !!} name="status" value="1">
                            <label for="status"> Hiển thị </label>
                        </div>
                        @if(isset($detail) && $detail->home == 1)
                            <?php $home = 'checked=checked' ?>
                        @else
                            <?php $home = '' ?>
                        @endif
                        <div class="checkbox">
                            <input type="checkbox" id="home" {!! $home !!} name="home" value="1">
                            <label for="home"> Hiển thị trang chủ </label>
                        </div>
                        @if(isset($detail) && $detail->hot == 1)
                            <?php $hot = 'checked=checked' ?>
                        @else
                            <?php $hot = '' ?>
                        @endif
                        <div class="checkbox">
                            <input type="checkbox" id="hot" {!! $hot !!} name="hot" value="1">
                            <label for="hot"> Sản phẩm Hot</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="white-box">
                            <h3 class="box-title">Ảnh đại diện </h3>
                            <input type="file" id="input-file-disable-remove" name="avatar" class="dropify" data-show-remove="true" multiple value="" />
                        </div>
                    </div>
                    @if(isset($detail) && $detail->avatar != '')
                    <div id="showImg">
                        <div class="form-group" id="parentImg">
                            <img src="{!! url('/resources/upload/product') !!}/{!! $detail->avatar !!}" alt="" width="150">
                        </div>
                    </div>
                    @endif
                    @if(isset($pImg))
                        @foreach($pImg as $item)
                            <div id="{!! $item->id !!}">
                                <div class="form-group" id="parentImg">
                                    <img src="{!! url('/resources/upload/product') !!}/{!! $item->name !!}" alt="" width="150">
                                    <a href="javascript:void(0)" class="clearImg text-danger delItem" type="button" data-id="{!! $item->id !!}" data-link="{!! URL::route('admin.pdt.getDelImg') !!}" data-msg="Bạn có muốn xóa ảnh này?" ><i class="fa fa-times"></i></a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <div id="showInput"></div>
                    <div class="form-actions">
                        <button type="button" class="btn btn-success" id="addImg"> <i class="ti-plus"></i> Thêm ảnh</button>
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
    <script>
        $("#addImg").click(function () {
            $('#showInput').append('<div class="form-group"><div class="white-box"><h3 class="box-title"></h3><input type="file" id="input-file-disable-remove" name="images[]" class="dropify" data-show-remove="true"/></div></div>');
        });
        $("#addIntro").click(function () {
            $('#introHtmlChild').append('<div class="row"><div class="col-lg-4"><div class="form-group"><input type="text" class="form-control" name="titleIntro[]" placeholder="Tiêu đề"></div></div><div class="col-lg-8"><div class="form-group"><input type="text" class="form-control" name="textIntro[]" placeholder="Đoạn giới thiệu"></div></div></div>');
        });
        $('#delIntro').click(function(){
            var div = $('#introHtmlChild').children('div:last-child');
                div.slideUp(function(){
                    $(this).remove();
                });

        });
        $('#introHtml').find("a.clearI").click(function () {
            console.log('ok');
            $(this ).parent().slideUp(600,function (){
                $(this).remove();
            });
        });

    </script>
@endsection