<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title><?php echo $title; ?></title>

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,300i" rel="stylesheet">

	<!-- Styles -->
	<link href="<?php echo base_url('assets/css/core.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/app.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/style.min.css'); ?>" rel="stylesheet">

	<!-- Favicons -->
	<link rel="apple-touch-icon" href="<?php echo base_url('assets/img/apple-touch-icon.png'); ?>">
	<link rel="icon" href="<?php echo base_url('assets/img/favicon.png'); ?>">
</head>
<body>

	<!-- Preloader -->
	<div class="preloader">
		<div class="spinner-dots">
			<span class="dot1"></span>
			<span class="dot2"></span>
			<span class="dot3"></span>
		</div>
	</div>

	<!-- Sidebar -->
		<?php
			if ($this->session->userdata("jabatan") == "Admin") {
				$this->load->view("Layout/menuAdmin");
			} else {
				$this->load->view("Layout/menuPetugas");
			}
		?>
	<!-- END Sidebar -->

	<!-- Topbar -->
		<?php $this->load->view('Layout/topbar'); ?>
	<!-- END Topbar -->

	<!-- Main container -->
	<main>
		<?php echo $contentnya; ?>
	<!--/.main-content -->

		<!-- Footer -->
			<?php echo $footernya; ?>
		<!-- END Footer -->
	</main>
	<!-- END Main container -->

    <!-- Scripts -->
	<script src="<?php echo base_url('assets/js/core.min.js'); ?>" data-provide="sweetalert"></script>
	<script src="<?php echo base_url('assets/js/app.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/script.min.js'); ?>"></script>

	<script type="text/javascript">
		$(document).ready(function(){

			detailPinjam();

			$(document).on('click', '#delAlat', function(e){
				var id_alat = $(this).data('id');
				var urlAlat = '<?php echo base_url('master/Alat/hapus/'); ?>';

				SwalDelete(id_alat, urlAlat);
				e.preventDefault();
			});

			$(document).on('click', '#delKelas', function(e){
				var id_kelas = $(this).data('id');
				var urlKelas = '<?php echo base_url('master/Kelas/hapus/'); ?>';

				SwalDelete(id_kelas, urlKelas);
				e.preventDefault();
			});

			$(document).on('click', '#delPerlu', function(e){
				var id_keperluan = $(this).data('id');
				var urlKeperluan = '<?php echo base_url('master/Keperluan/hapus/'); ?>';

				SwalDelete(id_keperluan, urlKeperluan);
				e.preventDefault();
			});

			$(document).on('click', '#delDetail', function(e){
				var id_detail = $(this).data('id');

				$.ajax({
					url: '<?php echo base_url('transaksi/Minjam/hapusDetail/'); ?>' + id_detail,
					dataType: 'json'
				})
				.done(function(response){
					detailPinjam();
				})
				.fail(function(){
					swal('Oops...', 'Something went wrong with ajax !', 'error');
				});
				e.preventDefault();
			});

			/*$('#detail_form').submit(function(e){
				e.preventDefault(); // Prevent Default Submission
				
				$.ajax({
					url: '<?php echo base_url('transaksi/Minjam/inputDetail/'); ?>',
					type: 'POST',
					data: $(this).serialize() // it will serialize the form data
				})
				.done(function(response){
					var id_detail = '<?php echo $id_detail; ?>';
					var idTerakhir = id_detail.substr(id_detail.length - 1);
					
					var hasil = parseInt(idTerakhir)+1;
					var hasilAkhir = 'DTL00000' + hasil;

					detailPinjam();
					$('#jumlah_detail').val('');
					$('#id_detail').val(hasilAkhir);
				})
				.fail(function(){
					alert('Ajax Submit Failed ...');	
				});
			});*/

		});

		function SwalDelete(id, url){

			swal({
				title: 'Apakah Kamu Yakin?',
				text: "Data Akan Terhapus Secara Permanen!",
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Ya, Hapus!',
				cancelButtonText: 'Batal',
				showLoaderOnConfirm: true,

				preConfirm: function() {
					return new Promise(function(resolve) {

						$.ajax({
							url: url+id,
							dataType: 'json'
						})
						.done(function(response){
							swal('Terhapus!', response.message, response.status);
							readProducts();
						})
						.fail(function(){
							swal('Oops...', 'Something went wrong with ajax !', 'error');
						});
					});
				},
				allowOutsideClick: false			  
			});	

		}

		function readProducts(){
			setTimeout(function () {
				location.reload()
			}, 900);
		}

		function detailPinjam(){
			$('#load-detailPinjam').load('<?php echo base_url('transaksi/Minjam/bacaDetail/'); ?>');
		}
	</script>

</body>
</html>