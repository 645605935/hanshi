<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title><?php echo ($web_set['title']); ?></title>
		<meta name="keywords" content="<?php echo ($web_set['keywords']); ?>" />
		<meta name="description" content="<?php echo ($web_set['description']); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<style type="text/css">
			#nav-search{display: none;}
			.main-container-inner{overflow: hidden;}
			.ui-dialog{min-width: 640px!important;}
			.layui-form-label{width: 125px!important;}
			#search_table .layui-form-label{width: auto!important;}
			#search_table .layui-form-item{margin-bottom: 0px!important;}
			.page-content{padding: 8px 20px 0!important;}
		</style>
		<script type="text/javascript">
			var api_url="<?php echo ($web_set["ip"]); ?>";
			var img_host="<?php echo ($web_set["img_host"]); ?>";
			var in_url="<?php echo ($web_set["in_url"]); ?>";
			var grid_selector = "#grid-table";
			var pager_selector = "#grid-pager";
			var login_user="<?php echo ($user["username"]); ?>";
		</script>


		<style type="text/css">
			#sidebar-shortcuts{display: none;}
			#breadcrumbs{display: none;}
		</style>

    <!-- basic styles -->
    <link href="/hanshi/Public/Admin/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/hanshi/Public/Admin/assets/css/font-awesome.min.css" />

    <!--[if IE 7]>
      <link rel="stylesheet" href="/hanshi/Public/Admin/assets/css/font-awesome-ie7.min.css" />
    <![endif]-->

    <!-- page specific plugin styles -->
    <link rel="stylesheet" href="/hanshi/Public/Admin/assets/css/jquery-ui-1.10.3.custom.min.css" />
    <link rel="stylesheet" href="/hanshi/Public/Admin/assets/css/chosen.css" />
    <link rel="stylesheet" href="/hanshi/Public/Admin/assets/css/datepicker.css" />
    <link rel="stylesheet" href="/hanshi/Public/Admin/assets/css/bootstrap-timepicker.css" />
    <link rel="stylesheet" href="/hanshi/Public/Admin/assets/css/daterangepicker.css" />
    <link rel="stylesheet" href="/hanshi/Public/Admin/assets/css/colorpicker.css" />
    
    <!-- 模块jqgrid  start -->
    <link rel="stylesheet" href="/hanshi/Public/Admin/assets/css/jquery-ui-1.10.3.full.min.css" />
    <link rel="stylesheet" href="/hanshi/Public/Admin/assets/css/datepicker.css" />
    <link rel="stylesheet" href="/hanshi/Public/Admin/assets/css/ui.jqgrid.css" />
    <!-- 模块jqgrid  end -->

    <!-- fonts -->
    <link rel="stylesheet" type="text/css" href="/hanshi/Public/Admin/assets/css/google_font_css.css">

    <!-- ace styles -->
    <link rel="stylesheet" href="/hanshi/Public/Admin/assets/css/ace.min.css" />
    <link rel="stylesheet" href="/hanshi/Public/Admin/assets/css/ace-rtl.min.css" />
    <link rel="stylesheet" href="/hanshi/Public/Admin/assets/css/ace-skins.min.css" />

    <!-- jQuery smartMenu右键自定义上下文菜单插件  start -->
    <link rel="stylesheet" href="/hanshi/Public/Admin/jquery-smartMenu/css/smartMenu.css" type="text/css" />
    <!-- jQuery smartMenu右键自定义上下文菜单插件  end -->

    <link rel="stylesheet" href="/hanshi/Public/Admin/layui-v1.0.4/layui/css/layui.css"  media="all">
    <link rel="stylesheet" href="/hanshi/Public/Admin/css/my_diy_css.css"  media="all">

    <!--[if lte IE 8]>
      <link rel="stylesheet" href="/hanshi/Public/Admin/assets/css/ace-ie.min.css" />
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->

    <script src="/hanshi/Public/Admin/assets/js/ace-extra.min.js"></script>
    <script src="/hanshi/Public/Admin/assets/js/jquery.min.js"></script>
    <!-- layui.js   -->
    <script src="/hanshi/Public/Admin/layui-v1.0.4/layui/layui.js"></script>
    <script src="/hanshi/Public/layer/layer.js"></script>
<script>

  

</script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->



    <!--[if lt IE 9]>

    <script src="/hanshi/Public/Admin/assets/js/html5shiv.js"></script>

    <script src="/hanshi/Public/Admin/assets/js/respond.min.js"></script>

    <![endif]-->

  </head>

  <body>
    <div class="navbar navbar-default" id="navbar">
      <script type="text/javascript">
	try{ace.settings.check('navbar' , 'fixed')}catch(e){}
