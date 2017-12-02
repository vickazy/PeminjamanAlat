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
			<div class="card">
				<h4 class="card-title">Data Keperluan</h4>

				<div class="card-body">
					<table class="table table-striped table-bordered" cellspacing="0" data-provide="datatables">
						<thead>
							<tr>
								<th>ID Keperluan</th>
								<th>Nama Keperluan</th>
								<th>Action</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>ID Keperluan</th>
								<th>Nama Keperluan</th>
								<th>Action</th>
							</tr>
						</tfoot>
						<tbody>
							<?php
								foreach($keperluan as $u){ 
							?>
							<tr>
								<td><?php echo $u->id_keperluan ?></td>
								<td><?php echo $u->nama_keperluan ?></td>
								<td>
									<a href="<?php echo base_url('master/Keperluan/edit/').$u->id_keperluan; ?>" class="btn btn-float btn-sm btn-primary"><i class="ti-pencil"></i></a>&nbsp;&nbsp;&nbsp;
									<button id="delPerlu" class="btn btn-float btn-sm btn-danger" data-id="<?php echo $u->id_keperluan ?>"><i class="ti-close"></i></button>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>