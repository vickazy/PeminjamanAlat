		<header class="header bg-ui-general">
			<div class="header-info">
				<h1 class="header-title">
					Data Alat Jurusan <strong>Animasi SMKN 2 Cimahi</strong>
				</h1>
			</div>

			<div class="header-action">
				<nav class="nav">
					<a class="nav-link active" href="<?php echo base_url('master/Alat'); ?>">Lihat Data</a>
					<a class="nav-link" href="<?php echo base_url('master/Alat/tambah'); ?>">Tambah</a>
				</nav>
			</div>
		</header>

		<div class="main-content">
			<center>
				<div class="col-md-4 col-lg-6">
					<div class="card">
						<header class="card-header">
							<h4 class="card-title">Ubah Data Alat</h4>
						</header>

						<?php foreach($alat as $u){ ?>
							<div class="card-body">
								<form action="<?php echo base_url('master/Alat/update'); ?>" method="post" class="form-type-material" data-provide="validation">
									<div class="form-group">
										<input type="text" class="form-control" name="id_alat" value="<?php echo $u->id_alat ?>" readonly>
										<label>ID Alat</label>
									</div>
									<div class="form-group">
										<input type="text" class="form-control" name="nama_alat" value="<?php echo $u->nama_alat ?>" required>
										<label>Nama Alat</label>
									</div>
									<div class="form-group">
										<input type="number" class="form-control" name="stok" value="<?php echo $u->stok ?>" required>
										<label>Stok</label>
									</div>
									<div class="form-group">
										<input type="number" class="form-control" name="stok" value="<?php echo $u->jumlah ?>" required>
										<label>Jumlah Yang Dimiliki</label>
									</div>
							</div>

							<footer class="card-footer">
								<input type="submit" name="submit" value="Submit" class="btn btn-primary">
								<a href="<?php echo base_url('master/Alat') ?>" class="btn btn-secondary">Batal</a>
							</footer>
								</form>
						<?php } ?>
					</div>
				</div>
			</center>
		</div>