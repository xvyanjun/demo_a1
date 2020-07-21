
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/admin/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p> chendahai</p>
                <a href="#"><i class="fa fa-circle text-success"></i> 在线</a>
            </div>
        </div>
        <ul class="sidebar-menu"  >
            <li class="header">菜单</li>
            <li id="admin-index"><a href="javascript:;"><i class="fa fa-dashboard"></i> <span>首页</span></a></li>

            <!-- 菜单 -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i>
                    <span>基本管理</span>
				            <span class="pull-right-container">
				       			<i class="fa fa-angle-left pull-right"></i>
				   		 	</span>
                </a>
                <ul class="treeview-menu">

                    <li id="admin-login">
                        <a href="{{url('/create')}}" target="iframe">
                            <i class="fa fa-circle-o"></i> 修改资料
                        </a>
                    </li>
                    <li id="admin-login">
                        <a href="password.html" target="iframe">
                            <i class="fa fa-circle-o"></i> 修改密码
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i>
                    <span>商品管理</span>
				            <span class="pull-right-container">
				       			<i class="fa fa-angle-left pull-right"></i>
				   		 	</span>
                </a>
                <ul class="treeview-menu">
                    <li id="admin-login">
                        <a href="/admin/goodsadd" target="iframe">
                            <i class="fa fa-circle-o"></i> 新增商品
                        </a>
                    </li>
                    <li id="admin-login">
                        <a href="/admin/goods" target="iframe">
                            <i class="fa fa-circle-o"></i> 商品管理
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i>
                    <span>分类管理</span>
				            <span class="pull-right-container">
				       			<i class="fa fa-angle-left pull-right"></i>
				   		 	</span>
                </a>
                <ul class="treeview-menu">
                    <li id="admin-login">
                        <a href="/admin/cateadd" target="iframe">
                            <i class="fa fa-circle-o"></i> 新增分类
                        </a>
                    </li>
                    <li id="admin-login">
                        <a href="/admin/cate" target="iframe">
                            <i class="fa fa-circle-o"></i> 分类管理
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i>
                    <span>品牌管理</span>
				            <span class="pull-right-container">
				       			<i class="fa fa-angle-left pull-right"></i>
				   		 	</span>
                </a>
                <ul class="treeview-menu">
                    <li id="admin-login">
                        <a href="/admin/brandadd" target="iframe">
                            <i class="fa fa-circle-o"></i> 新增品牌
                        </a>
                    </li>
                    <li id="admin-login">
                        <a href="/admin/brand" target="iframe">
                            <i class="fa fa-circle-o"></i> 品牌管理
                        </a>
                    </li>
                </ul>
            </li>
            <!-- 菜单 /-->

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>