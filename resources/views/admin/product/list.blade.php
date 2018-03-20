<?php
/**
 * Auth     : Nguyễn Thành Đạt.
 * Email    : 'ntdat.tb@gmail.com'
 * Phone    : 0969.730.726
 * Website  : http://ariweb.net
 */
?>

@extends('admin.master')
@section('title','Danh sách sản phẩm')
@section('module','Quản lý sản phẩm')
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
@endsection
@section('content')

<!-- /row -->
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <h3 class="box-title m-b-0">Danh sách</h3>
            <div class="table-responsive">
                <input type="text" hidden name="_token" value="{!! csrf_token() !!}">
                <table id="myTable" class="table table-striped">
                    <thead>
                    <tr>
                        <th>Stt</th>
                        <th>#id</th>
                        <th>Tên
                            <br>
                            Số lượng
                        </th>
                        <th>Ảnh đại diện</th>
                        <th>Giá <br> Kmai <br> Giá bán</th>
                        <th>Danh mục</th>
                        <th>Tùy chỉnh</th>
                        <th>Tùy chọn</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if($product)
                            <?php $i=1;?>
                            @foreach($product as $item)
                                <tr id="{!! $item->id !!}">
                                    <td>{!! $i !!}</td>
                                    <td>#{!! $item->id !!}</td>
                                    <td>
                                        - {!! $item->name !!} <br>
                                        - {!! $item->num !!}
                                    </td>
                                    <td><img src="{!! url('resources/upload/product/') !!}/{!! $item->avatar !!}" alt="" width="60"></td>
                                    <td>
                                        - {!! number_format($item->price_old) !!} <br>
                                        - {!! $item->percent !!} %<br>
                                        - {!! number_format($item->price_new) !!} <br>
                                    </td>
                                    <td>
                                        <?php  $cate = DB::table('cates')->where('id',$item->cate_id)->first() ?>
                                        @if(!empty($cate->name))
                                            {!! $cate->name !!}
                                        @endif
                                    </td>
                                    <td>
                                        <div class="checkbox">
                                            @if(isset($item) && $item->status == 1)
                                                <?php $status = 'checked' ?>
                                            @else
                                                <?php $status = '' ?>
                                            @endif
                                            <input type="checkbox" data-size="small" value="1" data-type="status" data-src="{!! route('admin.pdt.postUpdateItem') !!}" name="status" {{ $status }}  class="js-switch updateItem" data-id="{!! $item->id !!}" data-color="#99d683"> Hiển thị
                                        </div>

                                        <div class="checkbox">
                                            @if(isset($item) && $item->home == 1)
                                                <?php $home = 'checked' ?>
                                            @else
                                                <?php $home = '' ?>
                                            @endif
                                            <input type="checkbox" data-size="small" data-type="home" data-src="{!! route('admin.pdt.postUpdateItem') !!}" value="1" name="home" {{ $home }}  class="js-switch updateItem" data-id="{!! $item->id !!}" data-color="#99d683"/> Trang chủ
                                        </div>
                                        <div class="checkbox">
                                            @if(isset($item) && $item->hot == 1)
                                                <?php $hot = 'checked' ?>
                                            @else
                                                <?php $hot = '' ?>
                                            @endif
                                            <input type="checkbox" data-size="small" data-type="home" data-src="{!! route('admin.pdt.postUpdateItem') !!}" value="1" name="hot" {{ $hot }}  class="js-switch updateItem" data-id="{!! $item->id !!}" data-color="#99d683"/>Sản phẩm Hot
                                        </div>

                                    </td>
                                    <td>
                                        <a href="{!! url('admin/pdt/edit/') !!}/{!! $item->id !!}" id="editItem"><i class="ti-pencil text-success"></i></a>
                                        <a href="javascript:void(0)" class="delItem" data-id="{!! $item->id !!}" data-link="{!! url('admin/pdt/delItem') !!}" data-msg="Bạn muốn xóa?"><i class="ti-trash text-danger"></i></a>
                                    </td>
                                </tr>
                                <?php $i++?>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
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
    <!-- icheck -->
    <script src="{!! url('public/admin/') !!}/plugins/bower_components/icheck/icheck.min.js"></script>
    <script src="{!! url('public/admin/') !!}/plugins/bower_components/icheck/icheck.init.js"></script>
    <!--slimscroll JavaScript -->
    <script src="{!! url('public/admin/assets') !!}/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="{!! url('public/admin/assets') !!}/js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{!! url('public/admin/assets') !!}/js/custom.min.js"></script>
    <script src="{!! url('public/admin') !!}/plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>
@endsection