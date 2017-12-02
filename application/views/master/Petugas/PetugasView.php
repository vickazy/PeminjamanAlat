		<header class="header bg-ui-general">
			<div class="header-info">
				<h1 class="header-title">
					Data Petugas/Guru Jurusan <strong>Animasi SMKN 2 Cimahi</strong>
				</h1>
			</div>

			<div class="header-action">
				<nav class="nav">
					<a class="nav-link active" href="<?php echo base_url('master/Petugas'); ?>">Lihat Data</a>
					<a class="nav-link" href="<?php echo base_url('master/Petugas/tambah'); ?>">Tambah</a>
				</nav>
			</div>
		</header>

		<div class="main-content">
			<div class="card">
				<h4 class="card-title">Data Petugas</h4>

				<div class="card-body">
					<table class="table table-striped table-bordered" cellspacing="0" data-provide="datatables">
						<thead>
							<tr>
								<th>ID Petugas</th>
								<th>Nama</th>
								<th>Alamat</th>
								<th>No. HP</th>
								<th>Jenis Kelamin</th>
								<th>TTL</th>
								<th>Username</th>
								<th>Jabatan</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>ID Petugas</th>
								<th>Nama</th>
								<th>Alamat</th>
								<th>No. HP</th>
								<th>Jenis Kelamin</th>
								<th>TTL</th>
								<th>Username</th>
								<th>Jabatan</th>
							</tr>
						</tfoot>
						<tbody>
							<?php
								foreach($petugas as $u){ 
							?>
							<tr>
								<td><?php echo $u->id_petugas ?></td>
								<td><?php echo $u->nama_petugas ?></td>
								<td><?php echo $u->alamat ?></td>
								<td><?php echo $u->no_hp ?></td>
								<td><?php echo $u->jk ?></td>
								<td><?php echo $u->tmpt_lahir ?></td>
								<td><?php echo $u->username ?></td>
								<td><?php echo $u->jabatan ?></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>