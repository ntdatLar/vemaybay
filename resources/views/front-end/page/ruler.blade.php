@extends('front-end.index')
@section('style')
    <!-- toast CSS -->
    <link href="{!! url('public/home/') !!}/plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- Popup CSS -->
    <link href="{!! url('public/home/') !!}/plugins/bower_components/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="{!! url('public/home/') !!}/plugins/bower_components/dropzone-master/dist/dropzone.css" rel="stylesheet" type="text/css" />

    <link href="{!! url('public/home/') !!}/plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <link href="{!! url('public/home/') !!}/plugins/bower_components/owl.carousel/owl.carousel.min.css" rel="stylesheet" type="text/css" />
    <link href="{!! url('public/home/') !!}/plugins/bower_components/owl.carousel/owl.theme.default.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <!-- /.row -->
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="white-box">
                <div class="row row-in">
                    <div class="col-lg-3 col-sm-6 row-in-br">
                        <div class="col-in row">
                            <div class="col-md-12 col-sm-12 col-xs-12 text-center fcbtn btn btn-danger btn-outline btn-1e">
                                <i data-icon="E" class="linea-icon linea-basic"></i>

                               <p>Hàng triệu <br>sản phẩm được giao bán</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 row-in-br  b-r-none">
                        <div class="col-in row">
                            <div class="col-md-12 col-sm-12 col-xs-12 text-center fcbtn btn btn-info btn-outline btn-1e">
                                <i data-icon="E" class="icon-people"></i>

                                <p>Hơn 10.000 <br>Thành viên</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 row-in-br">
                        <div class="col-in row">
                            <div class="col-md-12 col-sm-12 col-xs-12 text-center fcbtn btn btn-warning btn-outline btn-1e">
                                <i data-icon="E" class="icon-bubble"></i>

                                <p>Chat online <br>cho người bán.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6  b-0">
                        <div class="col-in row">
                            <div class="col-md-12 col-sm-12 col-xs-12 text-center fcbtn btn btn-success btn-outline btn-1e">
                                <i data-icon="E" class="ti-user"></i>
                                <p>Hơn 1000 <br>tin tuyển dụng.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--row -->
    <!-- /.row -->
    <div class="row">
        <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
            <div class="white-box">
                <div class="row">
                    <a class="popup-with-form fcbtn btn btn-outline btn-success btn-1e text-center" style="width: 100%;text-transform: uppercase" href="#test-form"><i class="fa fa-star fa-spin" aria-hidden="true"></i> Đăng tin</a>
                    <!-- form itself -->
                    <!-- /.row -->
                    <div id="test-form" class="mfp-hide white-popup-block lys-popup">
                        <form action="javascript:void(0)" class="horizontal" name="data-post">
                            <div class="form-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <select class="form-control">
                                                        <option value="Category 1">Category 1</option>
                                                        <option value="Category 2">Category 2</option>
                                                        <option value="Category 3">Category 5</option>
                                                        <option value="Category 4">Category 4</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <select class="form-control">
                                                        <option value="Category 1">Category 1</option>
                                                        <option value="Category 2">Category 2</option>
                                                        <option value="Category 3">Category 5</option>
                                                        <option value="Category 4">Category 4</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <select class="form-control">
                                                        <option value="Category 1">Category 1</option>
                                                        <option value="Category 2">Category 2</option>
                                                        <option value="Category 3">Category 5</option>
                                                        <option value="Category 4">Category 4</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <select class="form-control">
                                                        <option value="Category 1">Category 1</option>
                                                        <option value="Category 2">Category 2</option>
                                                        <option value="Category 3">Category 5</option>
                                                        <option value="Category 4">Category 4</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" id="textarea" placeholder="Bạn đăng gì ?"></textarea>
                                </div>
                            </div>
                        </form>
                        <form action="{{ route('user.post') }}" data-ac="{{ route('user.post') }}" method="POST" data-method="POST" class="dropzone" id="file_dropzone" name="images-post" enctype="multipart/form-data">
                            <input type="text" hidden name="_token" value="{{ csrf_token() }}">
                            <div class="fallback">
                                <input name="file[]" type="file" id="test_filez" multiple data-dz-remove/>
                            </div>
                        </form>
                        <form action="javascript:void(0)" class="horizontal" name="submit-post" enctype="multipart/form-data">
                            <input name="az[]" type="file" id="test_file" multiple data-dz-remove/>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                                <br>
                                                <button type="submit" class="btn btn-success pull-right"> <i class="fa fa-check"></i> Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12  col-sm-12 col-xs-12">
                    <h4 href="#" class="btn btn-danger btn-block waves-effect waves-light">Địa điểm tìm kiếm </h4>
                    <div id="treeview-searchable" class="treeview">

                    </div>
                    <hr class="m-t-5">
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
            <hr class="m-t-5">

            @for($i=0;$i<10;$i++)
            <div class="white-box">
                <div class="comment-center">
                    <div class="item-post">
                        <div class="comment-body col-sm-12">
                            <div class="user-img">
                                <img src="{!! url('public/home/') !!}/plugins/images/users/pawandeep.jpg" alt="user" class="img-circle">
                            </div>
                            <div class="mail-contnet">
                                <h5 class="lys_user_name" data-id="" data-folow="">Pavan kumar
                                    <span><i class=" icon-eye m-r-5" style="color: #fdc006;"></i><a href="javascript:void(0)" data-name="save_post" data-user="" data-post="" data-title="theo dõi người đăng bài">Theo dõi</a></span>
                                </h5>
                                <ul class="list-inline text-right m-t-10">
                                    <li>
                                        <h5 data-location="" data-post><i class="ti-location-pin text-blue m-r-5"></i> <a href="{{ url('san-pham-dia-diem.html') }}">TP.HCM</a></h5>
                                    </li>
                                    <li>
                                        <h5><i class="icon-badge m-r-5" style="color: #fdc006;"></i><a href="javascript:void(0)" data-name="save_post" data-user="" data-post="">Lưu</a></h5>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <p class="mail-desc">
                                Donec ac condimentum massa. Etiam pellentesque pretium lacus. Phasellus ultricies dictum suscipit. Aenean commodo dui pellentesque molestie feugiat.
                            </p>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-wrapper p-b-10 collapse in">
                                        <div class="owl-carousel owl-theme lys-owl-item">
                                            <div class="item"><img class="owl-lazy" data-src="{!! url('public/home/') !!}/plugins/images/big/img1.jpg" alt="Owl Image"></div>
                                            <div class="item"><img class="owl-lazy" data-src="{!! url('public/home/') !!}/plugins/images/big/img2.jpg" alt="Owl Image"></div>
                                            <div class="item"><img class="owl-lazy" data-src="{!! url('public/home/') !!}/plugins/images/big/img3.jpg" alt="Owl Image"></div>
                                            <div class="item"><img class="owl-lazy" data-src="{!! url('public/home/') !!}/plugins/images/big/img4.jpg" alt="Owl Image"></div>
                                            <div class="item"><img class="owl-lazy" data-src="{!! url('public/home/') !!}/plugins/images/big/img5.jpg" alt="Owl Image"></div>
                                            <div class="item"><img class="owl-lazy" data-src="{!! url('public/home/') !!}/plugins/images/big/img6.jpg" alt="Owl Image"></div>
                                            <div class="item-video">
                                                <iframe src="https://www.youtube.com/embed/6TUOSBPCygs?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mail-content col-sm-12">
                            <span data-like="" data-name="like">
                                    <button type="button" class="fcbtn btn-success btn-circle btn-outline btn-1d"><i class="fa fa-thumbs-o-up"></i></button> 100
                                </span>
                                <span data-dislike="" data-name="dislike">
                                    <button type="button" class="fcbtn btn-warning btn-circle btn-outline btn-1d"><i class="fa fa-thumbs-o-down"></i></button> 100
                                </span>
                                <span data-comment="" data-name="comment">
                                    <button type="button" class="fcbtn btn-info btn-circle btn-outline btn-1d"><i class="icon-bubble"></i></button> comment
                                </span>
                            <span class="time pull-right time" data-time="">April 14, 2017</span>
                            <ul class="list-inline text-right m-t-5">
                                <button class="btn btn-facebook waves-effect btn-circle waves-light" type="button"> <i class="fa fa-facebook"></i> </button>
                                <button class="btn btn-twitter waves-effect btn-circle waves-light" type="button"> <i class="fa fa-twitter"></i> </button>
                                <button class="btn btn-googleplus waves-effect btn-circle waves-light" type="button"> <i class="fa fa-google-plus"></i> </button>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            @endfor
        </div>
        <div class="col-md-3 col-lg-3 col-sm-16 col-xs-12">
            <div class="row">
                <div class="col-lg-12 col-md-12  col-sm-12 col-xs-12 inbox-panel">
                    <div>
                        <a href="#" class="btn btn-custom btn-block waves-effect waves-light">Top tìm kiếm </a>
                        <div class="list-group mail-list m-t-20">
                            <a href="inbox.html" class="list-group-item active">Iphone</a>
                            <a href="inbox.html" class="list-group-item active">Macbook</a>
                            <a href="inbox.html" class="list-group-item active">Ipad 2</a>
                            <a href="inbox.html" class="list-group-item active">Suface</a>
                            <hr class="m-t-5">
                        </div>
                    </div>
                </div>
            </div>
            <div class="white-box">
                <div class="row">
                    <div class="col-lg-12 col-md-12  col-sm-12 col-xs-12 inbox-panel">
                        <div class="row">
                            <a href="javascript:void(0)" class="btn btn-custom btn-block waves-effect waves-light">Nhắn tin hỗ trợ </a>
                            <div class="embed-responsive embed-responsive-16by9" style="min-height: 300px">
                                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FAlatit-1648128595218269%2F&tabs=messages&width=280&height=300&small_header=true&adapt_container_width=true&hide_cover=true&show_facepile=false&appId=396643477197534" width="300" height="300" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12  col-sm-12 col-xs-12 inbox-panel">
                    <div>
                        <a href="#" class="btn btn-custom btn-block waves-effect waves-light">Bài đăng mới nhất </a>
                        <div class="steamline">
                            @for($i=0;$i<5;$i++)
                            <div class="sl-item">
                                <div class="sl-left">
                                    <a href="">
                                        <img class="img-circle" alt="user" src="{!! url('public/home/') !!}/plugins/images/users/genu.jpg">
                                    </a>
                                </div>
                                <div class="sl-right">
                                    <div><a href="#">Gohn Doe</a> <span class="sl-date">5 minutes ago</span></div>
                                    <a class="text-dark" href="">Contrary to popular belief
                                    </a>
                                </div>
                            </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--row -->
    <!-- row -->
    <hr class="m-t-5">
    <div class="white-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-l-0 p-r-0">
                        <div class="white-box">
                            <h4 class="box-title">Gửi yêu cầu cho chúng tôi</h4>
                            <form class="form-horizontal form-agent-inq">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" placeholder="Phone">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="email" class="form-control" placeholder="E-Mail">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <textarea class="form-control" rows="3" placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-danger btn-rounded pull-right">Submit Request</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="white-box">
                        <h4 class="box-title">Tin tức</h4>
                        <div class="pro-list">
                            <div class="pro-img p-r-10">
                                <a href="javascript:void(0)">
                                    <img src="{!! url('public/home/') !!}/plugins/images/property/prop1.jpeg" alt="property" style="width: 100px; height: 66px;">
                                </a>
                            </div>
                            <div class="pro-detail">
                                <h5 class="m-t-0 m-b-5">
                                    <a href="javascript:void(0)">4 BHK Avenue Street, Mountain View</a>
                                </h5>
                                <p class="text-muted font-12">Oct 07, 2015 | Jon Doe</p>
                            </div>
                        </div>
                        <div class="pro-list">
                            <div class="pro-img p-r-10">
                                <a href="javascript:void(0)">
                                    <img src="{!! url('public/home/') !!}/plugins/images/property/prop2.jpeg" alt="property" style="width: 100px; height: 66px;">
                                </a>
                            </div>
                            <div class="pro-detail">
                                <h5 class="m-t-0 m-b-5">
                                    <a href="javascript:void(0)">3 BHK 221B Baker Street, London</a>
                                </h5>
                                <p class="text-muted font-12">Jun 21, 2017 | Jon Doe</p>
                            </div>
                        </div>
                        <div class="pro-list">
                            <div class="pro-img p-r-10">
                                <a href="javascript:void(0)">
                                    <img src="{!! url('public/home/') !!}/plugins/images/property/prop3.jpeg" alt="property" style="width: 100px; height: 66px;">
                                </a>
                            </div>
                            <div class="pro-detail">
                                <h5 class="m-t-0 m-b-5">
                                    <a href="javascript:void(0)">5 BHK Manhattan, New York</a>
                                </h5>
                                <p class="text-muted font-12">Jan 11, 2017 | Jon Doe</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <a href="javascript:void(0);" class="btn btn-sm btn-rounded btn-info m-t-10">xem tất cả...</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
