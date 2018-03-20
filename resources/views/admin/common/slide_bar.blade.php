<?php
/**
 * Auth     : Nguyễn Thành Đạt.
 * Email    : 'ntdat.tb@gmail.com'
 * Phone    : 0969.730.726
 * Website  : http://ariweb.net
 */
?>
<div class="navbar-default sidebar" role="navigation">

    <div class="sidebar-nav navbar-collapse slimscrollsidebar">
        <div class="user-profile">
            <div class="dropdown user-pro-body">
                <div><img src="{!! url('public/admin') !!}/plugins/images/users/varun.jpg" alt="user-img" class="img-circle"></div>
                <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button"
                   aria-haspopup="true" aria-expanded="false">{!! Auth::user()->name !!} <span class="caret"></span></a>
                <ul class="dropdown-menu animated flipInY">
                    <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                    <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>
                    <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="{!! url('admin/logout') !!}"><i class="fa fa-power-off"></i> Logout</a></li>
                </ul>
            </div>
        </div>

        <ul class="nav" id="side-menu">
            <li>
                <a href="{!! url('/admin') !!}" class="waves-effect"><i class="linea-icon linea-basic fa-fw" data-icon="v"></i>
                    <span class="hide-menu"> Trang chủ </span>
                </a>
            </li>
            <li class="nav-small-cap">--- Người dùng </li>
            <li>
                <a href="javascript:void(0);" class="waves-effect">
                    <i class="icon-people fa-fw"></i>
                    <span class="hide-menu">Quản trị viên<span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a href="{!! url('admin/adm/list') !!}">Danh sách</a></li>
                    <li><a href="{!! url('admin/adm/add') !!}">Thêm mới</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript:void(0);" class="waves-effect">
                    <i class="icon-people fa-fw"></i>
                    <span class="hide-menu">Thành viên<span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a href="{!! url('admin/usr/list') !!}">Danh sách</a></li>
                    <li><a href="{!! url('admin/usr/add') !!}">Thêm mới</a></li>
                </ul>
            </li>

            <li><a href="javascript:void(0);" class="waves-effect">
                    <i class="ti-clipboard fa-fw"></i>
                    <span class="hide-menu">Đơn hàng<span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a href="{!! url('admin/inv/list') !!}">Danh sách</a></li>
                    <li><a href="{!! url('admin/inv/add') !!}">Thêm mới</a></li>
                </ul>
            </li>

            <li class="nav-small-cap">--- Nhập liệu</li>
            <li><a href="javascript:void(0);" class="waves-effect">
                    <i class=" ti-menu fa-fw"></i>
                    <span class="hide-menu">Danh mục <span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a href="{!! url('admin/cte/list') !!}">Danh sách</a></li>
                    <li><a href="{!! url('admin/cte/add') !!}">Thêm mới</a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="waves-effect">
                    <i class="ti-server fa-fw"></i>
                    <span class="hide-menu">Quản lý sản phẩm <span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a href="{!! url('admin/pdt/list') !!}">Danh sách</a></li>
                    <li><a href="{!! url('admin/pdt/add') !!}">Thêm mới</a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="waves-effect">
                    <i class="icon-book-open fa-fw"></i>
                    <span class="hide-menu">Quản lý bài viết <span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a href="{!! url('admin/pst/list') !!}">Danh sách</a></li>
                    <li><a href="{!! url('admin/pst/add') !!}">Thêm mới</a></li>
                </ul>
            </li>

            <li class="nav-small-cap">--- Cài đặt </li>
            <li>
                <a href="javascript:void(0);" class="waves-effect">
                    <i class="icon-book-open fa-fw"></i>
                    <span class="hide-menu">Cài đặt <span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a href="{!! url('admin/stp/info') !!}">Thông tin</a></li>
                    <li><a href="{!! url('admin/stp/funWeb') !!}">Chức năng</a></li>
                    <li><a href="{!! url('admin/banner/list') !!}">Banner</a></li>
                </ul>
            </li>

        </ul>
    </div>
</div>
