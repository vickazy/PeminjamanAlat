		<header class="header bg-ui-general">
			<div class="header-info">
				<h1 class="header-title">
					Data Keperluan Jurusan <strong>Animasi SMKN 2 Cimahi</strong>
				</h1>
			</div>

			<div class="header-action">
				<nav class="nav">
					<a class="nav-link active" href="<?php echo base_url('master/Keperluan'); ?>">Lihat Data</a>
					<a class="nav-link" href="<?php echo base_url('master/Keperluan/tambah'); ?>">Tambah</a>
				</nav>
			</div>
		</header>

		<div class="main-content">
			<center>
				<div class="col-md-4 col-lg-6">
					<div class="card">
						<header class="card-header">
							<h4 class="card-title">Ubah Data Keperluan</h4>
						</header>

						<?php foreach($keperluan as $u){ ?>
							<div class="card-body">
								<form action="<?php echo base_url('master/Keperluan/update'); ?>" method="post" class="form-type-material" data-provide="validation">
									<div class="form-group">
										<input type="text" class="form-control" name="id_keperluan" value="<?php echo $u->id_keperluan ?>" readonly>
										<label>ID Keperluan</label>
									</div>
									<div class="form-group">
										<input type="text" class="form-control" name="nama_keperluan" value="<?php echo $u->nama_keperluan ?>" required>
										<label>Nama Keperluan</label>
									</div>
							</div>

							<footer class="card-footer">
								<input type="submit" name="submit" value="Submit" class="btn btn-primary">
								<a href="<?php echo base_url('master/Keperluan') ?>" class="btn btn-secondary">Batal</a>
							</footer>
								</form>
						<?php } ?>
					</div>
				</div>
			</center>
		</div>