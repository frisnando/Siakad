<?php 

	$kode_ruang = $_GET['kode_ruang'];

	$sql = $koneksi->query("delete from tb_ruang where kode_ruang='$kode_ruang'");

	?>

		<script>
		    setTimeout(function() {
		        sweetAlert({
		            title: 'OKE!',
		            text: 'Data Berhasil Dihapus!',
		            type: 'error'
		        }, function() {
		            window.location = '?page=ruang';
		        });
		    }, 300);
		</script>

	<?php

 ?>