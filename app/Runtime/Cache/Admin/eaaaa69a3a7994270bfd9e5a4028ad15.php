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

    <!-- basic styles -->
    <link href="/Public/Admin/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/Public/Admin/assets/css/font-awesome.min.css" />

    <!--[if IE 7]>
      <link rel="stylesheet" href="/Public/Admin/assets/css/font-awesome-ie7.min.css" />
    <![endif]-->

    <!-- page specific plugin styles -->
    <link rel="stylesheet" href="/Public/Admin/assets/css/jquery-ui-1.10.3.custom.min.css" />
    <link rel="stylesheet" href="/Public/Admin/assets/css/chosen.css" />
    <link rel="stylesheet" href="/Public/Admin/assets/css/datepicker.css" />
    <link rel="stylesheet" href="/Public/Admin/assets/css/bootstrap-timepicker.css" />
    <link rel="stylesheet" href="/Public/Admin/assets/css/daterangepicker.css" />
    <link rel="stylesheet" href="/Public/Admin/assets/css/colorpicker.css" />
    
    <!-- 模块jqgrid  start -->
    <link rel="stylesheet" href="/Public/Admin/assets/css/jquery-ui-1.10.3.full.min.css" />
    <link rel="stylesheet" href="/Public/Admin/assets/css/datepicker.css" />
    <link rel="stylesheet" href="/Public/Admin/assets/css/ui.jqgrid.css" />
    <!-- 模块jqgrid  end -->

    <!-- fonts -->
    <link rel="stylesheet" type="text/css" href="/Public/Admin/assets/css/google_font_css.css">

    <!-- ace styles -->
    <link rel="stylesheet" href="/Public/Admin/assets/css/ace.min.css" />
    <link rel="stylesheet" href="/Public/Admin/assets/css/ace-rtl.min.css" />
    <link rel="stylesheet" href="/Public/Admin/assets/css/ace-skins.min.css" />

    <!-- jQuery smartMenu右键自定义上下文菜单插件  start -->
    <link rel="stylesheet" href="/Public/Admin/jquery-smartMenu/css/smartMenu.css" type="text/css" />
    <!-- jQuery smartMenu右键自定义上下文菜单插件  end -->

    <link rel="stylesheet" href="/Public/Admin/layui-v1.0.4/layui/css/layui.css"  media="all">
    <link rel="stylesheet" href="/Public/Admin/css/my_diy_css.css"  media="all">

    <!--[if lte IE 8]>
      <link rel="stylesheet" href="/Public/Admin/assets/css/ace-ie.min.css" />
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->

    <script src="/Public/Admin/assets/js/ace-extra.min.js"></script>
    <script src="/Public/Admin/assets/js/jquery.min.js"></script>
    <!-- layui.js   -->
    <script src="/Public/Admin/layui-v1.0.4/layui/layui.js"></script>
    <script src="/Public/layer/layer.js"></script>
<script>

  

</script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->



    <!--[if lt IE 9]>

    <script src="/Public/Admin/assets/js/html5shiv.js"></script>

    <script src="/Public/Admin/assets/js/respond.min.js"></script>

    <![endif]-->

  </head>

  <body>
    <div class="navbar navbar-default" id="navbar">
      <script type="text/javascript">
	try{ace.settings.check('navbar' , 'fixed')}catch(e){}