</script>

			

			<div class="navbar-container" id="navbar-container">
				<div class="navbar-header pull-left">
					<a href="#" class="navbar-brand" style="background:url('/hanshi/Uploads/<?php echo ($web_set['logo']); ?>') left 5px;background-size:35px 35px;background-repeat:no-repeat;">
						<small style="margin-left:34px;">
							<!-- <i class="icon-leaf"></i> -->
							<?php echo ($web_set['title']); ?>
						</small>
					</a><!-- /.brand -->
				</div><!-- /.navbar-header -->

				<div class="navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="grey" style="display: none;">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="icon-tasks"></i>
								<span class="badge badge-grey">4</span>
							</a>

							<!-- <ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="icon-ok"></i>
									4 Tasks to complete
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">Software Update</span>
											<span class="pull-right">65%</span>
										</div>

										<div class="progress progress-mini ">
											<div style="width:65%" class="progress-bar "></div>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">Hardware Upgrade</span>
											<span class="pull-right">35%</span>
										</div>

										<div class="progress progress-mini ">
											<div style="width:35%" class="progress-bar progress-bar-danger"></div>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">Unit Testing</span>
											<span class="pull-right">15%</span>
										</div>

										<div class="progress progress-mini ">
											<div style="width:15%" class="progress-bar progress-bar-warning"></div>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">Bug Fixes</span>
											<span class="pull-right">90%</span>
										</div>

										<div class="progress progress-mini progress-striped active">
											<div style="width:90%" class="progress-bar progress-bar-success"></div>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										See tasks with details
										<i class="icon-arrow-right"></i>
									</a>
								</li>

							</ul> -->

						</li>

						<li class="purple" style="display: none;">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="icon-bell-alt icon-animated-bell"></i>
								<span class="badge badge-important">8</span>
							</a>

							<!-- <ul class="pull-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="icon-warning-sign"></i>
									8 Notifications
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-xs no-hover btn-pink icon-comment"></i>
												New Comments
											</span>
											<span class="pull-right badge badge-info">+12</span>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										<i class="btn btn-xs btn-primary icon-user"></i>
										Bob just signed up as an editor ...
									</a>
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-xs no-hover btn-success icon-shopping-cart"></i>
												New Orders
											</span>
											<span class="pull-right badge badge-success">+8</span>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-xs no-hover btn-info icon-twitter"></i>
												Followers
											</span>
											<span class="pull-right badge badge-info">+11</span>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										See all notifications
										<i class="icon-arrow-right"></i>
									</a>
								</li>
							</ul> -->
						</li>

						<li class="green" style="display: none;">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="icon-envelope icon-animated-vertical"></i>
								<span class="badge badge-success">5</span>
							</a>

							<!-- <ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="icon-envelope-alt"></i>
									5 Messages
								</li>

								<li>
									<a href="#">
										<img src="/hanshi/Public/Admin/assets/avatars/avatar.png" class="msg-photo" alt="Alex's Avatar" />
										<span class="msg-body">
											<span class="msg-title">
												<span class="blue">Alex:</span>
												Ciao sociis natoque penatibus et auctor ...
											</span>
											<span class="msg-time">
												<i class="icon-time"></i>
												<span>a moment ago</span>
											</span>
										</span>
									</a>
								</li>

								<li>
									<a href="#">
										<img src="/hanshi/Public/Admin/assets/avatars/avatar3.png" class="msg-photo" alt="Susan's Avatar" />
										<span class="msg-body">
											<span class="msg-title">
												<span class="blue">Susan:</span>
												Vestibulum id ligula porta felis euismod ...
											</span>
											<span class="msg-time">
												<i class="icon-time"></i>
												<span>20 minutes ago</span>
											</span>
										</span>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="/hanshi/Public/Admin/assets/avatars/avatar4.png" class="msg-photo" alt="Bob's Avatar" />
										<span class="msg-body">
											<span class="msg-title">
												<span class="blue">Bob:</span>
												Nullam quis risus eget urna mollis ornare ...
											</span>
											<span class="msg-time">
												<i class="icon-time"></i>
												<span>3:15 pm</span>
											</span>
										</span>
									</a>
								</li>
								<li>
									<a href="inbox.html">
										See all messages
										<i class="icon-arrow-right"></i>
									</a>
								</li>
							</ul> -->
						</li>



						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<?php if($user['gid'] == 4 || $user['gid'] == 3): ?><img class="nav-user-photo" src="/hanshi/Uploads/<?php echo ($user["logo"]); ?>" alt="Jason's Photo" />
									<span class="user-info">
										<small><?php echo ($user["school"]); ?>,</small>
										<?php echo ($user["username"]); ?>
									</span>
								<?php else: ?>
									<img class="nav-user-photo" src="/hanshi/Public/Admin/assets/avatars/user.jpg" alt="Jason's Photo" />
									<span class="user-info">
										<small><?php echo ($user["group"]); ?>,</small>
										<?php echo ($user["username"]); ?>
									</span><?php endif; ?>
								<i class="icon-caret-down"></i>
							</a>
							<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="<?php echo U('Admin/User/resetPasswordMyself');?>">
										<i class="icon-cog"></i>
										修改密码
									</a>
								</li>

								<li class="divider"></li>
								<li>
									<a href="<?php echo U('Admin/Login/logout');?>">
										<i class="icon-off"></i>
										退出
									</a>
								</li>
							</ul>

						</li>

					</ul><!-- /.ace-nav -->

				</div><!-- /.navbar-header -->

			</div><!-- /.container -->

    </div>

    <div class="main-container" id="main-container">

      <script type="text/javascript">
        try{ace.settings.check('main-container' , 'fixed')}catch(e){}
      </script>

      <div class="main-container-inner">
        <a class="menu-toggler" id="menu-toggler" href="#">
          <span class="menu-text"></span>
        </a>

        <!-- 左侧菜单栏 start-->
        <div class="sidebar" id="sidebar">
          <script type="text/javascript">
  try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
