<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Peminjaman Alat Lab Animasi</title>

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,300i" rel="stylesheet">

	<!-- Styles -->
	<link href="<?php echo base_url('assets/css/core.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/app.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/style.min.css'); ?>" rel="stylesheet">

	<!-- Favicons -->
	<link rel="apple-touch-icon" href="<?php echo base_url('assets/img/apple-touch-icon.png'); ?>">
	<link rel="icon" href="<?php echo base_url('assets/img/favicon.png'); ?>">
</head>
<body>

	<!-- Preloader -->
	<div class="preloader">
		<div class="spinner-dots">
			<span class="dot1"></span>
			<span class="dot2"></span>
			<span class="dot3"></span>
		</div>
	</div>

	<!-- Sidebar -->
	<aside class="sidebar sidebar-icons-right sidebar-icons-boxed sidebar-expand-lg">
		<header class="sidebar-header">
			<a class="logo-icon" href="#"><img src="assets/img/logo-icon-light.png" alt="logo icon"></a>
			<span class="logo">
				<a href="#"><img src="assets/img/logo-light.png" alt="logo"></a>
			</span>
			<span class="sidebar-toggle-fold"></span>
		</header>

		<nav class="sidebar-navigation">
			<ul class="menu">
				<li class="menu-category">Category 1</li>

				<li class="menu-item active">
					<a class="menu-link" href="../dashboard/general.html">
						<span class="icon fa fa-home"></span>
						<span class="title">Dashboard</span>
					</a>
				</li>

				<li class="menu-item">
					<a class="menu-link" href="#">
						<span class="icon fa fa-user"></span>
						<span class="title">Users</span>
						<span class="arrow"></span>
					</a>

					<ul class="menu-submenu">
						<li class="menu-item">
							<a class="menu-link" href="#">
								<span class="dot"></span>
								<span class="title">Moderators</span>
							</a>
						</li>

						<li class="menu-item">
							<a class="menu-link" href="#">
								<span class="dot"></span>
								<span class="title">Customers</span>
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</nav>
	</aside>
	<!-- END Sidebar -->

	<!-- Topbar -->
	<header class="topbar">
		<div class="topbar-left">
			<span class="topbar-btn sidebar-toggler"><i>&#9776;</i></span>

			<a class="topbar-btn d-none d-md-block" href="#" data-provide="fullscreen tooltip" title="Fullscreen">
				<i class="material-icons fullscreen-default">fullscreen</i>
				<i class="material-icons fullscreen-active">fullscreen_exit</i>
			</a>

			<div class="topbar-divider d-none d-md-block"></div>
		</div>

		<div class="topbar-right">
			<ul class="topbar-btns">

				<li class="dropdown">
					<span class="topbar-btn" data-toggle="dropdown"><img class="avatar" src="assets/img/avatar/default.jpg" alt="..."></span>
					<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="#"><i class="ti-user"></i> Profile</a>
						<a class="dropdown-item" href="#"><i class="ti-settings"></i> Settings</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="../page-extra/user-lock-1.html"><i class="ti-lock"></i> Lock</a>
						<a class="dropdown-item" href="../page-extra/user-login-3.html"><i class="ti-power-off"></i> Logout</a>
					</div>
				</li>

			</ul>
		</div>
	</header>
	<!-- END Topbar -->

	<!-- Main container -->
	<main>
		<div class="main-content">

			<div class="card">
				<h4 class="card-title">Card title</h4>

				<div class="card-body">

				</div>
			</div>

		</div><!--/.main-content -->

		<!-- Footer -->
		<footer class="site-footer">
			<div class="row">
				<div class="col-md-6">
					<p class="text-center text-md-left">Copyright © 2017 <a href="http://thetheme.io/theadmin">TheAdmin</a>. All rights reserved.</p>
				</div>

				<div class="col-md-6">
					<ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
						<li class="nav-item">
							<a class="nav-link" href="../help/articles.html">Documentation</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="../help/faq.html">FAQ</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="https://themeforest.net/item/theadmin-responsive-bootstrap-4-admin-dashboard-webapp-template/20475359?license=regular&amp;open_purchase_for_item_id=20475359&amp;purchasable=source&amp;ref=thethemeio">Purchase Now</a>
						</li>
					</ul>
				</div>
			</div>
		</footer>
		<!-- END Footer -->
	</main>
	<!-- END Main container -->


	<!-- Global quickview -->
	<div id="qv-global" class="quickview" data-url="assets/data/quickview-global.html">
		<div class="spinner-linear">
			<div class="line"></div>
		</div>
	</div>
	<!-- END Global quickview -->

    <!-- Scripts -->
	<script src="<?php echo base_url('assets/js/core.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/app.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/script.min.js'); ?>"></script>

</body>
</html>