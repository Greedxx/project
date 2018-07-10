<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<!-- Plugin Stylesheets first to ease overrides -->
<link rel="stylesheet" type="text/css" href="/admins/plugins/colorpicker/colorpicker.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/custom-plugins/wizard/wizard.css" media="screen">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="/admins/bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="/admins/css/mws-style.css" media="screen">

<link rel="stylesheet" type="text/css" href="/admins/css/icons/icol16.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/css/icons/icol32.css" media="screen">

<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="/admins/css/demo.css" media="screen">

<!-- jQuery-UI Stylesheet -->
<link rel="stylesheet" type="text/css" href="/admins/jui/css/jquery.ui.all.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/jui/jquery-ui.custom.css" media="screen">

<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="/admins/css/mws-theme.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/css/themer.css" media="screen">


<link rel="stylesheet" type="text/css" href="/admins/css/hang.css">
<link rel="stylesheet" type="text/css" href="/admins/css/paginate.css">
<link rel="stylesheet" type="text/css" href="/admins/css/mypage.css" media="screen">


<!-- 百度编辑器 -->
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/ueditor/lang/zh-cn/zh-cn.js"></script>

@yield('method')
<title>@yield('title')</title>

</head>

<body>
	<!-- Header -->
	<div id="mws-header" class="clearfix">
    
    	<!-- Logo Container -->
    	<div id="mws-logo-container">
        
        	<!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
        	<div id="mws-logo-wrap">
            	<h3 style='color:white'>仙女商城</h3>
			</div>
        </div>
        
        <!-- User Tools (notifications, logout, profile, change password) -->
        <div id="mws-user-tools" class="clearfix">
        
        	<!-- Notifications -->
      <!--   	<div id="mws-user-notif" class="mws-dropdown-menu">
            	<a href="#" data-toggle="dropdown" class="mws-dropdown-trigger"><i class="icon-exclamation-sign"></i></a> -->
                
                <!-- Unread notification count -->
             <!--    <span class="mws-dropdown-notif">35</span> -->
                
                <!-- Notifications dropdown -->