</script>

  <div class="sidebar-shortcuts" id="sidebar-shortcuts">
    <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
      <button class="btn btn-success">
        <i class="icon-signal"></i>
      </button>
      <button class="btn btn-info">
        <i class="icon-pencil"></i>
      </button>
      <button class="btn btn-warning">
        <i class="icon-group"></i>
      </button>
      <button class="btn btn-danger">
        <i class="icon-cogs"></i>
      </button>
    </div>

    <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
      <span class="btn btn-success"></span>
      <span class="btn btn-info"></span>
      <span class="btn btn-warning"></span>
      <span class="btn btn-danger"></span>
    </div>

  </div><!-- #sidebar-shortcuts -->


  <ul class="nav nav-list">

    <?php if( name_to_status('Index') == 1 && $user['gid']==427 || in_array('Index', $user['auth_controller_names'])){ ?>
      <li <?php if($cur_c == 'Index'): ?>class="active open"<?php endif; ?>>
        <a href="#" class="dropdown-toggle">
          <i class="icon-dashboard"></i>
          <span class="menu-text"> 我的面板 </span>
          <b class="arrow icon-angle-down"></b>
        </a>

        <ul class="submenu">
          <?php if( name_to_status('Admin/Index/index') == 1 && $user['gid']==427 || in_array('Admin/Index/index', $user['auth_action_names'])){ ?>
          <li <?php if($cur_v == 'Index-index'): ?>class="active"<?php endif; ?>>
            <a href="<?php echo U('Admin/Index/index');?>" page="Admin/Index/index" title="index">
              <i class="icon-double-angle-right"></i>
              首页
            </a>
          </li>
          <?php } ?>
        </ul>

      </li>
    <?php } ?>

    

    <?php if( name_to_status('Config') == 1 && $user['gid']==427 || in_array('Config', $user['auth_controller_names'])){ ?>
    <li <?php if($cur_c == 'Config'): ?>class="active open"<?php endif; ?> style="display:none;">
      <a href="#" class="dropdown-toggle">
        <i class="icon-film"></i>
        <span class="menu-text"> 网站设置 </span>
        <b class="arrow icon-angle-down"></b>
      </a>

      <ul class="submenu">
        <?php if( name_to_status('Admin/Config/setting') == 1 && $user['gid']==427 || in_array('Admin/Config/setting', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'Config-setting'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/Config/setting');?>" page="Admin/Config/setting" title="setting" data-title="网站设置">
            <i class="icon-double-angle-right"></i>
            网站设置
          </a>
        </li>
        <?php } ?>
      </ul>

    </li>
    <?php } ?>

    

 <!--    <?php if( name_to_status('AuthManager') == 1 && $user['gid']==427 || in_array('AuthManager', $user['auth_controller_names'])){ ?>
    <li <?php if($cur_c == 'AuthManager'): ?>class="active open"<?php endif; ?> style="display:none;">
      <a href="#" class="dropdown-toggle">
        <i class="icon-group"></i>
        <span class="menu-text"> 用户组管理 </span>
        <b class="arrow icon-angle-down"></b>
      </a>

      <ul class="submenu">
        <?php if( name_to_status('Admin/AuthManager/index') == 1 && $user['gid']==427 || in_array('Admin/AuthManager/index', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'AuthManager-index'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/AuthManager/index');?>" page="Admin/AuthManager/index" title="index" data-title="用户组列表">
            <i class="icon-double-angle-right"></i>
            用户组列表
          </a>
        </li>
        <?php } ?>
      </ul>
    </li>
    <?php } ?> -->

    
<!-- 
    <?php if( name_to_status('User') == 1 && $user['gid']==427 || in_array('User', $user['auth_controller_names'])){ ?>
    <li <?php if($cur_c == 'User'): ?>class="active open"<?php endif; ?> style="display:none;">
      <a href="#" class="dropdown-toggle">
        <i class="icon-eye-open"></i>
        <span class="menu-text"> 
		          用户管理
        </span>
        <b class="arrow icon-angle-down"></b>
      </a>

      <ul class="submenu">
        <?php if( name_to_status('Admin/User/homeUser') == 1 && $user['gid']==427 || in_array('Admin/User/homeUser', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'User-homeUser'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/User/homeUser');?>" page="Admin/User/homeUser" title="homeUser" data-title="用户列表">
            <i class="icon-double-angle-right"></i>
            用户列表
          </a>
        </li>
        <?php } ?>

        <?php if( name_to_status('Admin/User/userAdd') == 1 && $user['gid']==427 || in_array('Admin/User/userAdd', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'User-userAdd'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/User/userAdd');?>" page="Admin/User/userAdd" title="userAdd" data-title="添加系统用户">
            <i class="icon-double-angle-right"></i>
            添加系统用户
          </a>
        </li>
        <?php } ?>

        <?php if( name_to_status('Admin/User/usersAdd') == 1 && $user['gid']==427 || in_array('Admin/User/usersAdd', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'User-usersAdd'): ?>class="active"<?php endif; ?> <?php if($user['gid'] == 1): ?>style="display:none;"<?php elseif($user['gid'] == 2): ?>style="display:none;"<?php endif; ?>>
          <a href="<?php echo U('Admin/User/usersAdd');?>" page="Admin/User/usersAdd" title="usersAdd" data-title="批量添加学生">
            <i class="icon-double-angle-right"></i>
            批量添加学生
          </a>
        </li>
        <?php } ?>

        <?php if( name_to_status('Admin/User/students') == 1 && $user['gid']==427 || in_array('Admin/User/students', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'AuthRule-index'): ?>class="active"<?php endif; ?> <?php if($user['gid'] == 1): ?>style="display:none;"<?php elseif($user['gid'] == 2): ?>style="display:none;"<?php endif; ?>>
          <a href="<?php echo U('Admin/User/students');?>" page="Admin/User/students" title="students" data-title="学生列表">
            <i class="icon-double-angle-right"></i>
            学生列表
          </a>
        </li>
        <?php } ?>

        <?php if( name_to_status('Admin/User/addStudent') == 1 && $user['gid']==427 || in_array('Admin/User/addStudent', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'AuthRule-index'): ?>class="active"<?php endif; ?> <?php if($user['gid'] == 1): ?>style="display:none;"<?php elseif($user['gid'] == 2): ?>style="display:none;"<?php endif; ?>>
          <a href="<?php echo U('Admin/User/addStudent');?>" page="Admin/User/addStudent" title="addStudent" data-title="添加学生">
            <i class="icon-double-angle-right"></i>
            添加学生
          </a>
        </li>
        <?php } ?>
      </ul>
    </li>
    <?php } ?> -->

    

    

    <?php if( name_to_status('Type') == 1 && $user['gid']==427 || in_array('Type', $user['auth_controller_names'])){ ?>
    <li <?php if($cur_c == 'Type'): ?>class="active open"<?php endif; ?> style="display:none;">
      <a href="#" class="dropdown-toggle">
        <i class="icon-edit"></i>
        <span class="menu-text"> 分类管理 </span>
        <b class="arrow icon-angle-down"></b>
      </a>

      <ul class="submenu">
        <?php if( name_to_status('Admin/Type/index') == 1 && $user['gid']==427 || in_array('Admin/Type/index', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'Type-index'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/Type/index');?>" page="Admin/Type/index" title="index" data-title="分类列表">
            <i class="icon-double-angle-right"></i>
            分类列表
          </a>
        </li>
        <?php } ?>
      </ul>
    </li>
    <?php } ?>

 <!-- 导航栏分为：我的面板、板料库、生产管理、成品管理、停线管理、工单管理、设备管理、能源管理、基础数据、系统管理 -->   

    <?php if( name_to_status('Panel') == 1 && $user['gid']==427 || in_array('Panel', $user['auth_controller_names'])){ ?>
    <li <?php if($cur_c == 'Panel'): ?>class="active open"<?php endif; ?>>
      <a href="#" class="dropdown-toggle">
        <i class="icon-flag"></i>
        <span class="menu-text">板料库 </span>
        <b class="arrow icon-angle-down"></b>
      </a>
      <ul class="submenu">
        <?php if( name_to_status('Admin/Panel/panel_12') == 1 && $user['gid']==427 || in_array('Admin/Panel/panel_12', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'Panel-panel_12'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/Panel/panel_12');?>" page="Admin/Panel/panel_12" title="panel_12" data-title="板料管理">
            <i class="icon-double-angle-right"></i>
            板料管理
          </a>
        </li>
        <?php } ?>
        <?php if( name_to_status('Admin/Panel/panel_11') == 1 && $user['gid']==427 || in_array('Admin/Panel/panel_11', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'Panel-panel_11'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/Panel/panel_11');?>" page="Admin/Panel/panel_11" title="panel_11" data-title="线上库存">
            <i class="icon-double-angle-right"></i>
            线上库存
          </a>
        </li>
        <?php } ?>
        <?php if( name_to_status('Admin/Panel/panel_22') == 1 && $user['gid']==427 || in_array('Admin/Panel/panel_22', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'Panel-panel_22'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/Panel/panel_22');?>" page="Admin/Panel/panel_22" title="panel_22" data-title="板料追溯">
            <i class="icon-double-angle-right"></i>
            板料追溯
          </a>
        </li>
        <?php } ?>
        <?php if( name_to_status('Admin/Panel/panel_33') == 1 && $user['gid']==427 || in_array('Admin/Panel/panel_33', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'Panel-panel_33'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/Panel/panel_33');?>" page="Admin/Panel/panel_33" title="panel_33" data-title="托盘管理">
            <i class="icon-double-angle-right"></i>
            托盘管理
          </a>
        </li>
        <?php } ?>
        <?php if( name_to_status('Admin/Panel/panel_00') == 1 && $user['gid']==427 || in_array('Admin/Panel/panel_00', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'Panel-panel_00'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/Panel/panel_00');?>" page="Admin/Panel/panel_00" title="panel_00" data-title="板料统计">
            <i class="icon-double-angle-right"></i>
            板料统计
          </a>
        </li>
        <?php } ?>
      </ul>
    </li>
    <?php } ?>


    <?php if( name_to_status('Course') == 1 && $user['gid']==427 || in_array('Course', $user['auth_controller_names'])){ ?>
    <li <?php if($cur_c == 'Course'): ?>class="active open"<?php endif; ?>>
      <a href="#" class="dropdown-toggle">
        <i class="icon-key"></i>
        <span class="menu-text">生产管理 </span>
        <b class="arrow icon-angle-down"></b>
      </a>
      <ul class="submenu">
        <?php if( name_to_status('Admin/Course/index') == 1 && $user['gid']==427 || in_array('Admin/Course/index', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'Course-index'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/Course/index');?>" page="Admin/Course/index" title="index" data-title="生产排程">
            <i class="icon-double-angle-right"></i>
            生产排程
          </a>
        </li>
        <?php } ?>
        <?php if( name_to_status('Admin/Course/index_2') == 1 && $user['gid']==427 || in_array('Admin/Course/index_2', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'Course-index_2'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/Course/index_2');?>" page="Admin/Course/index_2" title="index_2" data-title="生产记录">
            <i class="icon-double-angle-right"></i>
            生产记录
          </a>
        </li>
        <?php } ?>
        <?php if( name_to_status('Admin/Course/baobiao1') == 1 && $user['gid']==427 || in_array('Admin/Course/baobiao1', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'Course-baobiao1'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/Course/baobiao1');?>" page="Admin/Course/baobiao1" title="baobiao1" data-title="产量统计报表">
            <i class="icon-double-angle-right"></i>
            产量统计报表
          </a>
        </li>
        <?php } ?>
        <?php if( name_to_status('Admin/Course/baobiao2') == 1 && $user['gid']==427 || in_array('Admin/Course/baobiao2', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'Course-baobiao2'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/Course/baobiao2');?>" page="Admin/Course/baobiao2" title="baobiao2" data-title="产线报表">
            <i class="icon-double-angle-right"></i>
            产线报表
          </a>
        </li>
        <?php } ?>
        <?php if( name_to_status('Admin/Course/baobiao') == 1 && $user['gid']==427 || in_array('Admin/Course/baobiao', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'Course-baobiao'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/Course/baobiao');?>" page="Admin/Course/baobiao" title="baobiao" data-title="节拍报表">
            <i class="icon-double-angle-right"></i>
            节拍报表
          </a>
        </li>
        <?php } ?>
        <?php if( name_to_status('Admin/Course/liaojia') == 1 && $user['gid']==427 || in_array('Admin/Course/liaojia', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'Course-liaojia'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/Course/liaojia');?>" page="Admin/Course/liaojia" title="liaojia" data-title="料件管理">
            <i class="icon-double-angle-right"></i>
            料架管理
          </a>
        </li>
        <?php } ?>
      </ul>
    </li>
    <?php } ?>


    <?php if( name_to_status('Banji') == 1 && $user['gid']==427 || in_array('Banji', $user['auth_controller_names'])){ ?>
    <li <?php if($cur_c == 'Banji'): ?>class="active open"<?php endif; ?>>
      <a href="#" class="dropdown-toggle">
        <i class="icon-cogs"></i>
        <span class="menu-text">成品管理 </span>
        <b class="arrow icon-angle-down"></b>
      </a>
      <ul class="submenu">
        <!-- <?php if( name_to_status('Admin/Banji/index_1') == 1 && $user['gid']==427 || in_array('Admin/Banji/index_1', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'Banji-index_1'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/Banji/index_1');?>" page="Admin/Banji/index_1" title="index_1" data-title="缺陷记录">
            <i class="icon-double-angle-right"></i>
            缺陷记录
          </a>
        </li>
        <?php } ?> -->
        <?php if( name_to_status('Admin/Banji/index_2') == 1 && $user['gid']==427 || in_array('Admin/Banji/index_2', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'Banji-index_2'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/Banji/index_2');?>" page="Admin/Banji/index_2" title="index_2" data-title="抽检记录">
            <i class="icon-double-angle-right"></i>
            抽检记录
          </a>
        </li>
        <?php } ?>
        <?php if( name_to_status('Admin/Banji/index_3') == 1 && $user['gid']==427 || in_array('Admin/Banji/index_3', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'Banji-index_3'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/Banji/index_3');?>" page="Admin/Banji/index_3" title="index_3" data-title="成品追溯">
            <i class="icon-double-angle-right"></i>
            成品追溯
          </a>
        </li>
        <?php } ?>
        <?php if( name_to_status('Admin/Banji/index_4') == 1 && $user['gid']==427 || in_array('Admin/Banji/index_4', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'Banji-index_4'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/Banji/index_4');?>" page="Admin/Banji/index_4" title="index_4" data-title="成品库存">
            <i class="icon-double-angle-right"></i>
            成品库存
          </a>
        </li>
        <?php } ?>
      </ul>
    </li>
    <?php } ?>


    <?php if( name_to_status('Stop') == 1 && $user['gid']==427 || in_array('Stop', $user['auth_controller_names'])){ ?>
    <li <?php if($cur_c == 'Stop'): ?>class="active open"<?php endif; ?>>
      <a href="#" class="dropdown-toggle">
        <i class="icon-eye-close"></i>
        <span class="menu-text">停线管理 </span>
        <b class="arrow icon-angle-down"></b>
      </a>
      <ul class="submenu">
        <?php if( name_to_status('Admin/Stop/index') == 1 && $user['gid']==427 || in_array('Admin/Stop/index', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'Stop-index'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/Stop/index');?>" page="Admin/Stop/index" title="index" data-title="停线列表">
            <i class="icon-double-angle-right"></i>
            停线列表
          </a>
        </li>
        <?php } ?>
        <?php if( name_to_status('Admin/Stop/echart_1_1') == 1 && $user['gid']==427 || in_array('Admin/Stop/echart_1_1', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'Stop-echart_1_1'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/Stop/echart_1_1');?>" page="Admin/Stop/echart_1_1" title="echart_1_1" data-title="停线原因词云图报表">
            <i class="icon-double-angle-right"></i>
            停线原因词云图报表
          </a>
        </li>
        <?php } ?>
        <?php if( name_to_status('Admin/Stop/echart_1_2') == 1 && $user['gid']==427 || in_array('Admin/Stop/echart_1_2', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'Stop-echart_1_2'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/Stop/echart_1_2');?>" page="Admin/Stop/echart_1_2" title="echart_1_2" data-title="停线设备词云图报表">
            <i class="icon-double-angle-right"></i>
            停线设备词云图报表
          </a>
        </li>
        <?php } ?>
        <?php if( name_to_status('Admin/Stop/echart_2_1') == 1 && $user['gid']==427 || in_array('Admin/Stop/echart_2_1', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'Stop-echart_2_1'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/Stop/echart_2_1');?>" page="Admin/Stop/echart_2_1" title="echart_2_1" data-title="停线原因TopN报表">
            <i class="icon-double-angle-right"></i>
            停线原因TopN报表
          </a>
        </li>
        <?php } ?>
        <?php if( name_to_status('Admin/Stop/echart_2_2') == 1 && $user['gid']==427 || in_array('Admin/Stop/echart_2_2', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'Stop-echart_2_2'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/Stop/echart_2_2');?>" page="Admin/Stop/echart_2_2" title="echart_2_2" data-title="停线设备TopN报表">
            <i class="icon-double-angle-right"></i>
            停线设备TopN报表
          </a>
        </li> 
        <?php } ?>
        <?php if( name_to_status('Admin/Stop/echart_2_3') == 1 && $user['gid']==427 || in_array('Admin/Stop/echart_2_3', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'Stop-echart_2_3'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/Stop/echart_2_3');?>" page="Admin/Stop/echart_2_3" title="echart_2_3" data-title="停线时长TopN报表">
            <i class="icon-double-angle-right"></i>
            停线时长TopN报表
          </a>
        </li> 
        <?php } ?>
      </ul>  
    </li>
    <?php } ?>

    
    <?php if( name_to_status('Card') == 1 && $user['gid']==427 || in_array('Card', $user['auth_controller_names'])){ ?>
    <li <?php if($cur_c == 'Card'): ?>class="active open"<?php endif; ?>>
      <a href="#" class="dropdown-toggle">
        <i class="icon-credit-card"></i>
        <span class="menu-text">工单管理 </span>
        <b class="arrow icon-angle-down"></b>
      </a>
      <ul class="submenu">
        <?php if( name_to_status('Admin/Card/index4') == 1 && $user['gid']==427 || in_array('Admin/Card/index4', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'Card-index4'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/Card/index4');?>" page="Admin/Card/index4" title="index4" data-title="模具工单">
            <i class="icon-double-angle-right"></i>
            模具工单
          </a>
        </li>
        <?php } ?>
        <?php if( name_to_status('Admin/Card/index5') == 1 && $user['gid']==427 || in_array('Admin/Card/index5', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'Card-index5'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/Card/index5');?>" page="Admin/Card/index5" title="index5" data-title="生产工单">
            <i class="icon-double-angle-right"></i>
            生产工单
          </a>
        </li>
        <?php } ?>
        <?php if( name_to_status('Admin/Card/index6') == 1 && $user['gid']==427 || in_array('Admin/Card/index6', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'Card-index6'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/Card/index6');?>" page="Admin/Card/index6" title="index6" data-title="设备工单">
            <i class="icon-double-angle-right"></i>
            设备工单
          </a>
        </li>
        <?php } ?>
        <?php if( name_to_status('Admin/Card/index7') == 1 && $user['gid']==427 || in_array('Admin/Card/index7', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'Card-index7'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/Card/index7');?>" page="Admin/Card/index7" title="index7" data-title="过程工单">
            <i class="icon-double-angle-right"></i>
            过程工单
          </a>
        </li>
        <?php } ?>
        <?php if( name_to_status('Admin/Card/index8') == 1 && $user['gid']==427 || in_array('Admin/Card/index8', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'Card-index8'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/Card/index8');?>" page="Admin/Card/index8" title="index8" data-title="成品返修工单">
            <i class="icon-double-angle-right"></i>
            成品返修工单
          </a>
        </li>
        <?php } ?>
        <?php if( name_to_status('Admin/Card/index3_1') == 1 && $user['gid']==427 || in_array('Admin/Card/index3_1', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'Card-index3_1'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/Card/index3_1');?>" page="Admin/Card/index3_1" title="index3_1" data-title="模具维修工时报表">
            <i class="icon-double-angle-right"></i>
            模具维修工时报表
          </a>
        </li>
        <?php } ?>
        <?php if( name_to_status('Admin/Card/index3_2') == 1 && $user['gid']==427 || in_array('Admin/Card/index3_2', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'Card-index3_2'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/Card/index3_2');?>" page="Admin/Card/index3_2" title="index3_2" data-title="模具保养工时报表">
            <i class="icon-double-angle-right"></i>
            模具保养工时报表
          </a>
        </li>
        <?php } ?>
        <?php if( name_to_status('Admin/Card/index3_3') == 1 && $user['gid']==427 || in_array('Admin/Card/index3_3', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'Card-index3_3'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/Card/index3_3');?>" page="Admin/Card/index3_3" title="index3_3" data-title="设备维修工时报表">
            <i class="icon-double-angle-right"></i>
            设备维修工时报表
          </a>
        </li>
        <?php } ?>
      </ul>
    </li>
    <?php } ?>


    <?php if( name_to_status('Energy') == 1 && $user['gid']==427 || in_array('Energy', $user['auth_controller_names'])){ ?>
    <li <?php if($cur_c == 'Energy'): ?>class="active open"<?php endif; ?>>
      <a href="#" class="dropdown-toggle">
        <i class="icon-leaf"></i>
        <span class="menu-text">能源管理 </span>
        <b class="arrow icon-angle-down"></b>
      </a>
      <ul class="submenu">
        <?php if( name_to_status('Admin/Energy/index1') == 1 && $user['gid']==427 || in_array('Admin/Energy/index1', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'Energy-index1'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/Energy/index1');?>" page="Admin/Energy/index1" title="index1" data-title="电能仪表明细表">
            <i class="icon-double-angle-right"></i>
            电能仪表明细表
          </a>
        </li>
        <?php } ?>
        <?php if( name_to_status('Admin/Energy/index2') == 1 && $user['gid']==427 || in_array('Admin/Energy/index2', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'Energy-index2'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/Energy/index2');?>" page="Admin/Energy/index2" title="index2" data-title="产量能耗报表">
            <i class="icon-double-angle-right"></i>
            产量能耗报表
          </a>
        </li>
        <?php } ?>
        <?php if( name_to_status('Admin/Energy/index3') == 1 && $user['gid']==427 || in_array('Admin/Energy/index3', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'Energy-index3'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/Energy/index3');?>" page="Admin/Energy/index3" title="index3" data-title="能耗趋势报表">
            <i class="icon-double-angle-right"></i>
            能耗趋势报表
          </a>
        </li>
        <?php } ?>
      </ul>
    </li>
    <?php } ?>


    <?php if( name_to_status('Site') == 1 && $user['gid']==427 || in_array('Site', $user['auth_controller_names'])){ ?>
    <li <?php if($cur_c == 'Site'): ?>class="active open"<?php endif; ?>>
      <a href="#" class="dropdown-toggle">
        <i class="icon-beaker"></i>
        <span class="menu-text">基础数据 </span>
        <b class="arrow icon-angle-down"></b>
      </a>
      <ul class="submenu">
        <?php if( name_to_status('Admin/Site/banliao') == 1 && $user['gid']==427 || in_array('Admin/Site/banliao', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'Site-banliao'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/Site/banliao');?>" page="Admin/Site/banliao" title="banliao" data-title="板料管理">
            <i class="icon-double-angle-right"></i>
            板料管理
          </a>
        </li>
        <?php } ?>
        <?php if( name_to_status('Admin/Site/device') == 1 && $user['gid']==427 || in_array('Admin/Site/device', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'Site-device'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/Site/device');?>" page="Admin/Site/device" title="device" data-title="设备管理">
            <i class="icon-double-angle-right"></i>
            设备管理
          </a>
        </li>
        <?php } ?>
        <?php if( name_to_status('Admin/Site/mould') == 1 && $user['gid']==427 || in_array('Admin/Site/mould', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'Site-mould'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/Site/mould');?>" page="Admin/Site/mould" title="mould" data-title="模具管理">
            <i class="icon-double-angle-right"></i>
            模具管理
          </a>
        </li>
        <?php } ?>
        <?php if( name_to_status('Admin/Site/carts_1') == 1 && $user['gid']==427 || in_array('Admin/Site/carts_1', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'Site-carts_1'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/Site/carts_1');?>" page="Admin/Site/carts_1" title="carts_1" data-title="车型管理">
            <i class="icon-double-angle-right"></i>
            车型管理
          </a>
        </li>
        <?php } ?>
        <?php if( name_to_status('Admin/Site/parts_1') == 1 && $user['gid']==427 || in_array('Admin/Site/parts_1', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'Site-parts_1'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/Site/parts_1');?>" page="Admin/Site/parts_1" title="parts_1" data-title="零件管理">
            <i class="icon-double-angle-right"></i>
            零件管理
          </a>
        </li>
        <?php } ?>
        <?php if( name_to_status('Admin/Site/liaojia') == 1 && $user['gid']==427 || in_array('Admin/Site/liaojia', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'Site-liaojia'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/Site/liaojia');?>" page="Admin/Site/liaojia" title="liaojia" data-title="料架管理">
            <i class="icon-double-angle-right"></i>
            料架管理
          </a>
        </li>
        <?php } ?>
        <?php if( name_to_status('Admin/Site/yibiao') == 1 && $user['gid']==427 || in_array('Admin/Site/yibiao', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'Site-yibiao'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/Site/yibiao');?>" page="Admin/Site/yibiao" title="yibiao" data-title="仪表管理">
            <i class="icon-double-angle-right"></i>
            仪表管理
          </a>
        </li>
        <?php } ?>
        <?php if( name_to_status('Admin/Site/tuopan') == 1 && $user['gid']==427 || in_array('Admin/Site/tuopan', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'Site-tuopan'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/Site/tuopan');?>" page="Admin/Site/tuopan" title="tuopan" data-title="托盘管理">
            <i class="icon-double-angle-right"></i>
            托盘管理
          </a>
        </li>
        <?php } ?>
        <?php if( name_to_status('Admin/Site/banci_2') == 1 && $user['gid']==427 || in_array('Admin/Site/banci_2', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'Site-banci_2'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/Site/banci_2');?>" page="Admin/Site/banci_2" title="banci_2" data-title="用户组列表">
            <i class="icon-double-angle-right"></i>
            班次管理
          </a>
        </li>
        <?php } ?>
      </ul>
    </li>
    <?php } ?>

    <?php if( name_to_status('AuthRule') == 1 && $user['gid']==427 || in_array('AuthRule', $user['auth_controller_names']) || in_array('AuthManager', $user['auth_controller_names']) || in_array('User', $user['auth_controller_names'])){ ?>
    <li <?php if($cur_c == 'AuthRule' || $cur_c == 'AuthManager' || $cur_c == 'User'): ?>class="active open"<?php endif; ?>>
      <a href="#" class="dropdown-toggle">
        <i class="icon-briefcase"></i>
        <span class="menu-text"> 系统管理 </span>
        <b class="arrow icon-angle-down"></b>
      </a>
      <ul class="submenu">
        <?php if( name_to_status('Admin/AuthRule/index') == 1 && $user['gid']==427 || in_array('Admin/AuthRule/index', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'AuthRule-index'): ?>class="active"<?php endif; ?> style="display:none;">
          <a href="<?php echo U('Admin/AuthRule/index');?>" page="Admin/AuthRule/index" title="index" data-title="权限列表">
            <i class="icon-double-angle-right"></i>
            权限列表
          </a>
        </li>
        <?php } ?>
        <?php if( name_to_status('Admin/AuthManager/index') == 1 && $user['gid']==427 || in_array('Admin/AuthManager/index', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'AuthManager-index'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/AuthManager/index');?>" page="Admin/AuthManager/index" title="index" data-title="用户组列表">
            <i class="icon-double-angle-right"></i>
            用户组列表
          </a>
        </li>
        <?php } ?>
        <?php if( name_to_status('Admin/User/homeUser') == 1 && $user['gid']==427 || in_array('Admin/User/homeUser', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'User-homeUser'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/User/homeUser');?>" page="Admin/User/homeUser" title="homeUser" data-title="用户列表">
            <i class="icon-double-angle-right"></i>
            用户列表
          </a>
        </li>
        <?php } ?>
      </ul>
    </li>
    <?php } ?>

  </ul><!-- /.nav-list -->


  <div class="sidebar-collapse" id="sidebar-collapse">
    <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
  </div>

  <script type="text/javascript">
    try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
  </script>


        </div>
        
        <!-- 右侧主要内容 start-->
        <div class="main-content">
          

          <!-- 右block_1  start -->
          <div class="breadcrumbs" id="breadcrumbs">
            <script type="text/javascript">
              try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
            </script>

            <ul class="breadcrumb">
              <li>
                <i class="icon-home home-icon"></i>
                <a href="#">Home</a>
              </li>

              <li>
                <a href="#">我的面板</a>
              </li>
              <li class="active">首页</li>
            </ul><!-- .breadcrumb -->

            <div class="nav-search" id="nav-search">
              <form class="form-search">
                <span class="input-icon">
                  <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                  <i class="icon-search nav-search-icon"></i>
                </span>
              </form>
            </div><!-- #nav-search -->
          </div>
          <!-- 右block_1  end -->

          <div class="page-content">
            <div class="row">
                <img src="/hanshi/Public/index.png" style="width:100%;height:100%;">
            </div><!-- /.row -->
          </div><!-- /.page-content -->

        </div><!-- /.main-content -->
        <!-- 右侧主要内容 end-->

        
        
        <!-- 模板相关设置 -->
        <div class="ace-settings-container" id="ace-settings-container" style="display: none;">
  <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
    <i class="icon-cog bigger-150"></i>
  </div>

  <div class="ace-settings-box" id="ace-settings-box">
    <div>
      <div class="pull-left">
        <select id="skin-colorpicker" class="hide">
          <option data-skin="default" value="#438EB9">#438EB9</option>
          <option data-skin="skin-1" value="#222A2D">#222A2D</option>
          <option data-skin="skin-2" value="#C6487E">#C6487E</option>
          <option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
        </select>
      </div>
      <span>&nbsp; Choose Skin</span>
    </div>

    <div>
      <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" />
      <label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
    </div>

    <div>
      <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
      <label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
    </div>

    <div>
      <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs" />
      <label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
    </div>

    <div>
      <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
      <label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
    </div>

    <div>
      <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
      <label class="lbl" for="ace-settings-add-container">
        Inside
        <b>.container</b>
      </label>
    </div>
    
  </div>
</div><!-- /#ace-settings-container -->

      </div><!-- /.main-container-inner -->



      <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">

        <i class="icon-double-angle-up icon-only bigger-110"></i>

      </a>

    </div><!-- /.main-container -->

    <!-- 底栏版本说明 -->
    <script type="text/javascript">
	$(function(){
		//面包导航
		$('#_nav_1').html($('#sidebar .nav-list li.active>a>span.menu-text').html());
		$('#_nav_2').html($('#sidebar .nav-list li.active>ul.submenu li.active a').attr('data-title'));

		//配置权限的时候根据左侧的page属性将右侧的对应按钮高亮
		console.log(11111111)
		$.each($('#sidebar .submenu>li>a'), function(key, value){
			if( $(value).attr("page") !="" ){
				var _page_=$(value).attr('page');

				$.each($('#auth_form label'), function(k, v){
					if( $(v).attr("page") ==_page_ ){
						$(v).addClass('auth_heightlight');
					}
				});
			}
		});
		console.log(3333333)
	});

</script>

<style type="text/css">
	.auth_heightlight{background: red;}
	.footer {
		width: 100%;
		height: 65px;
		overflow: hidden;
	/*	position: absolute;
		bottom: 0px;*/
	}
	.footer .footer-inner {
	    text-align: center;
		height: 55px;
	    z-index: auto;
	    left: 0;
	    right: 0;
	    bottom: 0;
	}
	.footer .footer-inner .footer-content {
	    position: absolute;
	    bottom: 4px;
	    padding: 8px 0px;
	    line-height: 36px;
	    border-top: 3px double #E5E5E5;
	    width: 100%;
	    overflow: hidden;
	    background: white;
	}
	.bigger-120 {
	    font-size: 120%!important;
	}
	.blue {
	    color: #478FCA!important;
	}
	.bolder {
	    font-weight: bolder;
	}
</style>

<div class="footer">

  <div class="footer-inner row">

    <div class="footer-content col-xs-12">

      <span class="bigger-120">

        <span class="blue bolder">&copy; 2016</span>
          ELCO(TIANJIN)ELECTRONICS CO.,LTD.

      </span>



      &nbsp; &nbsp;

      <span class="action-buttons">

        <a href="#">

          <i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>

        </a>



        <a href="#">

          <i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>

        </a>



        <a href="#">

          <i class="ace-icon fa fa-rss-square orange bigger-150"></i>

        </a>

      </span>

    </div>

  </div>

</div>





    <!-- basic scripts -->

    <!--[if !IE]> -->



    <!-- <![endif]-->



    <!--[if IE]>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<![endif]-->



    <!--[if !IE]> -->



    <script type="text/javascript">

      window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");

    </script>



    <!-- <![endif]-->



    <!--[if IE]>

<script type="text/javascript">

 window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");

</script>

<![endif]-->



    <script type="text/javascript">

      if("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");

    </script>

    <script src="/hanshi/Public/Admin/assets/js/bootstrap.min.js"></script>

    <script src="/hanshi/Public/Admin/assets/js/typeahead-bs2.min.js"></script>



    <!-- page specific plugin scripts -->

    <script src="/hanshi/Public/Admin/assets/js/jquery-ui-1.10.3.custom.min.js"></script>

    <script src="/hanshi/Public/Admin/assets/js/jquery.ui.touch-punch.min.js"></script>

    <script src="/hanshi/Public/Admin/assets/js/chosen.jquery.min.js"></script>

    <script src="/hanshi/Public/Admin/assets/js/fuelux/fuelux.spinner.min.js"></script>

    <script src="/hanshi/Public/Admin/assets/js/date-time/bootstrap-datepicker.min.js"></script>

    <script src="/hanshi/Public/Admin/assets/js/date-time/bootstrap-timepicker.min.js"></script>

    <script src="/hanshi/Public/Admin/assets/js/date-time/moment.min.js"></script>

    <script src="/hanshi/Public/Admin/assets/js/date-time/daterangepicker.min.js"></script>

    <script src="/hanshi/Public/Admin/assets/js/bootstrap-colorpicker.min.js"></script>

    <script src="/hanshi/Public/Admin/assets/js/jquery.knob.min.js"></script>

    <script src="/hanshi/Public/Admin/assets/js/jquery.autosize.min.js"></script>

    <script src="/hanshi/Public/Admin/assets/js/jquery.inputlimiter.1.3.1.min.js"></script>

    <script src="/hanshi/Public/Admin/assets/js/jquery.maskedinput.min.js"></script>

    <script src="/hanshi/Public/Admin/assets/js/bootstrap-tag.min.js"></script>

    <script src="/hanshi/Public/Admin/assets/js/jquery.dataTables.min.js"></script>

    <script src="/hanshi/Public/Admin/assets/js/jquery.dataTables.bootstrap.js"></script>
    
    <!-- 模块jqgrid  start -->
    <script src="/hanshi/Public/Admin/assets/js/date-time/bootstrap-datepicker.min.js"></script>
    <script src="/hanshi/Public/Admin/assets/js/jqGrid/jquery.jqGrid.min.js"></script>
    <!-- <script src="/hanshi/Public/Admin/assets/js/jqGrid/i18n/grid.locale-en.js"></script> -->
    <script src="/hanshi/Public/Admin/assets/js/jqGrid/i18n/grid.locale-zh.js"></script>

    <script src="/hanshi/Public/Admin/assets/js/jquery-ui-1.10.3.full.min.js"></script>
    <script src="/hanshi/Public/Admin/assets/js/jquery.ui.touch-punch.min.js"></script>
    
    <!-- 模块jqgrid  end -->

    <!-- ace scripts -->



    <script src="/hanshi/Public/Admin/assets/js/ace-elements.min.js"></script>

    <script src="/hanshi/Public/Admin/assets/js/ace.min.js"></script>

  </body>
</html>