<script type="text/javascript">
	$(document).ready(function(){
		detailPinjam();


	});

	function detailPinjam(){
		$('#load-detailPinjam').load('<?php echo base_url('master/Siswa/bacaDetail/'); ?>');
	}
</script>