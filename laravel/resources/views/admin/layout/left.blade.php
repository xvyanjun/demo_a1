
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
                    <span>权限管理</span>
				            <span class="pull-right-container">
				       			<i class="fa fa-angle-left pull-right"></i>
				   		 	</span>
                </a>
                <ul class="treeview-menu">

                    <li id="admin-login">
                        <a href="{{url('/admin/power/create')}}" target="iframe">
                            <i class="fa fa-circle-o"></i> 权限添加
                        </a>
                    </li>
                    <li id="admin-login">
                        <a href="{{url('/admin/power/list')}}" target="iframe">
                            <i class="fa fa-circle-o"></i> 权限展示
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i>
                    <span>角色管理</span>
				            <span class="pull-right-container">
				       			<i class="fa fa-angle-left pull-right"></i>
				   		 	</span>
                </a>
                <ul class="treeview-menu">
                    <li id="admin-login">
                        <a href="{{url('/admin/role/create')}}" target="iframe">
                            <i class="fa fa-circle-o"></i> 角色添加
                        </a>
                    </li>
                    <li id="admin-login">
                        <a href="{{url('/admin/role/list')}}" target="iframe">
                            <i class="fa fa-circle-o"></i> 角色展示
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i>
                    <span>用户管理</span>
				            <span class="pull-right-container">
				       			<i class="fa fa-angle-left pull-right"></i>
				   		 	</span>
                </a>
                <ul class="treeview-menu">
                    <li id="admin-login">
                        <a href="{{url('/admin/user/list')}}" target="iframe">
                            <i class="fa fa-circle-o"></i> 用户列表
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i>
                    <span>友情链接管理</span>
				            <span class="pull-right-container">
				       			<i class="fa fa-angle-left pull-right"></i>
				   		 	</span>
                </a>
                <ul class="treeview-menu">
                    <li id="admin-login">
                        <a href="{{url('/admin/friend/create')}}" target="iframe">
                            <i class="fa fa-circle-o"></i> 友情链接添加
                        </a>
                    </li>
                </ul>
                <ul class="treeview-menu">
                    <li id="admin-login">
                        <a href="{{url('/admin/friend/list')}}" target="iframe">
                            <i class="fa fa-circle-o"></i> 友情链接展示
                        </a>
                    </li>
                </ul>
            </li>

            <!-- 菜单 /-->

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>