		<header class="header bg-ui-general">
			<div class="header-info">
				<h1 class="header-title">
					Data Kelas Jurusan <strong>Animasi SMKN 2 Cimahi</strong>
				</h1>
			</div>

			<div class="header-action">
				<nav class="nav">
					<a class="nav-link active" href="<?php echo base_url('master/Kelas'); ?>">Lihat Data</a>
					<a class="nav-link" href="<?php echo base_url('master/Kelas/tambah'); ?>">Tambah</a>
				</nav>
			</div>
		</header>

		<div class="main-content">
			<div class="card">
				<h4 class="card-title">Data Kelas</h4>

				<div class="card-body">
					<table class="table table-striped table-bordered" cellspacing="0" data-provide="datatables">
						<thead>
							<tr>
								<th>ID Kelas</th>
								<th>Nama Kelas</th>
								<th>Action</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>ID Kelas</th>
								<th>Nama Kelas</th>
								<th>Action</th>
							</tr>
						</tfoot>
						<tbody>
							<?php
								foreach($kelas as $u){ 
							?>
							<tr>
								<td><?php echo $u->id_kelas ?></td>
								<td><?php echo $u->nama_kelas ?></td>
								<td>
									<a href="<?php echo base_url('master/Kelas/edit/').$u->id_kelas; ?>" class="btn btn-float btn-sm btn-primary"><i class="ti-pencil"></i></a>&nbsp;&nbsp;&nbsp;
									<button id="delKelas" class="btn btn-float btn-sm btn-danger" data-id="<?php echo $u->id_kelas ?>"><i class="ti-close"></i></button>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>