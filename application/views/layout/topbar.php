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
						<p class="dropdown-item">Hai, <?php echo $this->session->userdata("nama_petugas"); ?></p>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#"><i class="ti-user"></i> Profile</a>
						<a class="dropdown-item" href="#"><i class="ti-settings"></i> Settings</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="<?php echo base_url('login/logout'); ?>"><i class="ti-power-off"></i> Logout</a>
					</div>
				</li>

			</ul>
		</div>
	</header>