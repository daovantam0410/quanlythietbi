<aside id="left-panel" class="left-panel" >
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header" class="sticky-top">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                    aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="quan-tri"><img src="admin_asset/images/logo.png" alt="Logo"></a>
            <a class="navbar-brand hidden" href="#"><img src="admin_asset/images/logo2.png" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse" class="sticky-top">
            <ul class="nav navbar-nav">
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false"><i class="menu-icon fa fa-list"></i>Quản lý tiêu đề</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-puzzle-piece"></i><a href="listcategory">Danh sách tiêu đề</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false"><i class="menu-icon fa fa-list"></i>Quản lý hãng</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-puzzle-piece"></i><a href="listsub">Danh sách hãng</a></li>
                    </ul>
                </li>
                <!-- <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false"><i class="menu-icon fa fa-list"></i>Quản lý khách hàng</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-puzzle-piece"></i><a href="{{url('danh-sach-khach-hang')}}">Danh sách khách hàng</a></li>
                    </ul>
                </li> -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false"><i class="menu-icon fa fa-list"></i>Quản lý sản phẩm</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-puzzle-piece"></i><a href="listproduct">Danh sách sản phẩm</a></li>
                    </ul>
                </li>
                
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false"><i class="menu-icon fa fa-list"></i>Quản lý giỏ hàng</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-puzzle-piece"></i><a href="{{url('danh-sach-don-hang-chua-xu-ly')}}">Danh sách đơn hàng</a></li>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false"><i class="menu-icon fa fa-list"></i>Quản lý thành viên</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-puzzle-piece"></i><a href="listusers">Danh sách thành viên</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false"><i class="menu-icon fa fa-list"></i>Quản lý quyền truy cập</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-puzzle-piece"></i><a href="listroles">Danh sách quyền truy cập</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="{{url('thong-ke-doanh-thu')}}"><i class="menu-icon fa fa-list"></i>Báo cáo thống kê</a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->
