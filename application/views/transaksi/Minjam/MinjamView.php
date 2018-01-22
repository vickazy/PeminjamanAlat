		<header class="header bg-ui-general">
			<div class="header-info">
				<h1 class="header-title">
					Transaksi Pinjam <strong>Animasi SMKN 2 Cimahi</strong>
				</h1>
			</div>

			<div class="header-action">
				<nav class="nav">
					<a class="nav-link active" href="<?php echo base_url('transaksi/Minjam'); ?>">Lihat Data</a>
					<a class="nav-link" href="<?php echo base_url('transaksi/Minjam/tambah'); ?>">Tambah</a>
				</nav>
			</div>
		</header>

		<div class="main-content">
			<div class="card">
				<h4 class="card-title">Data Yang Meminjam Belum di Kembalikan</h4>

				<div class="card-body">
					<table id="tampilData" class="table table-striped table-bordered" cellspacing="0" data-provide="datatables" data-ajax="<?php echo base_url() ?>transaksi/Minjam/tampilData">
						<thead>
							<tr>
								<th>ID Peminjam</th>
								<th>NIS</th>
								<th>Nama Peminjam</th>
								<th>No. HP</th>
								<th>Keperluan</th>
								<th>Kelas</th>
								<th>Tanggal Meminjam</th>
								<th>Tanggal Kembali Rencana</th>
								<th>Action</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>ID Peminjam</th>
								<th>NIS</th>
								<th>Nama Peminjam</th>
								<th>No. HP</th>
								<th>Keperluan</th>
								<th>Kelas</th>
								<th>Tanggal Meminjam</th>
								<th>Tanggal Kembali Rencana</th>
								<th>Action</th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>

		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="myForm" action="" method="post" class="form-horizontal">
							<div class="form-group">
								<label for="name" class="col-form-label">ID Peminjam:</label>
								<input type="text" name="id_peminjam" id="id_peminjam" class="form-control" readonly>
							</div>
							<label class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input">
								<span class="custom-control-indicator"></span>
								<span class="custom-control-description">Unchecked</span>
							</label>
							<label class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input">
								<span class="custom-control-indicator"></span>
								<span class="custom-control-description">Unchecked</span>
							</label>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Save changes</button>
					</div>
				</div>
			</div>
		</div>