</script>

			

			<div class="navbar-container" id="navbar-container">
				<div class="navbar-header pull-left">
					<a href="#" class="navbar-brand" style="background:url('/Uploads/<?php echo ($web_set['logo']); ?>') left 5px;background-size:35px 35px;background-repeat:no-repeat;">
						<small style="margin-left:34px;">
							<!-- <i class="icon-leaf"></i> -->
							<?php echo ($web_set['title']); ?>
						</small>
					</a><!-- /.brand -->
				</div><!-- /.navbar-header -->

				<div class="navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="grey">
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

						<li class="purple">
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

						<li class="green">
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
										<img src="/Public/Admin/assets/avatars/avatar.png" class="msg-photo" alt="Alex's Avatar" />
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
										<img src="/Public/Admin/assets/avatars/avatar3.png" class="msg-photo" alt="Susan's Avatar" />
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
										<img src="/Public/Admin/assets/avatars/avatar4.png" class="msg-photo" alt="Bob's Avatar" />
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
								<?php if($user['gid'] == 4 || $user['gid'] == 3): ?><img class="nav-user-photo" src="/Uploads/<?php echo ($user["logo"]); ?>" alt="Jason's Photo" />
									<span class="user-info">
										<small><?php echo ($user["school"]); ?>,</small>
										<?php echo ($user["username"]); ?>
									</span>
								<?php else: ?>
									<img class="nav-user-photo" src="/Public/Admin/assets/avatars/user.jpg" alt="Jason's Photo" />
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
    <li <?php if($cur_c == 'Config'): ?>class="active open"<?php endif; ?>>
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


    <?php if( name_to_status('Config') == 1 && $user['gid']==427 || in_array('Config', $user['auth_controller_names'])){ ?>
    <li <?php if($cur_c == 'Config'): ?>class="active open"<?php endif; ?>>
      <a href="#" class="dropdown-toggle">
        <i class="icon-film"></i>
        <span class="menu-text"> 简介管理 </span>
        <b class="arrow icon-angle-down"></b>
      </a>

      <ul class="submenu">
        <?php if( name_to_status('Admin/Config/setting') == 1 && $user['gid']==427 || in_array('Admin/Config/setting', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'Config-setting'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/Config/setting');?>" page="Admin/Config/setting" title="setting" data-title="简介管理">
            <i class="icon-double-angle-right"></i>
            简介管理
          </a>
        </li>
        <?php } ?>
      </ul>
    </li>
    <?php } ?>


    <?php if( name_to_status('Config') == 1 && $user['gid']==427 || in_array('Config', $user['auth_controller_names'])){ ?>
    <li <?php if($cur_c == 'Config'): ?>class="active open"<?php endif; ?>>
      <a href="#" class="dropdown-toggle">
        <i class="icon-film"></i>
        <span class="menu-text"> 新闻活动管理 </span>
        <b class="arrow icon-angle-down"></b>
      </a>

      <ul class="submenu">
        <?php if( name_to_status('Admin/Config/setting') == 1 && $user['gid']==427 || in_array('Admin/Config/setting', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'Config-setting'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/Config/setting');?>" page="Admin/Config/setting" title="setting" data-title="新闻活动管理">
            <i class="icon-double-angle-right"></i>
            新闻活动管理
          </a>
        </li>
        <?php } ?>
      </ul>
    </li>
    <?php } ?>

    <?php if( name_to_status('Config') == 1 && $user['gid']==427 || in_array('Config', $user['auth_controller_names'])){ ?>
    <li <?php if($cur_c == 'Config'): ?>class="active open"<?php endif; ?>>
      <a href="#" class="dropdown-toggle">
        <i class="icon-film"></i>
        <span class="menu-text"> 产品管理 </span>
        <b class="arrow icon-angle-down"></b>
      </a>

      <ul class="submenu">
        <?php if( name_to_status('Admin/Config/setting') == 1 && $user['gid']==427 || in_array('Admin/Config/setting', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'Config-setting'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/Config/setting');?>" page="Admin/Config/setting" title="setting" data-title="产品管理">
            <i class="icon-double-angle-right"></i>
            产品管理
          </a>
        </li>
        <?php } ?>
      </ul>
    </li>
    <?php } ?>

    <?php if( name_to_status('Config') == 1 && $user['gid']==427 || in_array('Config', $user['auth_controller_names'])){ ?>
    <li <?php if($cur_c == 'Config'): ?>class="active open"<?php endif; ?>>
      <a href="#" class="dropdown-toggle">
        <i class="icon-film"></i>
        <span class="menu-text"> 视频管理 </span>
        <b class="arrow icon-angle-down"></b>
      </a>

      <ul class="submenu">
        <?php if( name_to_status('Admin/Config/setting') == 1 && $user['gid']==427 || in_array('Admin/Config/setting', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'Config-setting'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/Config/setting');?>" page="Admin/Config/setting" title="setting" data-title="视频管理">
            <i class="icon-double-angle-right"></i>
            视频管理
          </a>
        </li>
        <?php } ?>
      </ul>
    </li>
    <?php } ?>


    <?php if( name_to_status('Config') == 1 && $user['gid']==427 || in_array('Config', $user['auth_controller_names'])){ ?>
    <li <?php if($cur_c == 'Config'): ?>class="active open"<?php endif; ?>>
      <a href="#" class="dropdown-toggle">
        <i class="icon-film"></i>
        <span class="menu-text"> 论坛中心 </span>
        <b class="arrow icon-angle-down"></b>
      </a>

      <ul class="submenu">
        <?php if( name_to_status('Admin/Config/setting') == 1 && $user['gid']==427 || in_array('Admin/Config/setting', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'Config-setting'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/Config/setting');?>" page="Admin/Config/setting" title="setting" data-title="论坛中心">
            <i class="icon-double-angle-right"></i>
            论坛中心
          </a>
        </li>
        <?php } ?>
      </ul>
    </li>
    <?php } ?>

    <?php if( name_to_status('Config') == 1 && $user['gid']==427 || in_array('Config', $user['auth_controller_names'])){ ?>
    <li <?php if($cur_c == 'Config'): ?>class="active open"<?php endif; ?>>
      <a href="#" class="dropdown-toggle">
        <i class="icon-film"></i>
        <span class="menu-text"> 订单管理 </span>
        <b class="arrow icon-angle-down"></b>
      </a>

      <ul class="submenu">
        <?php if( name_to_status('Admin/Config/setting') == 1 && $user['gid']==427 || in_array('Admin/Config/setting', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'Config-setting'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/Config/setting');?>" page="Admin/Config/setting" title="setting" data-title="订单管理">
            <i class="icon-double-angle-right"></i>
            订单管理
          </a>
        </li>
        <?php } ?>
      </ul>
    </li>
    <?php } ?>

    <li <?php if($cur_c == 'Tender'): ?>class="active open"<?php endif; ?>>
      <a href="#" class="dropdown-toggle">
        <i class="icon-film"></i>
        <span class="menu-text"> 招标管理 </span>
        <b class="arrow icon-angle-down"></b>
      </a>

      <ul class="submenu">
        <li <?php if($cur_v == 'Tender-index'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/Tender/index');?>" page="Admin/Tender/index" title="index" data-title="招标管理">
            <i class="icon-double-angle-right"></i>
            招标管理
          </a>
        </li>
      </ul>
    </li>


    <?php if( name_to_status('Config') == 1 && $user['gid']==427 || in_array('Config', $user['auth_controller_names'])){ ?>
    <li <?php if($cur_c == 'Config'): ?>class="active open"<?php endif; ?>>
      <a href="#" class="dropdown-toggle">
        <i class="icon-film"></i>
        <span class="menu-text"> 政采招标 </span>
        <b class="arrow icon-angle-down"></b>
      </a>

      <ul class="submenu">
        <?php if( name_to_status('Admin/Config/setting') == 1 && $user['gid']==427 || in_array('Admin/Config/setting', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'Config-setting'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/Config/setting');?>" page="Admin/Config/setting" title="setting" data-title="政采招标">
            <i class="icon-double-angle-right"></i>
            政采招标
          </a>
        </li>
        <?php } ?>
      </ul>
    </li>
    <?php } ?>

    <?php if( name_to_status('Config') == 1 && $user['gid']==427 || in_array('Config', $user['auth_controller_names'])){ ?>
    <li <?php if($cur_c == 'Config'): ?>class="active open"<?php endif; ?>>
      <a href="#" class="dropdown-toggle">
        <i class="icon-film"></i>
        <span class="menu-text"> 企业招标 </span>
        <b class="arrow icon-angle-down"></b>
      </a>

      <ul class="submenu">
        <?php if( name_to_status('Admin/Config/setting') == 1 && $user['gid']==427 || in_array('Admin/Config/setting', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'Config-setting'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/Config/setting');?>" page="Admin/Config/setting" title="setting" data-title="企业招标">
            <i class="icon-double-angle-right"></i>
            企业招标
          </a>
        </li>
        <?php } ?>
      </ul>
    </li>
    <?php } ?>


    <?php if( name_to_status('Config') == 1 && $user['gid']==427 || in_array('Config', $user['auth_controller_names'])){ ?>
    <li <?php if($cur_c == 'Config'): ?>class="active open"<?php endif; ?>>
      <a href="#" class="dropdown-toggle">
        <i class="icon-film"></i>
        <span class="menu-text"> 评论中心 </span>
        <b class="arrow icon-angle-down"></b>
      </a>

      <ul class="submenu">
        <?php if( name_to_status('Admin/Config/setting') == 1 && $user['gid']==427 || in_array('Admin/Config/setting', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'Config-setting'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/Config/setting');?>" page="Admin/Config/setting" title="setting" data-title="评论中心">
            <i class="icon-double-angle-right"></i>
            评论中心
          </a>
        </li>
        <?php } ?>
      </ul>
    </li>
    <?php } ?>

    <?php if( name_to_status('Config') == 1 && $user['gid']==427 || in_array('Config', $user['auth_controller_names'])){ ?>
    <li <?php if($cur_c == 'Config'): ?>class="active open"<?php endif; ?>>
      <a href="#" class="dropdown-toggle">
        <i class="icon-film"></i>
        <span class="menu-text"> 资产管理 </span>
        <b class="arrow icon-angle-down"></b>
      </a>

      <ul class="submenu">
        <?php if( name_to_status('Admin/Config/setting') == 1 && $user['gid']==427 || in_array('Admin/Config/setting', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'Config-setting'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/Config/setting');?>" page="Admin/Config/setting" title="setting" data-title="资产管理">
            <i class="icon-double-angle-right"></i>
            资产管理
          </a>
        </li>
        <?php } ?>
      </ul>
    </li>
    <?php } ?>

    <?php if( name_to_status('Config') == 1 && $user['gid']==427 || in_array('Config', $user['auth_controller_names'])){ ?>
    <li <?php if($cur_c == 'Config'): ?>class="active open"<?php endif; ?>>
      <a href="#" class="dropdown-toggle">
        <i class="icon-film"></i>
        <span class="menu-text"> 联线瞰世 </span>
        <b class="arrow icon-angle-down"></b>
      </a>

      <ul class="submenu">
        <?php if( name_to_status('Admin/Config/setting') == 1 && $user['gid']==427 || in_array('Admin/Config/setting', $user['auth_action_names'])){ ?>
        <li <?php if($cur_v == 'Config-setting'): ?>class="active"<?php endif; ?>>
          <a href="<?php echo U('Admin/Config/setting');?>" page="Admin/Config/setting" title="setting" data-title="联线瞰世">
            <i class="icon-double-angle-right"></i>
            联线瞰世
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
        <div class="main-content" style="overflow: hidden;">
          

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
  <a href="#" id="_nav_1"></a>
</li>
<li class="active" id="_nav_2"></li>
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

            <!-- 权限设置  start -->
            <div class="row">
              <?php if($_SESSION['ez_']['auth']['gid'] == 427): ?><div class="alert alert-danger alert-dismissible fade in" role="alert" style="display:none;">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size: 40px;padding-right: 10px;">×</span></button>
              <div class="panel panel-default" style="margin-bottom: 0px;">
                <div class="panel-heading">页面权限设置</div>
                <div class="panel-body">
                     <form class="layui-form layui-form-pane col-xs-12" action="" id="role_auth_table" >
                         <style type="text/css">
                           #role_auth_table{padding-left: 0px;padding-right: 0px;}
                           #buttons_box div{float: left;clear: none;margin:0px 3px 10px 3px; margin: 0px 3px 2px 8px; }
                           #buttons_box .layui-input-inline{margin-right: 0px;}
                           #buttons_box .layui-form-label{padding: 4px 3px!important;width: auto!important;}
                           #role_auth_table .editing label{font-weight: bold;color: red;}
                         </style>

                         <table class="layui-table">
                           <colgroup>
                             <col width="400">
                             <col>
                           </colgroup>
                           <thead>
                             <tr>
                               <td colspan="2">
                                 <div style="float:right;" class="layui-inline">
                                   <div class="layui-form-item">
                                     <div class="layui-input-inline">
                                        <input type="text" class="layui-input" placeholder="按钮" id="button_button">
                                     </div>
                                     <div class="layui-input-inline">
                                        <input type="text" class="layui-input" placeholder="描述" id="button_remark">
                                     </div>
                                     <label class="layui-form-label" id="add_button" data-page="<?php echo ($page); ?>">添加</label>
                                     <label class="layui-form-label" style="display:none;" id="edit_button" data-page="<?php echo ($page); ?>" data-id="">编辑</label>
                                   </div>
                                 </div>
                               </td>
                             </tr> 
                           </thead>

                           <tbody>
                             <tr>
                               <td>

                                 <div class="layui-inline">
                                   <div class="layui-form-item">
                                     <label class="layui-form-label">用户角色</label>
                                     <div class="layui-input-inline">
                                        <select name="gid" lay-filter="select_group">
                                          <option value="">全部</option>

                                          <?php if(is_array($group)): foreach($group as $key=>$vo): ?><optgroup label="<?php echo ($vo['title']); ?>">
                                               <?php if(is_array($vo['_child'])): foreach($vo['_child'] as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["title"]); ?></option><?php endforeach; endif; ?>
                                             </optgroup><?php endforeach; endif; ?>

                                        </select>
                                     </div>
                                   </div>
                                 </div>
                               </td>

                               <td id="buttons_box">
                                 
                                   <?php if(is_array($page_buttons)): foreach($page_buttons as $key=>$v): ?><div class="layui-form-item button_item">
                                           <div class="layui-input-inline">
                                             <input type="checkbox" name="<?php echo ($v["button"]); ?>" title="<?php echo ($v["remark"]); ?>">
                                           </div>
                                           <label class="layui-form-label button_edit" data-id="<?php echo ($v["id"]); ?>" data-button="<?php echo ($v["button"]); ?>" data-title="<?php echo ($v["remark"]); ?>">编辑</label>
                                           <label class="layui-form-label button_del" data-id="<?php echo ($v["id"]); ?>">删除</label>
                                       </div><?php endforeach; endif; ?>

                               </td>

                             </tr>
                           </tbody>
                           <tfoot>
                             <tr>
                               <td colspan="2">
                                 <button style="float:right;" class="layui-btn" lay-submit="" lay-filter="demo1_save_role_buttons">保存</button>
                               </td>
                             </tr> 
                           </tfoot>
                         </table>
                     </form>
                </div>
              </div>
        </div><?php endif; ?>
   <script type="text/javascript">
       $(function(){
           

           //添加按钮
           $('#add_button').click(function(){
               var page=$(this).attr('data-page');
               var button=$('#button_button').val();
               var remark=$('#button_remark').val();

               if(button==''||button==''){
                  layer.msg('不可空！');return;
               }

               _ajax_add_page_button(page, button, remark);
           });

           //编辑按钮
           $('#edit_button').click(function(){
               var id=$(this).attr('data-id');
               var button=$('#button_button').val();
               var remark=$('#button_remark').val();

               var json=_ajax_edit_page_button(id, button, remark);

               if(json.code==0){
                   var value=json.data;
                   var _str='';
                       _str+='<div class="layui-input-inline">';
                         _str+='<input type="checkbox" name="'+value.button+'" title="'+value.remark+'">';
                       _str+='</div>';
                       _str+='<label class="layui-form-label button_edit" data-id="'+value.id+'" data-button="'+value.button+'" data-title="'+value.remark+'">编辑</label>';
                       _str+='<label class="layui-form-label button_del" data-id="'+value.id+'">删除</label>';

                   $('.button_item.editing').html(_str);

                   //重置为添加
                   $('#button_button').val('');
                   $('#button_remark').val('');
                   $('#add_button').show();
                   $('#edit_button').hide();

                   layui.form().render();
               }
           });

           //编辑按钮
           $('body').on('click','.button_edit',function(){
               $('.button_item').removeClass('editing');
               $(this).parent('.button_item').addClass('editing');

               $('#add_button').hide();
               $('#edit_button').show();
               var button=$(this).attr('data-button');
               var remark=$(this).attr('data-title');
               var id=$(this).attr('data-id');
               $('#button_button').val(button);
               $('#button_remark').val(remark);
               $('#edit_button').attr('data-id',id);
           });

           //删除按钮
           $('body').on('click','.button_del',function(){
               var id=$(this).attr('data-id');
               var json=_ajax_del_page_button(id);

               if(json.code==0){
                   $(this).parent('.button_item').remove();
               }
           });
       });

       //添加按钮
       function _ajax_add_page_button(page, button, remark){

           var page=page;
           var button=button;
           var remark=remark;

           var _data ='{';
               _data+='"page":"'+page+'","button":"'+button+'","remark":"'+remark+'"';
               _data+='}';

           $.ajax({  
               async:false,
               type:'post',  
               contentType:"application/x-www-form-urlencoded",
               url : "<?php echo U('Admin/PageButtons/ajax_add_page_button');?>",
               data: _data,
               dataType : 'json',
               success  : function(json) { 
                   console.log(json); 
                   if(json.code == 0){
                       layer.msg(json.msg);

                       var value=json.data;
                       var _str='';
                       _str+='<div class="layui-form-item button_item">';
                           _str+='<div class="layui-input-inline">';
                             _str+='<input type="checkbox" name="'+value.button+'" title="'+value.remark+'">';
                           _str+='</div>';
                           _str+='<label class="layui-form-label button_edit" data-id="'+value.id+'" data-button="'+value.button+'" data-title="'+value.remark+'">编辑</label>';
                           _str+='<label class="layui-form-label button_del" data-id="'+value.id+'">删除</label>';
                       _str+='</div>';

                       $('#buttons_box').append(_str);
                       layui.form().render();
                   }else{
                       layer.msg(json.msg);
                   }
               },
               error  : function() {  
                   alert('error');
               }  
           }); 
       }

       //编辑按钮
       function _ajax_edit_page_button(id, button, remark){
           var id=id;
           var button=button;
           var remark=remark;

           var _data ='{';
               _data+='"id":"'+id+'","button":"'+button+'","remark":"'+remark+'"';
               _data+='}';

           var _json;
           $.ajax({  
               async:false,
               type:'post',  
               contentType:"application/x-www-form-urlencoded",
               url : "<?php echo U('Admin/PageButtons/ajax_edit_page_button');?>",
               data: _data,
               dataType : 'json',
               success  : function(json) { 
                   if(json.code == 0){
                       layer.msg(json.msg);
                       _json=json;
                   }else{
                       layer.msg(json.msg);
                       _json=json;
                   }
               },
               error  : function() {  
                   alert('error');
               }  
           }); 
           return _json;  
       }

       //添加
       function _ajax_add_role_buttons(gid, buttons, page){
           var gid=gid;
           var button=button;
           var page=page;

           var _data ='{';
               _data+='"page":"'+page+'","buttons":"'+buttons+'","gid":"'+gid+'"';
               _data+='}';

           var _json;
           $.ajax({  
               async:false,
               type:'post',  
               contentType:"application/x-www-form-urlencoded",
               url : "<?php echo U('Admin/PageButtons/ajax_add_role_buttons');?>",
               data: _data,
               dataType : 'json',
               success  : function(json) { 
                   console.log(json); 
                   if(json.code == 0){
                       layer.msg(json.msg);
                       _json=json;
                   }else{
                       layer.msg(json.msg);
                       _json=json;
                   }
               },
               error  : function() {  
                   alert('error');
               }  
           }); 
           return _json;  
       }

       //异步获取 buttons
       function _ajax_get_buttons(gid, page){
           var gid=gid;
           var page=page;

           var _data ='{';
               _data+='"page":"'+page+'","gid":"'+gid+'"';
               _data+='}';

           var _json;
           $.ajax({  
               async:false,
               type:'post',  
               contentType:"application/x-www-form-urlencoded",
               url : "<?php echo U('Admin/PageButtons/ajax_get_buttons');?>",
               data: _data,
               dataType : 'json',
               success  : function(json) {  
                   var _str="";
                   if(json.code == 0){
                       $.each(json.data, function(key, value){
                           _str+='<div class="layui-form-item button_item">';
                               _str+='<div class="layui-input-inline">';
                                 
                             if(value._has==1){
                                 _str+='<input type="checkbox" name="'+value.button+'" checked="checked" title="'+value.remark+'">';
                             }else{
                                 _str+='<input type="checkbox" name="'+value.button+'" title="'+value.remark+'">';
                             }

                               _str+='</div>';
                               _str+='<label class="layui-form-label button_edit" data-id="'+value.id+'" data-button="'+value.button+'" data-title="'+value.remark+'">编辑</label>';
                               _str+='<label class="layui-form-label button_del" data-id="'+value.id+'">删除</label>';
                           _str+='</div>';
                           
                       });
                       
                       $('#buttons_box').html(_str);
                       layer.msg(json.msg);
                       _json=json;

                       layui.form().render();
                   }else{
                       layer.msg(json.msg);
                       _json=json;
                   }
               },
               error  : function() {  
                   alert('error');
               }  
           }); 
           return _json;  
       }

       //删除按钮
       function _ajax_del_page_button(id){
           var id=id;
           var _data ='{';
               _data+='"id":"'+id+'"';
               _data+='}';

           var _json;
           $.ajax({  
               async:false,
               type:'post',  
               contentType:"application/x-www-form-urlencoded",
               url : "<?php echo U('Admin/PageButtons/ajax_del_page_button');?>",
               data: _data,
               dataType : 'json',
               success  : function(json) { 
                   console.log(json); 
                   if(json.code == 0){
                       layer.msg(json.msg);
                       _json=json;
                   }else{
                       layer.msg(json.msg);
                       _json=json;
                   }
               },
               error  : function() {  
                   alert('error');
               }  
           }); 
           return _json;  
       }

       //初使化按钮操作权限
       function _init_button_operate(page){
           var _data ='{';
               _data+='"page":"'+page+'"';
               _data+='}';

           var _json;
           $.ajax({  
               async:false,
               type:'post',  
               contentType:"application/x-www-form-urlencoded",
               url : "<?php echo U('Admin/PageButtons/init_button_operate');?>",
               data: _data,
               dataType : 'json',
               success  : function(json) { 
                   console.log(4444);
                   console.log(json);
                   $.each(json, function(key, value){
                       $('.'+value).attr('disabled', 'disabled');
                   });
               },
               error  : function() {  
                   alert('error');
               }  
           }); 
           return _json;  
       }
   </script>
   <script type="text/javascript">
       //layui表单
       layui.use(['form'], function(){
         var form = layui.form();

         //监听提交
         form.on('submit(demo1_save_role_buttons)', function(data){
           var gid=data.field.gid;

           var _arr=[];
           $.each(data.field, function(key, value){
               if(key!='gid'){
                   _arr.push(key);
               }
           });
           var buttons=_arr.join(',');
           var page=$('#add_button').attr('data-page');
           var json=_ajax_add_role_buttons(gid, buttons, page);
           return false;
         });

         //select_group 改变
         form.on('select(select_group)', function(data) {
           var gid=data.value;
           var page=$('#add_button').attr('data-page');

           _ajax_get_buttons(gid, page);
         });
      
       });
   </script> 


            </div>
            <!-- 权限设置  end -->

            <div class="row"> 

                  <div class="col-xs-9">
                      <div class="panel panel-default">
                        <div class="panel-heading">政彩招标信息</div>
                        <div class="panel-body">
                          <table id="grid-table"></table>
                          <div id="grid-pager"></div>
                        </div>
                      </div>

                      <div class="panel panel-default">
                        <div class="panel-heading">企业招标信息</div>
                        <div class="panel-body">
                          <table id="grid-table-1"></table>
                          <div id="grid-pager-1"></div>
                        </div>
                      </div>
                  </div>

                  <div class="col-xs-3">
                      <div class="panel panel-default">
                        <div class="panel-heading">中标企业公示</div>
                        <div class="panel-body">
                          <table id="grid-table-2"></table>
                          <div id="grid-pager-2"></div>
                        </div>
                      </div>
                  </div>

            </div>
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

    <script src="/Public/Admin/assets/js/bootstrap.min.js"></script>

    <script src="/Public/Admin/assets/js/typeahead-bs2.min.js"></script>



    <!-- page specific plugin scripts -->

    <script src="/Public/Admin/assets/js/jquery-ui-1.10.3.custom.min.js"></script>

    <script src="/Public/Admin/assets/js/jquery.ui.touch-punch.min.js"></script>

    <script src="/Public/Admin/assets/js/chosen.jquery.min.js"></script>

    <script src="/Public/Admin/assets/js/fuelux/fuelux.spinner.min.js"></script>

    <script src="/Public/Admin/assets/js/date-time/bootstrap-datepicker.min.js"></script>

    <script src="/Public/Admin/assets/js/date-time/bootstrap-timepicker.min.js"></script>

    <script src="/Public/Admin/assets/js/date-time/moment.min.js"></script>

    <script src="/Public/Admin/assets/js/date-time/daterangepicker.min.js"></script>

    <script src="/Public/Admin/assets/js/bootstrap-colorpicker.min.js"></script>

    <script src="/Public/Admin/assets/js/jquery.knob.min.js"></script>

    <script src="/Public/Admin/assets/js/jquery.autosize.min.js"></script>

    <script src="/Public/Admin/assets/js/jquery.inputlimiter.1.3.1.min.js"></script>

    <script src="/Public/Admin/assets/js/jquery.maskedinput.min.js"></script>

    <script src="/Public/Admin/assets/js/bootstrap-tag.min.js"></script>

    <script src="/Public/Admin/assets/js/jquery.dataTables.min.js"></script>

    <script src="/Public/Admin/assets/js/jquery.dataTables.bootstrap.js"></script>
    
    <!-- 模块jqgrid  start -->
    <script src="/Public/Admin/assets/js/date-time/bootstrap-datepicker.min.js"></script>
    <script src="/Public/Admin/assets/js/jqGrid/jquery.jqGrid.min.js"></script>
    <!-- <script src="/Public/Admin/assets/js/jqGrid/i18n/grid.locale-en.js"></script> -->
    <script src="/Public/Admin/assets/js/jqGrid/i18n/grid.locale-zh.js"></script>
    
    <!-- 模块jqgrid  end -->
    <script src="/Public/Admin/assets/js/jquery-ui-1.10.3.full.min.js"></script>
    <script src="/Public/Admin/assets/js/jquery.ui.touch-punch.min.js"></script>
    <!-- ace scripts -->



    <script src="/Public/Admin/assets/js/ace-elements.min.js"></script>

    <script src="/Public/Admin/assets/js/ace.min.js"></script>

    

    <!-- inline scripts related to this page -->



    <script type="text/javascript">
      //数据列表初使化
      jQuery.support.cors=true;

      function _ajax_get_grid_data(){
          var grid_data;
          $.ajax({   
              async:false,
              type:'get',  
              contentType:"application/x-www-form-urlencoded",
              url : "<?php echo U('Admin/User/ajax_get_user_list');?>",
              data: {
                  'pallet':'1'
              },
              dataType : 'json',
              success  : function(json) { 
              console.log(json); 
                  if(json.code==0){
                      grid_data=json.data;
                  }else{
                      layer.msg(json.msg);
                  }
              },
              error  : function(json) {  
                  layer.msg(json.msg);
              }  
          });  
          return grid_data;  
      } 

      function _ajax_get_grid_data_1(){
          var grid_data_1;
          $.ajax({   
              async:false,
              type:'get',  
              contentType:"application/x-www-form-urlencoded",
              url : "<?php echo U('Admin/User/ajax_get_user_list');?>",
              data: {
                  'pallet':'1'
              },
              dataType : 'json',
              success  : function(json) { 
              console.log(json); 
                  if(json.code==0){
                      grid_data_1=json.data;
                  }else{
                      layer.msg(json.msg);
                  }
              },
              error  : function(json) {  
                  layer.msg(json.msg);
              }  
          });  
          return grid_data_1;  
      } 

      function _ajax_get_grid_data_2(){
          var grid_data_2;
          $.ajax({   
              async:false,
              type:'get',  
              contentType:"application/x-www-form-urlencoded",
              url : "<?php echo U('Admin/User/ajax_get_user_list');?>",
              data: {
                  'pallet':'1'
              },
              dataType : 'json',
              success  : function(json) { 
              console.log(json); 
                  if(json.code==0){
                      grid_data_2=json.data;
                  }else{
                      layer.msg(json.msg);
                  }
              },
              error  : function(json) {  
                  layer.msg(json.msg);
              }  
          });  
          return grid_data_2;  
      } 

     
      function init_page(){
          var grid_data=_ajax_get_grid_data();
          var grid_data_1=_ajax_get_grid_data_1();
          var grid_data_2=_ajax_get_grid_data_2();

          init_grid_table(grid_data);
          init_grid_table_1(grid_data_1);
          init_grid_table_2(grid_data_2);

          //初使化按钮操作权限
          var page="<?php echo ($page); ?>";
          _init_button_operate(page);
      }

      function init_grid_table(grid_data){
          jQuery(grid_selector).jqGrid({
            data: grid_data,
            datatype: "local",
            height: 430,
            caption: "拖盘列表",

            colNames:['RowID', '名称','规格','尺寸','添加时间','供应商','操作'],
            colModel:[
              {name:'RowID',index:'RowID',  sorttype:"int",align : "center", hidden: true, editable: true ,sortable: false},

              {name:'P_Name',index:'P_Name', editable: true,align : "center",editrules: { required: true }},
              {name:'P_Format',index:'P_Format', editable: true,align : "center",editrules: { required: true }},
              {name:'P_Size',index:'P_Size', editable: true,align : "center",editrules: { required: true }},
              {name:'P_AddTime',index:'P_AddTime', editable: true,align : "center",editrules: { required: true }},
              {name:'P_Supplier',index:'P_Supplier', editable: true,align : "center",editrules: { required: true }},

              {name:'options',index:'options',align:'center',sortable:false,width:200}
            ], 
            rownumbers:true,
            rownumWidth:50,//设置行号列宽度
            autowidth:true,
            shrinkToFit:true,//ture，则按比例初始化列宽度。如果为false，则列宽度使用colModel指定的宽度
            viewrecords : true,
            rowNum:10,
            rowList:[10,20,30],
            pager : pager_selector,
            altRows: true,
            multiselect: true,
            multiboxonly: true,
          
            loadComplete : function() {
              var table = this;
              setTimeout(function(){
                updatePagerIcons(table);
              }, 0);
            },
          
            
            onSelectRow : function(ids) {
                var _rowData = $(grid_selector).jqGrid('getRowData',ids); 
                var _id=_rowData.RowID;
                var _P_Name=_rowData.P_Name;

                //板料列表
                $('#grid-table-2').jqGrid('clearGridData');
                jQuery("#grid-table-2").jqGrid('setGridParam', {
                      url : "http://"+api_url+"/Default.ashx?TaskID=2026&id=" + _id,
                      page : 1
                });
                jQuery("#grid-table-2").jqGrid('setCaption',"板料列表: " + _P_Name).trigger('reloadGrid');
            },

            gridComplete:function(){  //在此事件中循环为每一行添加修改和删除链接
                var ids=jQuery(grid_selector).jqGrid('getDataIDs');
                for(var i=0; i<ids.length; i++){
                    var id=ids[i];   console.log(id);
                    var _rowData = $(grid_selector).jqGrid('getRowData',id);

                    var options="";
                        options+= "<button style='margin-right:5px;' class='btn btn-primary btn-xs id-btn-dialog2_add_banliao' title='id-btn-dialog2_add_banliao' data-id='"+_rowData.RowID+"'><i class='icon-edit bigger-110'></i>添加</button>";
                        options+= "<button style='margin-right:5px;' class='btn btn-primary btn-xs id-btn-dialog2_edit' title='id-btn-dialog2_edit' data-id='"+_rowData.RowID+"'><i class='icon-edit bigger-110'></i>修改</button>";
                        options+= "<button class='btn btn-danger btn-xs id-btn-dialog2_del' title='id-btn-dialog2_del' data-id='"+_rowData.RowID+"'><i class='icon-trash bigger-110'></i>删除</button>";  
                    jQuery(grid_selector).jqGrid('setRowData', ids[i], { options: options });
                }
            }
          });
      }

      function init_grid_table_1(grid_data_1){
          jQuery('#grid-table-1').jqGrid({
            data: grid_data_1,
            datatype: "local",
            height: 430,
            caption: "拖盘列表",

            colNames:['RowID', '名称','规格','尺寸','添加时间','供应商','操作'],
            colModel:[
              {name:'RowID',index:'RowID',  sorttype:"int",align : "center", hidden: true, editable: true ,sortable: false},

              {name:'P_Name',index:'P_Name', editable: true,align : "center",editrules: { required: true }},
              {name:'P_Format',index:'P_Format', editable: true,align : "center",editrules: { required: true }},
              {name:'P_Size',index:'P_Size', editable: true,align : "center",editrules: { required: true }},
              {name:'P_AddTime',index:'P_AddTime', editable: true,align : "center",editrules: { required: true }},
              {name:'P_Supplier',index:'P_Supplier', editable: true,align : "center",editrules: { required: true }},

              {name:'options',index:'options',align:'center',sortable:false,width:200}
            ], 
            rownumbers:true,
            rownumWidth:50,//设置行号列宽度
            autowidth:true,
            shrinkToFit:true,//ture，则按比例初始化列宽度。如果为false，则列宽度使用colModel指定的宽度
            viewrecords : true,
            rowNum:10,
            rowList:[10,20,30],
            pager : '#grid-pager-1',
            altRows: true,
            multiselect: true,
            multiboxonly: true,
          
            loadComplete : function() {
              var table = this;
              setTimeout(function(){
                updatePagerIcons(table);
              }, 0);
            },
          
            gridComplete:function(){  //在此事件中循环为每一行添加修改和删除链接
                var ids=jQuery('#grid-table-1').jqGrid('getDataIDs');
                for(var i=0; i<ids.length; i++){
                    var id=ids[i];
                    var _rowData = $('#grid-table-1').jqGrid('getRowData',id);

                    var options="";
                        options+= "<button style='margin-right:5px;' class='btn btn-primary btn-xs id-btn-dialog2_add_banliao' title='id-btn-dialog2_add_banliao' data-id='"+_rowData.RowID+"'><i class='icon-edit bigger-110'></i>添加</button>";
                        options+= "<button style='margin-right:5px;' class='btn btn-primary btn-xs id-btn-dialog2_edit' title='id-btn-dialog2_edit' data-id='"+_rowData.RowID+"'><i class='icon-edit bigger-110'></i>修改</button>";
                        options+= "<button class='btn btn-danger btn-xs id-btn-dialog2_del' title='id-btn-dialog2_del' data-id='"+_rowData.RowID+"'><i class='icon-trash bigger-110'></i>删除</button>";  
                    jQuery('#grid-table-1').jqGrid('setRowData', ids[i], { options: options });
                }
            }
          });
      }

      function init_grid_table_2(grid_data_2){
          jQuery('#grid-table-2').jqGrid({
            data: grid_data_2,
            datatype: "local",
            height: 430,
            caption: "拖盘列表",

            colNames:['RowID', '名称','规格','尺寸','添加时间','供应商','操作'],
            colModel:[
              {name:'RowID',index:'RowID',  sorttype:"int",align : "center", hidden: true, editable: true ,sortable: false},

              {name:'P_Name',index:'P_Name', editable: true,align : "center",editrules: { required: true }},
              {name:'P_Format',index:'P_Format', editable: true,align : "center",editrules: { required: true }},
              {name:'P_Size',index:'P_Size', editable: true,align : "center",editrules: { required: true }},
              {name:'P_AddTime',index:'P_AddTime', editable: true,align : "center",editrules: { required: true }},
              {name:'P_Supplier',index:'P_Supplier', editable: true,align : "center",editrules: { required: true }},

              {name:'options',index:'options',align:'center',sortable:false,width:200}
            ], 
            rownumbers:true,
            rownumWidth:50,//设置行号列宽度
            autowidth:true,
            shrinkToFit:true,//ture，则按比例初始化列宽度。如果为false，则列宽度使用colModel指定的宽度
            viewrecords : true,
            rowNum:10,
            rowList:[10,20,30],
            pager : '#grid-pager-2',
            altRows: true,
            multiselect: true,
            multiboxonly: true,
          
            loadComplete : function() {
              var table = this;
              setTimeout(function(){
                updatePagerIcons(table);
              }, 0);
            },

            gridComplete:function(){  //在此事件中循环为每一行添加修改和删除链接
                var ids=jQuery('#grid-table-2').jqGrid('getDataIDs');
                for(var i=0; i<ids.length; i++){
                    var id=ids[i];   console.log(id);
                    var _rowData = $('#grid-table-2').jqGrid('getRowData',id);

                    var options="";
                        options+= "<button style='margin-right:5px;' class='btn btn-primary btn-xs id-btn-dialog2_add_banliao' title='id-btn-dialog2_add_banliao' data-id='"+_rowData.RowID+"'><i class='icon-edit bigger-110'></i>添加</button>";
                        options+= "<button style='margin-right:5px;' class='btn btn-primary btn-xs id-btn-dialog2_edit' title='id-btn-dialog2_edit' data-id='"+_rowData.RowID+"'><i class='icon-edit bigger-110'></i>修改</button>";
                        options+= "<button class='btn btn-danger btn-xs id-btn-dialog2_del' title='id-btn-dialog2_del' data-id='"+_rowData.RowID+"'><i class='icon-trash bigger-110'></i>删除</button>";  
                    jQuery('#grid-table-2').jqGrid('setRowData', ids[i], { options: options });
                }
            }
          });
      }

      //replace icons with FontAwesome icons like above   //更新分页图标  
      function updatePagerIcons(table) {
          var replacement = 
          {
            'ui-icon-seek-first' : 'icon-double-angle-left bigger-140',
            'ui-icon-seek-prev' : 'icon-angle-left bigger-140',
            'ui-icon-seek-next' : 'icon-angle-right bigger-140',
            'ui-icon-seek-end' : 'icon-double-angle-right bigger-140'
          };
          $('.ui-pg-table:not(.navtable) > tbody > tr > .ui-pg-button > .ui-icon').each(function(){
            var icon = $(this);
            var $class = $.trim(icon.attr('class').replace('ui-icon', ''));
            
            if($class in replacement) icon.attr('class', 'ui-icon '+replacement[$class]);
          })
      }


      $(function() {
          init_page();

          //添加
          $( ".id-btn-dialog2_add" ).on('click', function(e) {
            e.preventDefault();
            
            $( "#dialog-confirm_add" ).removeClass('hide').dialog({
              resizable: false,
              modal: true,
              title: "",
              width:800,
              title_html: true,
            });

            $("div[aria-describedby='dialog-confirm_add'] div span.ui-dialog-title").html("<div class='widget-header'><h4 class='smaller'><i class='icon-warning-sign red'></i> 添加：</h4></div>");
          });

          //编辑
          $( "body" ).on('click','.id-btn-dialog2_edit', function(e) {
            e.preventDefault();

            var _id=$(this).attr('data-id');
            $('.demo1_edit').attr('data-id',_id);

            //渲染数据
            var _json=_ajax_get_row_info(_id);
            
            $( "#dialog-confirm_edit" ).removeClass('hide').dialog({
              resizable: false,
              modal: true,
              title: "",
              width:800,
              title_html: true,
            });

            $("div[aria-describedby='dialog-confirm_edit'] div span.ui-dialog-title").html("<div class='widget-header'><h4 class='smaller'><i class='icon-warning-sign red'></i> 编辑：</h4></div>");
          });
      });
    </script>
    
   
    <!-- 确认弹框 start-->
    <div id="dialog-confirm_add" class="hide">
       <div class="row">
           <form class="layui-form layui-form-pane col-xs-12" action="<?php echo U('Admin/Course/index');?>">
            
            <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                <tbody id="un_banliao_list_box">

                  <tr>
                    <td class="center">
                      <div class="layui-inline">
                        <div class="layui-form-item">
                          <label class="layui-form-label">名称</label>
                          <div class="layui-input-inline">
                            <input type="text" name="P_Name" placeholder="" autocomplete="off" class="layui-input P_Name">
                          </div>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="layui-inline">
                        <div class="layui-form-item">
                          <label class="layui-form-label">规格</label>
                          <div class="layui-input-inline">
                            <input type="text" name="P_Format" lay-verify="required" placeholder="" class="layui-input P_Format">
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="center">
                      <div class="layui-inline">
                        <div class="layui-form-item">
                          <label class="layui-form-label">尺寸</label>
                          <div class="layui-input-inline">
                            <input type="text" name="P_Size" placeholder="" autocomplete="off" class="layui-input P_Size">
                          </div>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="layui-inline">
                        <div class="layui-form-item">
                          <label class="layui-form-label">供应商</label>
                          <div class="layui-input-inline">
                            <input type="text" name="P_Supplier" lay-verify="required" placeholder="" class="layui-input P_Supplier">
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="2" style="text-align:right;">
                      <button class="layui-btn" lay-submit="" lay-filter="demo1_add">确认</button>
                    </td>
                  </tr>
                </tfoot>
              </table>

           </form>
        </div>
    </div><!-- #dialog-confirm -->


    <!-- 确认弹框 start-->
    <div id="dialog-confirm_edit" class="hide">
       <div class="row">
           <form class="layui-form layui-form-pane col-xs-12" action="<?php echo U('Admin/Course/index');?>">
            
            <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                <tbody id="edit_form">

                  <tr>
                    <td class="center">
                      <div class="layui-inline">
                        <div class="layui-form-item">
                          <label class="layui-form-label">名称</label>
                          <div class="layui-input-inline">
                            <input type="text" name="P_Name" placeholder="" autocomplete="off" class="layui-input P_Name">
                          </div>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="layui-inline">
                        <div class="layui-form-item">
                          <label class="layui-form-label">规格</label>
                          <div class="layui-input-inline">
                            <input type="text" name="P_Format" placeholder="" class="layui-input P_Format">
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="center">
                      <div class="layui-inline">
                        <div class="layui-form-item">
                          <label class="layui-form-label">尺寸</label>
                          <div class="layui-input-inline">
                            <input type="text" name="P_Size" placeholder="" autocomplete="off" class="layui-input P_Size">
                          </div>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="layui-inline">
                        <div class="layui-form-item">
                          <label class="layui-form-label">供应商</label>
                          <div class="layui-input-inline">
                            <input type="text" name="P_Supplier" lay-verify="required" placeholder="" class="layui-input P_Supplier">
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="2" style="text-align:right;">
                      <button class="layui-btn demo1_edit" lay-submit="" lay-filter="demo1_edit">确认</button>
                    </td>
                  </tr>
                </tfoot>
              </table>

           </form>
        </div>
    </div><!-- #dialog-confirm -->

    <!-- 模板引擎doT.js    start -->
    <script id="j-tmpl" type="text/template">
        {{ if(it.success){ }}

                {{ for (var i = 0, l = it.data.length; i < l; i++) { }}

                      <tr>
                        <td class="center">
                          <label>
                            <input type="checkbox" class="ace" />
                            <span class="lbl"></span>
                          </label>
                        </td>
                        <td>
                          <a href="#">{{=it.data[i].id}}</a>
                        </td>
                        <td>{{=it.data[i].title}}</td>
                        <td class="hidden-480">{{=it.data[i].time}}</td>
                        <td>{{=it.data[i].username}}</td>
                        <td class="hidden-480">
                          <span class="label label-sm label-warning">待判定</span>
                        </td>
                        <td>
                          <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                            <button class="btn btn-xs btn-success">
                              <i class="icon-ok bigger-120"></i>
                            </button>
                            <button class="btn btn-xs btn-info">
                              <a href="#modal-form" role="button" data-toggle="modal"><i class="icon-edit bigger-120"></i></a>
                            </button>
                            <button class="btn btn-xs btn-danger">
                              <i class="icon-trash bigger-120"></i>
                            </button>
                            <button class="btn btn-xs btn-warning">
                              <i class="icon-flag bigger-120"></i>
                            </button>
                          </div>
                          <div class="visible-xs visible-sm hidden-md hidden-lg">
                            <div class="inline position-relative">
                              <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-cog icon-only bigger-110"></i>
                              </button>
                              <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
                                <li>
                                  <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
                                    <span class="blue">
                                      <i class="icon-zoom-in bigger-120"></i>
                                    </span>
                                  </a>
                                </li>
                                <li>
                                  <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
                                    <span class="green">
                                      <i class="icon-edit bigger-120"></i>
                                    </span>
                                  </a>
                                </li>
                                <li>
                                  <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
                                    <span class="red">
                                      <i class="icon-trash bigger-120"></i>
                                    </span>
                                  </a>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </td>
                      </tr>

                {{ } }}

        {{ }else{ }}

                <h2>暂无数据</h2>

        {{ } }}
    </script>


    <!-- 模板引擎doT.js    start -->
    <script id="j-tmpl_banliao_dialog" type="text/template">
        {{ if(it.code==0){ }}

                {{ for (var i = 0, l = it.data.length; i < l; i++) { }}

                      <tr data-RowID="{{=it.data[i].RowID}}" data-B_Name="{{=it.data[i].B_Name}}">
                        <td class="center">
                            <a href="#">{{=it.data[i].B_Name}}</a>
                        </td>
                      </tr>

                {{ } }}

        {{ }else{ }}

                <h2>暂无数据</h2>

        {{ } }}
    </script>
    <script src="/Public/Admin/doT-master/doT.js"></script>
    <script type="text/javascript">
        $(function(){
            //smartMenu右键自定义上下文菜单插件初使化
            Fn_Init_smartMenu();
            
            $('.ui-state-default.ui-jqgrid-hdiv').click(function(){
                Fn_Init_smartMenu();
            });

            $('.ui-jqgrid-bdiv').click(function(){
                Fn_Init_smartMenu();
            });
        });
    </script>
    <!-- 模板引擎doT.js    end -->
    



    <!-- jQuery smartMenu右键自定义上下文菜单插件  start -->
    <script type="text/javascript" src="/Public/Admin/jquery-smartMenu/js/jquery-smartMenu.js"></script>
    <script>
        function Fn_Init_smartMenu(){
            var chkSingle = $("th input"), chkGroup = $("td input");
            var funTrStyle = function() {
              chkGroup.each(function() {
                if ($(this).attr("checked")) {
                  $(this).parents("tr").addClass("bg"); 
                } else {
                  $(this).parents("tr").removeClass("bg");  
                }
              });
            }, funTrGet = function() {
              return  $("td input:checked").parents("tr");
            };

            chkSingle.bind("click", function() {
              if ($(this).attr("checked")) {
                chkGroup.attr("checked", "checked");
              } else {
                chkGroup.attr("checked", "");
              }
              funTrStyle(); 
            });

            chkGroup.bind("click", funTrStyle);
            funTrStyle();

            //自定义右键上下文
            var objDelete = {
              text: "删除",
              func: function() {
                  $('#del_grid-table').trigger('click');
              } 
            }, objShow = {
              text: "查看",
              func: function() {
                  $('#view_grid-table').trigger('click');
              } 
            }, objEdit = {
              text: "编辑",
              func: function() {
                  $('#edit_grid-table').trigger('click');
              }
            }, objUnRead = {}, objSend = {};

            var mailMenuData = [
              [objDelete, objShow]
            ];

            $("#grid-table>tbody>tr").smartMenu(mailMenuData, {
              name: "mail",
              beforeShow: function() {    
                //根据选中的是否是已读显示不同的上下文菜单
                $(this).find("input").attr("checked", "checked"); 
                funTrStyle();

                //动态数据，及时清除
                $.smartMenu.remove();

                //确定显示数据 - 主要是已读与未读
                var numTrBold = 0, numTrNormal = 0, eleTr = funTrGet();
                eleTr.each(function() {
                  if ($(this).css("font-weight") === "700") {
                    numTrBold++; 
                  } 
                  if ($(this).css("font-weight") === "400") {
                    numTrNormal++;  
                  }
                });

                if (eleTr.size() === numTrBold) {
                  //全是粗体  
                  mailMenuData[1] = [objEdit];
                } else if (eleTr.size() === numTrNormal) {
                  //全是正常
                  mailMenuData[1] = [objEdit];
                } else {
                  //混杂
                  mailMenuData[1] = [objEdit];
                }
              }
            });
        }
    </script>
    <!-- jQuery smartMenu右键自定义上下文菜单插件  end -->


    <script type="text/javascript">
      jQuery(function($) {
          
      });


    </script>



    <script>
        layui.use('laydate', function(){
            var laydate = layui.laydate;
            var start = {
              istoday: false
              ,choose: function(datas){
                end.min = datas; //开始日选好后，重置结束日的最小日期
                end.start = datas //将结束日的初始值设定为开始日
              }
            };

            var end = {
              istoday: false
              ,choose: function(datas){
                start.max = datas; //结束日选好后，重置开始日的最大日期
              }
            };

            document.getElementById('LAY_demorange_s').onclick = function(){
              start.elem = this;
              laydate(start);
            }

            document.getElementById('LAY_demorange_e').onclick = function(){
              end.elem = this
              laydate(end);
            }
        });

    </script>
    
    <script>
        layui.use(['form', 'layedit', 'laydate'], function(){
          var form = layui.form()
          ,layer = layui.layer
          ,layedit = layui.layedit
          ,laydate = layui.laydate;

          //创建一个编辑器
          var editIndex = layedit.build('LAY_demo_editor');

          //自定义验证规则
          form.verify({
            title: function(value){
              if(value.length < 5){
                return '标题至少得5个字符啊';
              }
            }
            ,pass: [/(.+){6,12}$/, '密码必须6到12位']
            ,content: function(value){
              layedit.sync(editIndex);
            }
          });

          //监听提交
          form.on('submit(demo1_add)', function(data){
            var _json=_ajax_add(data.field);
            return false;
          });

          //监听提交
          form.on('submit(demo1_edit)', function(data){
            var _id=$(this).attr('data-id');
            var _json=_ajax_edit(data.field, _id);
            return false;
          });
        });
    </script>
  </body>
</html>