<!--                 <div class="mws-dropdown-box">
                	<div class="mws-dropdown-content">
                        <ul class="mws-notifications">
                        	<li class="read">
                            	<a href="#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="read">
                            	<a href="#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                          
                        </ul>
                        <div class="mws-dropdown-viewall">
	                        <a href="#">View All Notifications</a>
                        </div>
                    </div>
                </div>
            </div> -->
            
            <!-- Messages -->
          <!--   <div id="mws-user-message" class="mws-dropdown-menu">
            	<a href="#" data-toggle="dropdown" class="mws-dropdown-trigger"><i class="icon-envelope"></i></a> -->
                
                <!-- Unred messages count -->
                <!-- <span class="mws-dropdown-notif">35</span> -->
                
                <!-- Messages dropdown -->
    <!--             <div class="mws-dropdown-box">
                	<div class="mws-dropdown-content">
                        <ul class="mws-messages">
                        	<li class="read">
                            	<a href="#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        
                        </ul>
                        <div class="mws-dropdown-viewall">
	                        <a href="#">View All Messages</a>
                        </div>
                    </div>
                </div>
            </div> -->
            
            <!-- User Information and functions section -->
            <div id="mws-user-info" class="mws-inset">
            
            	<!-- User Photo -->
            	<div id="mws-user-photo">
                	<img src="/admins/example/profile.jpg" alt="User Photo">
                </div>
                
                <!-- Username and Functions -->
                <div id="mws-user-functions">
                    <div id="mws-username">
                        Hello, 管理员
                    </div>
                    <ul>
                    	
                        <li><a href="#">修改密码</a></li>
                        <li><a href="index.html">退出</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Start Main Wrapper -->
    <div id="mws-wrapper">
    
    	<!-- Necessary markup, do not remove -->
		<div id="mws-sidebar-stitch"></div>
		<div id="mws-sidebar-bg"></div>
        
        <!-- Sidebar Wrapper -->
        <div id="mws-sidebar">
        
            <!-- Hidden Nav Collapse Button -->
            <div id="mws-nav-collapse">
                <span></span>
                <span></span>
                <span></span>
            </div>
            
        	<!-- Searchbox -->
   
            
            <!-- Main Navigation -->
            <div id="mws-navigation">
                <ul>
                
                    <li>
                        <a href="#"><i class="icon-align-justify"></i>类别管理</a>
                        <ul class='closed'>
                            <li><a href="/admin/cate/create">添加类别</a></li>
                            <li><a href="/admin/cate">浏览类别</a></li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="#"><i class="icon-mobile-phone"></i>商品管理</a>
                        <ul class='closed'>
                            <li><a href="/admin/goods/create">添加商品</a></li>
                            <li><a href="/admin/goods/">浏览商品</a></li>
                            
                        </ul>
                    </li>
                    
                     <li>
                        <a href="#"><i class="icon-newspaper"></i>文章管理</a>
                        <ul class='closed'>
                            <li><a href="/admin/content/create">添加文章</a></li>
                            <li><a href="/admin/content/">浏览文章</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="icon-list"></i>订单管理</a>
                        <ul class='closed'>
                            <li><a href="/admin/orders">订单列表</a></li>
                            
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="icon-pictures"></i>商品评论管理</a>
                        <ul class='closed'>
                            <li><a href="/admin/message">管理评论</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="icon-rocket"></i>物流管理</a>
                        <ul class='closed'>
                            <li><a href="/admin/wuliu/create">添加厂商</a></li>
                            <li><a href="/admin/wuliu/">物流厂商</a></li>
                            <li><a href="/admin/wuliulist">物流列表</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="icon-cord"></i>支付接口管理</a>
                        <ul class='closed'>
                            <li><a href="/admin/cate/create">添加接口</a></li>
                            <li><a href="/admin/cate">管理接口</a></li>
                        </ul>
                    </li>
                    

                </ul>
            </div>         
        </div>
        
        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
        
        	<!-- Inner Container Start -->
            <div class="container">
            @section('content')


            @show
            </div>
            <!-- Inner Container End -->
                       
            <!-- Footer -->
            <div id="mws-footer">
            	版权归 仙女商场 所有
            </div>
            
        </div>
        <!-- Main Container End -->
        
    </div>

    <!-- JavaScript Plugins -->
    <script src="/admins/js/libs/jquery-1.8.3.min.js"></script>
    
    <script src="/admins/js/libs/jquery.mousewheel.min.js"></script>
    <script src="/admins/js/libs/jquery.placeholder.min.js"></script>
    <script src="/admins/custom-plugins/fileinput.js"></script>
    
    <!-- jQuery-UI Dependent Scripts -->
    <script src="/admins/jui/js/jquery-ui-1.9.2.min.js"></script>
    <script src="/admins/jui/jquery-ui.custom.min.js"></script>
    <script src="/admins/jui/js/jquery.ui.touch-punch.js"></script>

    <!-- Plugin Scripts -->
    <script src="/admins/plugins/datatables/jquery.dataTables.min.js"></script>
    <!--[if lt IE 9]>
    <script src="js/libs/excanvas.min.js"></script>
    <![endif]-->
    <script src="/admins/plugins/flot/jquery.flot.min.js"></script>
    <script src="/admins/plugins/flot/plugins/jquery.flot.tooltip.min.js"></script>
    <script src="/admins/plugins/flot/plugins/jquery.flot.pie.min.js"></script>
    <script src="/admins/plugins/flot/plugins/jquery.flot.stack.min.js"></script>
    <script src="/admins/plugins/flot/plugins/jquery.flot.resize.min.js"></script>
    <script src="/admins/plugins/colorpicker/colorpicker-min.js"></script>
    <script src="/admins/plugins/validate/jquery.validate-min.js"></script>
    <script src="/admins/custom-plugins/wizard/wizard.min.js"></script>

    <!-- Core Script -->
    <script src="/admins/bootstrap/js/bootstrap.min.js"></script>
    <script src="/admins/js/core/mws.js"></script>

    <!-- Themer Script (Remove if not needed) -->
    <script src="/admins/js/core/themer.js"></script>

    <!-- Demo Scripts (remove if not needed) -->
    <script src="/admins/js/demo/demo.dashboard.js"></script>
    

    @section('js')
    

    @show
    


</body>
</html>