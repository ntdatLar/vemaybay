<?php
/**
 * Auth     : Nguyễn Thành Đạt.
 * Email    : 'ntdat.tb@gmail.com'
 * Phone    : 0969.730.726
 * Website  : http://ariweb.net
 */
?>

@extends('admin.masterIndex')
@section('title','Chào mừng bạn đến với trang quản trị.')
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


        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">CRM Dashboard Page</h4>
                </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <a href="https://themeforest.net/item/elite-admin-responsive-dashboard-web-app-kit-/16750820" target="_blank" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Buy Now</a>
                    <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">CRM Dashboard</li>
                    </ol>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!--row -->
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="white-box">
                        <div class="r-icon-stats">
                            <i class="ti-user bg-danger"></i>
                            <div class="bodystate">
                                <h4>3564</h4>
                                <span class="text-muted">New Customers</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="white-box">
                        <div class="r-icon-stats">
                            <i class="ti-shopping-cart bg-info"></i>
                            <div class="bodystate">
                                <h4>342</h4>
                                <span class="text-muted">New Products</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="white-box">
                        <div class="r-icon-stats">
                            <i class="ti-wallet bg-success"></i>
                            <div class="bodystate">
                                <h4>56%</h4>
                                <span class="text-muted">Today's Profit</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="white-box">
                        <div class="r-icon-stats">
                            <i class="ti-star bg-inverse"></i>
                            <div class="bodystate">
                                <h4>56%</h4>
                                <span class="text-muted">New Leads</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/row -->
        </div>

@endsection
@section('scripts')
    <style>
        #editItem:hover ,#delItem:hover{
            background: #4F5467;
            transition: all 0.5s;
            color: #fff;
            border: none;
        }
        #editItem:hover i,#delItem:hover i{
            transition: all 0.5s;
            color: #fff;
        }
        #editItem ,#delItem{
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
        #editItem i,#delItem i{
            font-size: 15px;
        }
    </style>
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
            $(document).ready(function () {
                var table = $('#example').DataTable({
                    "columnDefs": [
                        {"visible": false, "targets": 2}
                    ],
                    "order": [[2, 'asc']],
                    "displayLength": 25,
                    "drawCallback": function (settings) {
                        var api = this.api();
                        var rows = api.rows({page: 'current'}).nodes();
                        var last = null;

                        api.column(2, {page: 'current'}).data().each(function (group, i) {
                            if (last !== group) {
                                $(rows).eq(i).before(
                                    '<tr class="group"><td colspan="5">' + group + '</td></tr>'
                                );

                                last = group;
                            }
                        });
                    }
                });
                // Order by the grouping
                $('#example tbody').on('click', 'tr.group', function () {
                    var currentOrder = table.order()[0];
                    if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                        table.order([2, 'desc']).draw();
                    }
                    else {
                        table.order([2, 'asc']).draw();
                    }
                });
            });
        });
        $('#example23').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    </script>
@endsection