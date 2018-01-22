	<aside class="sidebar sidebar-icons-right sidebar-icons-boxed sidebar-expand-lg">
		<header class="sidebar-header">
			<span class="logo">
				<a href="<?php echo base_url('master/Siswa'); ?>">Peminjaman Alat</a>
			</span>
			<span class="sidebar-toggle-fold"></span>
		</header>

		<nav class="sidebar-navigation">
			<ul class="menu">

				<li class="menu-category">Transaksi</li>
				<li class="menu-item <?php if($this->uri->segment(2)=="Siswa"){echo "active";} ?>">
					<a class="menu-link" href="<?php echo base_url('master/Siswa'); ?>">
						<span class="title">Peminjaman</span>
						<i class="material-icons">#</i>
					</a>
				</li>
				
			</ul>
		</nav>
	</aside>