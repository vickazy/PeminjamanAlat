		<header class="header bg-ui-general">
			<div class="header-info">
				<h1 class="header-title">
					Transaksi Pinjam <strong>Animasi SMKN 2 Cimahi</strong>
				</h1>
			</div>

			<div class="header-action">
				<nav class="nav">
					<a class="nav-link" href="<?php echo base_url('transaksi/Minjam'); ?>">Lihat Data</a>
					<a class="nav-link active" href="<?php echo base_url('transaksi/Minjam/tambah'); ?>">Tambah</a>
				</nav>
			</div>
		</header>

		<div class="main-content">
			<div class="col-12 card form-type-material">
				<h4 class="card-title"><strong>Tambah</strong></h4>

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
								<label class="required">No. HP</label>
								<input type="text" class="form-control" data-format="+62{{999}}-{{9999}}-{{9999}}" name="no_hp" required>
							</div>
							<div class="form-group form-type-material">
								<select class="form-control show-tick" name="kelas" data-provide="selectpicker" data-live-search="true">
									<?php
										foreach($kelas as $kls){
									?>
										<option value="<?php echo $kls->id_kelas ?>"><?php echo $kls->nama_kelas ?></option>
									<?php
										}
									?>
								</select>

								<label class="label-floated">Kelas</label>
							</div>
						</div>

						<div class="col-md-6">
							<div class="input-group form-group" data-provide="datepicker" data-date-format="yyyy-mm-dd">
								<span class="input-group-addon">Dari</span>
								<input type="text" class="form-control" name="tgl_peminjaman" required>
								<span class="input-group-addon">Sampai</span>
								<input type="text" class="form-control" name="tgl_pengembalian_rencana" required>
							</div>
							<div class="form-group form-type-material">
								<select class="form-control show-tick" name="keperluan" data-provide="selectpicker" data-live-search="true">
									<?php
										foreach($keperluan as $kpl){
									?>
										<option value="<?php echo $kpl->id_keperluan ?>"><?php echo $kpl->nama_keperluan ?></option>
									<?php
										}
									?>
								</select>

								<label class="label-floated">Keperluan</label>
							</div>
							<div class="form-group">
								<textarea name="catatan" class="form-control" rows="4"></textarea>
								<label>Catatan Tambahan</label>
							</div>
							<div class="form-group">
								<label class="label-floated">Petugas</label>
								<p class="form-control-plaintext"><?php echo $this->session->userdata("nama_petugas"); ?></p>
							</div>
						</div>
					</div>

					<h5 class="card-title"><strong>Alat Yang di Pinjam</strong>&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" id="tambahDetail" class="btn btn-primary" style="color: #FFF;">Tambah</a></h5>
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

		<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Modal title</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="myForm" action="" method="post" class="form-horizontal">
							<input type="hidden" name="id_peminjam" value="<?php echo $kode; ?>">
							<div class="form-group">
								<label for="name" class="col-form-label">ID Detail:</label>
								<input type="text" name="idDetail" id="idDetail" class="form-control" readonly>
							</div>
							<div class="form-group">
								<label for="name" class="col-form-label">Nama Alat:</label>
								<select id="selectStokAlat" class="form-control show-tick" name="id_alat" data-provide="" data-live-search="">

								</select>
							</div>
							<div class="form-group">
								<label for="address" class="col-form-label">Jumlah:</label>
								<input type="number" name="jumlah_detail" class="form-control">
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<a href="javascript:void(0)" class="btn btn-secondary" data-dismiss="modal">Batal</a>
						<a href="javascript:void(0)" id="saveDetail" class="btn btn-primary">Tambah</a>
					</div>
				</div>
			</div>
		</div>