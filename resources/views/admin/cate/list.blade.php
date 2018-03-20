<?php
/**
 * Auth     : Nguyễn Thành Đạt.
 * Email    : 'ntdat.tb@gmail.com'
 * Phone    : 0969.730.726
 * Website  : http://ariweb.net
 */
?>

@extends('admin.master')
@section('title','Danh sách menu')
@section('module','Quản lý menu')
@section('style')
    <link href="{!! url('public/admin/assets') !!}/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{!! url('public/admin/') !!}/plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <!-- Menu CSS -->
    <link href="{!! url('public/admin') !!}/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <link href="{!! url('public/admin') !!}/plugins/bower_components/icheck/skins/all.css" rel="stylesheet">
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
        .table-responsive>.listCate:first-child div{
            font-weight: bold;
            color: #d43f3a;
            border-right: thin solid #ccc;
        }
        .table-responsive>.listCate:first-child div:last-child{
            border: none;
        }
        .listCate{
            
            width: 100%;
            float: left;
            border-bottom: thin solid #ccc;
            padding-top: 15px;
            padding-bottom: 15px;
        }
        .listCate:hover:first-child{
            background: inherit;
        }
        .listCate:hover{
            background: #f2f2f2;
            color: #d43f3a;
        }
    </style>
@endsection
@section('content')
<!-- ---------------------------------------------------------------- -->
<!-- /row -->
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <h3 class="box-title m-b-0" id="prodT">Danh mục sản phẩm</h3>
            <p></p>
            <div class="table-responsive">
                <input type="text" hidden name="_token" value="{!! csrf_token() !!}">

                <table id="myTable" class="table table-striped example23">
                    <thead>
                    <tr>
                        <th><input type="checkbox"> </th>
                        <th>Tên</th>
                        <th>#id</th>
                        <th>Sắp xếp</th>
                        <th>Tùy chỉnh</th>
                        <th>Tùy chọn</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cate_product as $item)
                        <tr id="{!! $item->id !!}">
                            <td><input type="checkbox"></td>
                            <td>{!! $item->name !!}</td>
                            <td>#{!! $item->id !!}</td>
                            <td><input type="number" value="{!! $item->order !!}" class="upOrder" data-type="order" data-id="{!! $item->id !!}" data-src="{!! route('admin.cte.upOrder') !!}" style="width: 40px" min="0" max="999"></td>
                            <td>
                                <div class="checkbox">
                                    @if(isset($item) && $item->status == 1)
                                        <?php $status = 'checked' ?>
                                    @else
                                        <?php $status = '' ?>
                                    @endif
                                    <input type="checkbox" data-size="small" value="1" data-type="status" data-src="{!! route('admin.cte.postUpdateItem') !!}" name="status" {{ $status }}  class="js-switch updateItem" data-id="{!! $item->id !!}" data-color="#99d683"> hiển thị
                                </div>

                                <div class="checkbox">
                                    @if(isset($item) && $item->home == 1)
                                        <?php $home = 'checked' ?>
                                    @else
                                        <?php $home = '' ?>
                                    @endif
                                    <input type="checkbox" data-size="small" data-type="home" data-src="{!! route('admin.cte.postUpdateItem') !!}" value="1" name="home" {{ $home }}  class="js-switch updateItem" data-id="{!! $item->id !!}" data-color="#99d683"/> Hiển thị trang chủ
                                </div>
                                @if(isset($item) && $item->top == 1)
                                    <?php $top = 'checked' ?>
                                @else
                                    <?php $top = '' ?>
                                @endif
                                <div class="checkbox">
                                    <input type="checkbox" data-size="small" data-type="top" data-src="{!! route('admin.cte.postUpdateItem') !!}" value="1" name="top" {{ $top }}  class="js-switch updateItem" data-id="{!! $item->id !!}" data-color="#99d683"/> Hiển thị trên top
                                </div>

                                @if( $item->footer == 1)
                                    <?php $footer = 'checked' ?>
                                @else
                                    <?php $footer = '' ?>
                                @endif
                                <div class="checkbox">
                                    <input type="checkbox" data-size="small" data-type="footer" data-src="{!! route('admin.cte.postUpdateItem') !!}" value="1" name="footer" {{ $footer }}  class="js-switch updateItem" data-id="{!! $item->id !!}" data-color="#99d683"/> Hiển thị cuối trang
                                </div>
                            </td>
                            <td>
                                <a href="{!! route('admin.cte.getEdit',$item->id) !!}" class="editItem"><i class="ti-pencil text-success"></i></a>
                                <a href="javascript:void(0)" class="delItem" data-id="{!! $item->id !!}" data-link="{!! route('admin.cte.postDelItem') !!}" data-msg="Bạn muốn xóa?"><i class="ti-trash text-danger"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
