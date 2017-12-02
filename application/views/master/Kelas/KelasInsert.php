		<header class="header bg-ui-general">
			<div class="header-info">
				<h1 class="header-title">
					Data Kelas Jurusan <strong>Animasi SMKN 2 Cimahi</strong>
				</h1>
			</div>

			<div class="header-action">
				<nav class="nav">
					<a class="nav-link" href="<?php echo base_url('master/Kelas'); ?>">Lihat Data</a>
					<a class="nav-link active" href="<?php echo base_url('master/Kelas/tambah'); ?>">Tambah</a>
				</nav>
			</div>
		</header>

		<div class="main-content">
			<center>
				<div class="col-md-4 col-lg-6">
					<div class="card">
						<header class="card-header">
							<h4 class="card-title">Tambah Data Kelas</h4>
						</header>

						<div class="card-body">
							<form action="<?php echo base_url('master/Kelas/tambah'); ?>" method="post" class="form-type-material" data-provide="validation">
								<div class="form-group">
									<input type="text" class="form-control" name="id_kelas" value="<?php echo $kode; ?>" readonly>
									<label>ID Kelas</label>
								</div>
								<div class="form-group">
									<input type="text" class="form-control" name="nama_kelas" required>
									<label>Nama Kelas</label>
								</div>
						</div>

						<footer class="card-footer">
							<input type="submit" name="submit" value="Submit" class="btn btn-primary">
						</footer>
							</form>
					</div>
				</div>
			</center>
		</div>