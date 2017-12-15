		<header class="header bg-ui-general">
			<div class="header-info">
				<h1 class="header-title">
					Transaksi Pinjam <strong>Animasi SMKN 2 Cimahi</strong>
				</h1>
			</div>

			<div class="header-action">
				<nav class="nav">
					<a class="nav-link active" href="<?php echo base_url('transaksi/Minjam/tambah'); ?>">Tambah</a>
					<a class="nav-link" href="<?php echo base_url('master/Alat'); ?>">Lihat Data</a>
				</nav>
			</div>
		</header>

		<div class="main-content">
			<div class="col-12 card form-type-material">
				<h4 class="card-title"><strong>Tambah</strong></h4>

				<div class="card-body row">
					<div class="col-md-12">
						<form class="form-inline" method="post" id="detail_form">
							<div class="form-group">
								<label>Nama Alat</label>
								<input class="form-control" type="text" name="id_alat" id="id_alat">

								<input type="text" name="id_detail" id="id_detail" value="<?php echo $id_detail; ?>">
								<input type="hidden" name="id_peminjam" id="id_peminjam" value="<?php echo $kode; ?>">
							</div>

							<div class="form-group">
								<label>Jumlah</label>
								<input class="form-control" type="number" name="jumlah_detail" id="jumlah_detail">
							</div>

							<button class="btn btn-primary">Tambah</button>
						</form>
					</div>
				</div>

				<form action="<?php echo base_url('transaksi/Minjam/tambah'); ?>" method="post" data-provide="validation">
					<div class="card-body row">
						<div class="col-md-6">
							<div class="form-group">
								<label>ID Peminjaman</label>
								<input class="form-control" type="text" name="id_peminjam" value="<?php echo $kode; ?>" readonly>
							</div>
							<div class="form-group">
								<label>NIS</label>
								<input class="form-control" type="text" name="nis">
							</div>
							<div class="form-group">
								<label class="required">Nama Peminjam</label>
								<input class="form-control" type="text" name="nama_peminjam" required>
							</div>
							<div class="form-group">
								<label class="required">NO. HP</label>
								<input class="form-control" type="text" name="no_hp" required>
							</div>
							<div class="form-group form-type-material">
								<select class="form-control show-tick" name="keperluan" data-provide="selectpicker">
									<option value="Admin">Admin</option>
									<option value="Petugas">Petugas</option>
								</select>

								<label>Kelas</label>
							</div>
						</div>

						<div class="col-md-6">
							<div class="input-group form-group" data-provide="datepicker" data-date-format="yyyy-mm-dd">
								<span class="input-group-addon">Dari</span>
								<input type="text" class="form-control" name="tgl_peminjaman">
								<span class="input-group-addon">Sampai</span>
								<input type="text" class="form-control" name="tgl_pengembalian_rencana">
							</div>
							<div class="form-group form-type-material">
								<select class="form-control show-tick" name="keperluan" data-provide="selectpicker">
									<option value="Admin">Admin</option>
									<option value="Petugas">Petugas</option>
								</select>

								<label>Keperluan</label>
							</div>
							<div class="form-group">
								<textarea name="alamat" class="form-control" rows="4"></textarea>
								<label>Catatan Tambahan</label>
							</div>
							<div class="form-group">
								<label class="label-floated">Petugas</label>
								<p class="form-control-plaintext"><?php echo $this->session->userdata("nama_petugas"); ?></p>
							</div>
						</div>
					</div>

					<h5 class="card-title"><strong>Alat Yang di Pinjam</strong></h5>
					<div class="card-body row">
						<div class="col-md-12">

							<div id="load-detailPinjam"></div>

						</div>
					</div>

					<footer class="card-footer text-right">
						<button class="btn btn-secondary" type="reset">Batal</button>
						<input class="btn btn-primary" type="submit" name="submit" value="Submit">
					</footer>

				</form>
			</div>
		</div>