<!-- /.row -->
<!-- ---------------------------------------------------------------- -->
<!-- /row -->
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <h3 class="box-title m-b-0" id="postT">Danh mục tin</h3>
            <p></p>
            <div class="table-responsive">
                <input type="text" hidden name="_token" value="{!! csrf_token() !!}">

                <table id="postTable" class="table table-striped">
                    <thead>
                    <tr>
                        <th><input type="checkbox"> </th>
                        <th>Tên</th>
                        <th>#id</th>
                        <th>Sắp xếp</th>
                        <th>Tùy chỉnh</th>
                        <th>Tùy chọn</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cate_post as $item)
                        <tr id="{!! $item->id !!}">
                            <td><input type="checkbox"></td>
                            <td>{!! $item->name !!}</td>
                            <td>#{!! $item->id !!}</td>
                            <td><input type="number" value="{!! $item->order !!}" class="upOrder" data-type="order" data-id="{!! $item->id !!}" data-src="{!! route('admin.cte.upOrder') !!}" style="width: 40px" min="0" max="999"></td>
                            <td>
                                <div class="checkbox">
                                    @if(isset($item) && $item->status == 1)
                                        <?php $status = 'checked' ?>
                                    @else
                                        <?php $status = '' ?>
                                    @endif
                                    <input type="checkbox" data-size="small" value="1" data-type="status" data-src="{!! route('admin.cte.postUpdateItem') !!}" name="status" {{ $status }}  class="js-switch updateItem" data-id="{!! $item->id !!}" data-color="#99d683"> hiển thị
                                </div>

                                <div class="checkbox">
                                    @if(isset($item) && $item->home == 1)
                                        <?php $home = 'checked' ?>
                                    @else
                                        <?php $home = '' ?>
                                    @endif
                                    <input type="checkbox" data-size="small" data-type="home" data-src="{!! route('admin.cte.postUpdateItem') !!}" value="1" name="home" {{ $home }}  class="js-switch updateItem" data-id="{!! $item->id !!}" data-color="#99d683"/> Hiển thị trang chủ
                                </div>
                                @if(isset($item) && $item->top == 1)
                                    <?php $top = 'checked' ?>
                                @else
                                    <?php $top = '' ?>
                                @endif
                                <div class="checkbox">
                                    <input type="checkbox" data-size="small" data-type="top" data-src="{!! route('admin.cte.postUpdateItem') !!}" value="1" name="top" {{ $top }}  class="js-switch updateItem" data-id="{!! $item->id !!}" data-color="#99d683"/> Hiển thị trên top
                                </div>

                                @if( $item->footer == 1)
                                    <?php $footer = 'checked' ?>
                                @else
                                    <?php $footer = '' ?>
                                @endif
                                <div class="checkbox">
                                    <input type="checkbox" data-size="small" data-type="footer" data-src="{!! route('admin.cte.postUpdateItem') !!}" value="1" name="footer" {{ $footer }}  class="js-switch updateItem" data-id="{!! $item->id !!}" data-color="#99d683"/> Hiển thị cuối trang
                                </div>
                            </td>
                            <td>
                                <a href="{!! route('admin.cte.getEdit',$item->id) !!}" class="editItem"><i class="ti-pencil text-success"></i></a>
                                <a href="javascript:void(0)" class="delItem" data-id="{!! $item->id !!}" data-link="{!! route('admin.cte.postDelItem') !!}" data-msg="Bạn muốn xóa?"><i class="ti-trash text-danger"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
