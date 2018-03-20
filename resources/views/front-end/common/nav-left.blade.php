<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse slimscrollsidebar">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                <!-- input-group -->
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Tìm kiếm...">
                    <span class="input-group-btn"><button class="btn btn-default" type="button"><i class="fa fa-search"></i></button></span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="{{ url('') }}" class="waves-effect">
                    <i class="ti-home fa-fw" data-icon="v"></i>
                    <span class="hide-menu"> Trang chủ <span class="fa arrow"></span> </span>
                </a>
            </li>
            @if($cate_home)
                @foreach($cate_home as $item)
                    <li>
                        <a href="{{route('post.category',['name'=>$item['alias']])}}" class="waves-effect">
                            <i data-icon="7" class="{{$item['icon']}}"></i>
                            <span class="hide-menu ">{{$item['name']}}<span class="fa arrow"></span></span>
                        </a>
                        @if($item['child'])
                            <ul class="nav nav-second-level">
                                @foreach($item['child'] as $ite)
                                <li> <a href="{{route('post.category',['name'=>$ite['alias']])}}">{{$ite['name']}}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            @endif
            <li>
                <a href="{{url('san-pham-hot.html')}}" class="waves-effect p-hot"><i class="icon-fire fa-fw text-danger"></i> Hot</a>
            </li>
        </ul>
    </div>
</div>