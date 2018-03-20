<?php
/**
 * Auth     : Nguyễn Thành Đạt.
 * Email    : 'ntdat.tb@gmail.com'
 * Phone    : 0969.730.726
 * Website  : http://ariweb.net
 */
?>

@extends('admin.master')
@section('title',$title)
@section('module','Quản lý quản trị viên')
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
                        <th>Tên đăng nhập</th>
                        <th>Email</th>
                        <th>Tên hiển thị</th>
                        <th>#</th>
                        <th>Tùy chỉnh</th>
                        <th>Tùy chọn</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if($data)
                            <?php $i=1;?>
                            @foreach($data as $item)
                                <tr id="{!! $item->id !!}">
                                    <td>{!! $i !!}</td>
                                    <td>#{!! $item->id !!}</td>
                                    <td>{!! $item->name !!}</td>
                                    <td>{!! $item->email !!}</td>
                                    <td>{!! $item->fullname !!}</td>
                                    <td>{!! $item->fullname !!}</td>
                                    <td>
                                        <div class="checkbox">
                                            @if(isset($item) && $item->status == 1)
                                                <?php $status = 'checked' ?>
                                            @else
                                                <?php $status = '' ?>
                                            @endif
                                            <input type="checkbox" data-size="small" value="1" data-type="status" data-src="{!! route('admin.usr.postUpdateItem') !!}" name="status" {{ $status }}  class="js-switch updateItem" data-id="{!! $item->id !!}" data-color="#99d683"> Hiển thị
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{!! url('admin/usr/edit/') !!}/{!! $item->id !!}" id="editItem"><i class="ti-pencil text-success"></i></a>
                                        <a href="javascript:void(0)" class="delItem" data-id="{!! $item->id !!}" data-link="{!! url('admin/usr/delItem') !!}" data-msg="Bạn muốn xóa?"><i class="ti-trash text-danger"></i></a>
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