@endsection
@section('script')
    <style>
        .lys-popup .mfp-close{
            width: 30px;
            height: 30px;
            line-height: 30px;
            z-index: 50 !important;
            color: #ac2925 !important;
        }
        .white-popup-block{
            /*margin-top: 300px;*/
        }
        .emojionearea-search{
            display: none;
        }
    </style>
    <!--Counter js -->
    <script src="{!! url('public/home/') !!}/plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
    <script src="{!! url('public/home/') !!}/plugins/bower_components/counterup/jquery.counterup.min.js"></script>
    <!--Morris JavaScript -->
    <script src="{!! url('public/home/') !!}/plugins/bower_components/raphael/raphael-min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{!! url('public/home/') !!}/assets/js/custom.min.js"></script>
    <!-- Treeview Plugin JavaScript -->
    <script src="{!! url('public/home/') !!}/plugins/bower_components/bootstrap-treeview-master/dist/bootstrap-treeview.min.js"></script>
    <script>
        var catedata = [
            {
                text: 'HCM',
                href: '#parent1',
                tags: ['4'],
                nodes: [
                    {
                        text: 'Child 1',
                        href: '#child1',
                        tags: ['2'],
                        nodes: [
                            {
                                text: 'Grandchild 1',
                                href: '#grandchild1',
                                tags: ['0']
                            },
                            {
                                text: 'Grandchild 2',
                                href: '#grandchild2',
                                tags: ['0']
                            }
                        ]
                    },
                    {
                        text: 'Child 2',
                        href: '#child2',
                        tags: ['2']
                    }
                ]
            },
            {
                text: 'Parent 2',
                href: '#parent2',
                tags: ['0']
            },
            {
                text: 'Parent 3',
                href: '#parent3',
                tags: ['0']
            },
            {
                text: 'Parent 4',
                href: '#parent4',
                tags: ['0']
            },
            {
                text: 'Parent 5',
                href: '#parent5'  ,
                tags: ['0']
            }
        ];
    </script>
    <script src="{!! url('public/home/') !!}/plugins/bower_components/bootstrap-treeview-master/dist/bootstrap-treeview-init.1a3.delaye"></script>
    <!-- Sparkline chart JavaScript -->
    <script src="{!! url('public/home/') !!}/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="{!! url('public/home/') !!}/plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js"></script>
    <script src="{!! url('public/home/') !!}/plugins/bower_components/dropzone-master/dist/dropzone.js"></script>
    <script src="{!! url('public/home/') !!}/plugins/bower_components/toast-master/js/jquery.toast.js"></script>
    <script src="{!! url('public/home/') !!}/plugins/bower_components/owl.carousel/owl.carousel.min.js"></script>
    <script src="{!! url('public/home/') !!}/plugins/bower_components/owl.carousel/owl.custom.js"></script>
    <!-- Magnific popup JavaScript -->
    <script src="{!! url('public/home/') !!}/plugins/bower_components/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
    <script src="{!! url('public/home/') !!}/plugins/bower_components/Magnific-Popup-master/dist/jquery.magnific-popup-init.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            /*file_dropzone*/
            /*$.toast({
                heading: 'Welcome to Elite admin',
                text: 'Use the predefined ones, or specify a custom position object.',
                position: 'top-right',
                loaderBg: '#ff6849',
                icon: 'info',
                hideAfter: 3500,

                stack: 6
            })*/
        });
    </script>
@endsection
