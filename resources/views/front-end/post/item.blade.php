@if($post)
    <div class='col-xs-12 pull-right'>
        <?php echo $post->render(); ?>
    </div>
    @foreach($post as $item)
        <div class="white-box">
            <div class="comment-center">
                <div class="item-post">
                    <div class="comment-body col-sm-12">
                        <div class="user-img">
                            @if($item->u_avatar != '')
                            <img src="{{asset('public/upload/users/')}}/{{$item->u_avatar}}" alt="user" class="thumb-sm img-circle">
                            @else
                                <img src="{{asset('public/upload/users/')}}/no-avatar.png" alt="user" class="img-circle">
                            @endif
                        </div>
                        <div class="mail-contnet">
                            <h5 class="lys_user_name" data-id="" data-folow="{{$item->u_id}}"> {{$item->u_fullname?$item->u_fullname:$item->u_name}}
                                <span>
                                    <i class=" icon-eye m-r-5" style="color: #fdc006;"></i>
                                    <a href="javascript:void(0)" data-name="save_post" data-user="{{$item->u_id}}" data-post="{{$item->p_alias}}" data-title="theo dõi người đăng bài">Theo dõi người dùng</a>
                                </span>
                            </h5>
                            <ul class="list-inline text-right m-t-10">
                                <li>
                                    <h5><i class="icon-badge m-r-5" style="color: #fdc006;"></i><a href="javascript:void(0)" data-name="save_post" data-user="" data-post="">Lưu</a></h5>
                                </li>
                                <li>
                                    <h5>
                                        <i class=" icon-eye m-r-5" style="color: #fdc006;"></i>
                                        <a href="{{route('post.single',$item->p_alias)}}" data-name="save_post" data-user="{{$item->u_id}}" data-post="{{$item->p_alias}}" data-title="Chi tiết bài đăng">Chi tiết</a>
                                    </h5>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="comment-body col-sm-12">
                        <font class="mail-desc">
                            {!! trim($item->p_content)!!}
                        </font>
                        <ul class="list-inline text-right m-t-10">
                            <li>
                                <h5 data-location="" data-post>
                                    <i class="ti-location-pin text-blue m-r-5"></i>
                                    <a target="_blank" href="{{route('post.location',[replace($item->l_name),$item->l_id,$item->l_code,$item->l_parent])}}">{{$item->l_name}}</a>
                                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                    <a target="_blank" href="{{route('post.location',[replace($item->lc_name),$item->lc_id,$item->lc_code,$item->lc_parent])}}">{{$item->lc_name}}</a>
                                </h5>
                            </li>
                            <i class="fa fa-arrows-h" aria-hidden="true"></i>
                            <li>
                                <h5 data-location="" data-post>
                                    <i class="fa fa-bars text-blue m-r-5"></i>
                                    <a target="_blank" href="{{route('post.category',[$item->c_alias])}}">{{$item->c_name}}</a>
                                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                    <a target="_blank" href="{{route('post.category',[$item->cc_alias])}}">{{$item->cc_name}}</a>
                                </h5>
                            </li>
                        </ul>
                    </div>
                    <?php $imgz = json_decode($item->p_intro);?>
                    @if($imgz)
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-wrapper p-b-10 collapse in">
                                        @if(count($imgz) == 1)
                                        <a href="{!! url('public/upload/post') !!}/{{$imgz[0]}}" data-toggle="lightbox" data-gallery="{{$item->p_alias}}"><img class="img-responsive all studio" src="{!! url('public/upload/post') !!}/{{$imgz[0]}}"></a>
                                        @else
                                        <div class="owl-carousel owl-theme lys-owl-item">
                                            @foreach($imgz as $key=>$img)
                                            <div class="item">
                                                <a href="{!! url('public/upload/post') !!}/{{$img}}" data-toggle="lightbox" data-gallery="{{$item->p_alias}}">
                                                    <img class="owl-lazy img-responsive all studio" data-src="{!! url('public/upload/post') !!}/{{$img}}">
                                                </a>
                                            </div>
                                            @endforeach
                                        </div>
                                        @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="mail-content col-sm-12">
                        <span class="my-btn" data-like="" data-name="like" data-post="{{$item->p_alias}}">
                            <button type="button" class="fcbtn btn-success btn-circle btn-outline btn-1d"><i class="fa fa-thumbs-o-up"></i></button> 100
                        </span>
                        <span class="my-btn" data-dislike="" data-name="dislike" data-post="{{$item->p_alias}}">
                            <button type="button" class="fcbtn btn-warning btn-circle btn-outline btn-1d"><i class="fa fa-thumbs-o-down"></i></button> 100
                        </span>
                        <span class="my-btn commentf" data-comment="{{$item->p_alias}}" data-name="comment">
                            <button type="button" class="fcbtn btn-info btn-circle btn-outline btn-1d"><i class="icon-bubble"></i></button> comment
                        </span>
                        <span class="time pull-right time" data-time=""> <?php $date = date_create($item->p_created_at)?>{{  date_format($date,'d-m-Y H:i:s') }}</span>
                        <ul class="list-inline text-right m-t-5">
                            <button class="btn btn-facebook waves-effect btn-circle waves-light" type="button"> <i class="fa fa-facebook"></i>
                                    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{htmlspecialchars( route('post.single',$item->p_alias)) }}"></a>
                            </button>
                            <button class="btn btn-twitter waves-effect btn-circle waves-light" type="button"> <i class="fa fa-twitter"></i> </button>
                            <button class="btn btn-googleplus waves-effect btn-circle waves-light" type="button"> <i class="fa fa-google-plus"></i> </button>
                        </ul>
                    </div>

                </div>
            </div>
            <div class="comment-center fb-comment {{$item->p_alias}}">
                <!--<div class="comment-body">
                    <div class="user-img"> <img src="../plugins/images/users/pawandeep.jpg" alt="user" class="img-circle"></div>
                    <div class="mail-contnet">
                        <h5>Pavan kumar</h5>
                                <span class="mail-desc">
                                    Donec ac condimentum massa. Etiam pellentesque pretium lacus. Phasellus ultricies dictum suscipit. Aenean commodo dui pellentesque molestie feugiat.
                                </span>
                        <a href="javacript:void(0)" class="action"><i class="ti-check text-success"></i></a>
                        <span class="time pull-right">April 14, 2017</span>
                    </div>
                </div>-->
                <div class="col-sm-12">
                        <hr>
                        <a href="javascript:void(0)" class="commentclose" data="fb-comments">
                            <i><i class="fa fa-angle-up" aria-hidden="true"></i> Thu gọn </i>
                        </a>
                        <div class="fb-comments" width="100%"
                             data-href="{{route('post.single',$item->p_alias)}}"
                             data-numposts="5"></div>
                        <a href="javascript:void(0)" class="commentclose" data="fb-comments">
                            <i><i class="fa fa-angle-up" aria-hidden="true"></i> Thu gọn </i>
                        </a>
                    {{--<textarea name="comment_post" class="form-control comment_post" id="" cols="30" rows="10"></textarea>--}}
                </div>
            </div>
        </div>
    @endforeach
    <div class='col-xs-12 pull-right'>
        <?php echo $post->render(); ?>
    </div>
@else
    <div class="col-sm-12 col-xs-12">
        <p class="text-danger">Chưa có bài cho danh mục này !</p>
    </div>
@endif