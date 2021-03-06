	<aside class="sidebar sidebar-icons-right sidebar-icons-boxed sidebar-expand-lg">
		<header class="sidebar-header">
			<span class="logo">
				<a href="<?php echo base_url(); ?>">Peminjaman Alat</a>
			</span>
			<span class="sidebar-toggle-fold"></span>
		</header>

		<nav class="sidebar-navigation">
			<ul class="menu">
				<li class="menu-category">Master Admin</li>
				<li class="menu-item <?php if($this->uri->segment(1)==""){echo "active";} ?>">
					<a class="menu-link" href="<?php echo base_url(); ?>">
						<span class="title">Halaman Utama</span>
						<i class="material-icons">home</i>
					</a>
				</li>
				<li class="menu-item <?php if($this->uri->segment(2)=="Alat"){echo "active";} ?>">
					<a class="menu-link" href="<?php echo base_url('master/Alat'); ?>">
						<span class="title">Data Alat</span>
						<i class="material-icons">build</i>
					</a>
				</li>
				<li class="menu-item <?php if($this->uri->segment(2)=="Kelas"){echo "active";} ?>">
					<a class="menu-link" href="<?php echo base_url('master/Kelas'); ?>">
						<span class="title">Data Kelas</span>
						<i class="material-icons">store</i>
					</a>
				</li>
				<li class="menu-item <?php if($this->uri->segment(2)=="Keperluan"){echo "active";} ?>">
					<a class="menu-link" href="<?php echo base_url('master/Keperluan'); ?>">
						<span class="title">Data Keperluan</span>
						<i class="material-icons">help_outline</i>
					</a>
				</li>
				<li class="menu-item <?php if($this->uri->segment(2)=="Petugas"){echo "active";} ?>">
					<a class="menu-link" href="<?php echo base_url('master/Petugas'); ?>">
						<span class="title">Data Petugas</span>
						<i class="material-icons">people</i>
					</a>
				</li>

				<li class="menu-category">Transaksi</li>
				<li class="menu-item <?php if($this->uri->segment(2)=="Minjam"){echo "active";} ?>">
					<a class="menu-link" href="<?php echo base_url('transaksi/Minjam'); ?>">
						<span class="title">Peminjaman</span>
						<i class="material-icons">#</i>
					</a>
				</li>
				<li class="menu-item <?php if($this->uri->segment(2)=="Pengembalian"){echo "active";} ?>">
					<a class="menu-link" href="<?php echo base_url('transaksi/Pengembalian'); ?>">
						<span class="title">Pengembalian</span>
						<i class="material-icons">#</i>
					</a>
				</li>

				<li class="menu-category">Laporan</li>
				<li class="menu-item">
					<a class="menu-link" href="#">
						<span class="title">Data Petugas</span>
						<span class="arrow"></span>
						<i class="material-icons">people</i>
					</a>

					<ul class="menu-submenu">
						<li class="menu-item">
							<a class="menu-link" href="#">
								<span class="dot"></span>
								<span class="title">Lihat Data Petugas</span>
							</a>
						</li>

						<li class="menu-item">
							<a class="menu-link" href="#">
								<span class="dot"></span>
								<span class="title">Tambah Data Petugas</span>
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</nav>
	</aside>