<header class="header bg-ui-general">
			<div class="header-info">
				<h1 class="header-title">
					Pengembalian Alat <strong>Animasi SMKN 2 Cimahi</strong>
				</h1>
			</div>

			<div class="header-action">
				<nav class="nav">
					<a class="nav-link active" href="<?php echo base_url('transaksi/Pengembalian'); ?>">Lihat Data</a>
					<!-- <a class="nav-link" href="<?php echo base_url('transaksi/Minjam/tambah'); ?>">Tambah</a> -->
				</nav>
			</div>
		</header>

		<div class="main-content">
			<div class="card">
				<h4 class="card-title"><strong>Pengembalian Alat</strong></h4>

				<div class="card-body">

					<table id="table1" class="table table-striped table-bordered" cellspacing="0" data-provide="datatables" data-ajax="<?php echo base_url() ?>transaksi/Pengembalian/tampilData">
						<thead>
							<tr>
								<th>ID Peminjam</th>
								<th>NIS</th>
								<th>Nama Peminjam</th>
								<th>No. HP</th>
								<th>Keperluan</th>
								<th>Kelas</th>
								<th>Tanggal Request</th>
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
								<th>Tanggal Request</th>
								<th>Tanggal Meminjam</th>
								<th>Tanggal Kembali Rencana</th>
								<th>Action</th>
							</tr>
						</tfoot>						
					</table>

				</div>
			</div>

			<div class="card">
				<h4 class="card-title"><strong>Data Yang Sudah di Kembalikan</strong></h4>

				<div class="card-body">

					<table id="table2" class="table table-striped table-bordered" cellspacing="0" data-provide="datatables" data-ajax="<?php echo base_url() ?>transaksi/Pengembalian/tampilSudahdiKembalikan">
						<thead>
							<tr>
								<th>ID Pengembalian</th>
								<th>ID Peminjam</th>
								<th>NIS</th>
								<th>Nama Peminjam</th>
								<th>Tanggal Meminjam</th>
								<th>Tanggal Pengembalian</th>
								<th>Action</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>ID Pengembalian</th>
								<th>ID Peminjam</th>
								<th>NIS</th>
								<th>Nama Peminjam</th>
								<th>Tanggal Meminjam</th>
								<th>Tanggal Pengembalian</th>
								<th>Action</th>
							</tr>
						</tfoot>						
					</table>

				</div>
			</div>
		</div>