<!-- /.row -->
<!-- ---------------------------------------------------------------- -->
<!-- /row -->
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <h3 class="box-title m-b-0" id="pageT">Danh mục bài viết(các page)</h3>
            <p></p>
            <div class="table-responsive">
                <input type="text" hidden name="_token" value="{!! csrf_token() !!}">

                <table id="pageTable" class="table table-striped example23">
                    <thead>
                    <tr>
                        <th><input type="checkbox"> </th>
                        <th>Tên</th>
                        <th>#id</th>
                        <th>Sắp xếp</th>
                        <th>Tùy chỉnh</th>
                        <th>Tùy chọn</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cate_page as $item)
                        <tr id="{!! $item->id !!}">
                            <td><input type="checkbox"></td>
                            <td>{!! $item->name !!}</td>
                            <td>#{!! $item->id !!}</td>
                            <td><input type="number" value="{!! $item->order !!}" class="upOrder" data-type="order" data-id="{!! $item->id !!}" data-src="{!! route('admin.cte.upOrder') !!}" style="width: 40px" min="0" max="999"></td>
                            <td>
                                <div class="checkbox">
                                    @if(isset($item) && $item->status == 1)
                                        <?php $status = 'checked' ?>
                                    @else
                                        <?php $status = '' ?>
                                    @endif
                                    <input type="checkbox" data-size="small" value="1" data-type="status" data-src="{!! route('admin.cte.postUpdateItem') !!}" name="status" {{ $status }}  class="js-switch updateItem" data-id="{!! $item->id !!}" data-color="#99d683"> hiển thị
                                </div>

                                <div class="checkbox">
                                    @if(isset($item) && $item->home == 1)
                                        <?php $home = 'checked' ?>
                                    @else
                                        <?php $home = '' ?>
                                    @endif
                                    <input type="checkbox" data-size="small" data-type="home" data-src="{!! route('admin.cte.postUpdateItem') !!}" value="1" name="home" {{ $home }}  class="js-switch updateItem" data-id="{!! $item->id !!}" data-color="#99d683"/> Hiển thị trang chủ
                                </div>
                                @if(isset($item) && $item->top == 1)
                                    <?php $top = 'checked' ?>
                                @else
                                    <?php $top = '' ?>
                                @endif
                                <div class="checkbox">
                                    <input type="checkbox" data-size="small" data-type="top" data-src="{!! route('admin.cte.postUpdateItem') !!}" value="1" name="top" {{ $top }}  class="js-switch updateItem" data-id="{!! $item->id !!}" data-color="#99d683"/> Hiển thị trên top
                                </div>

                                @if( $item->footer == 1)
                                    <?php $footer = 'checked' ?>
                                @else
                                    <?php $footer = '' ?>
                                @endif
                                <div class="checkbox">
                                    <input type="checkbox" data-size="small" data-type="footer" data-src="{!! route('admin.cte.postUpdateItem') !!}" value="1" name="footer" {{ $footer }}  class="js-switch updateItem" data-id="{!! $item->id !!}" data-color="#99d683"/> Hiển thị cuối trang
                                </div>
                            </td>
                            <td>
                                <a href="{!! route('admin.cte.getEdit',$item->id) !!}" class="editItem"><i class="ti-pencil text-success"></i></a>
                                <a href="javascript:void(0)" class="delItem" data-id="{!! $item->id !!}" data-link="{!! route('admin.cte.postDelItem') !!}" data-msg="Bạn muốn xóa?"><i class="ti-trash text-danger"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
<!-- /.row -->


@endsection
@section('scripts')
    <style>
        .editItem:hover ,.delItem:hover{
            background: #761c19; /*4F5467*/
            transition: all 0.5s;
            color: #fff;
            border: none;
        }
        .editItem:hover i,.delItem:hover i{
            transition: all 0.5s;
            color: #fff;
        }
        .editItem ,.delItem{
            width: 30px;
            height: 30px;
            border: thin solid #CCCCCC;
            border-radius: 100% ;
            display: block;
            text-align: center;
            line-height: 30px;
            float: left;
            margin-left:5px;
            transition: all 0.5s;
        }
        .editItem i,.delItem i{
            font-size: 15px;
        }
    </style>
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
    <script src="{!! url('public/admin') !!}/plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="{!! url('public/admin') !!}/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="{!! url('public/admin') !!}/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="{!! url('public/admin') !!}/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="{!! url('public/admin') !!}/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="{!! url('public/admin') !!}/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="{!! url('public/admin') !!}/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="{!! url('public/admin') !!}/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
    <div class="cateFix">
        <a href="#prodT" class="linkCate cateActive">Sp</a>
        <a href="#postT" class="linkCate">Post</a>
        <a href="#pageT" class="linkCate">Page</a>
    </div>
    <style>
        .cateFix{
            width: 50px;
            height: 150px;
            position: fixed;
            right: 0;
            top: 25%;
            background: #4f5467;
        }
        .cateFix a{
            color: #fff;
            width: 100%;
            height: 35px;
            line-height: 35px;
            text-align: center;
            float: left;
        }
        .cateActive{
            color: rgb(153, 214, 131) !important;
            border-bottom: thin solid #fff;
        }
    </style>
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
            $('#postTable').DataTable();
            $('#pageTable').DataTable();
            $('.linkCate').click(function () {
                $(this).addClass('cateActive');
                $('.linkCate').not(this).removeClass('cateActive');
            });

        });
    </script>
@endsection