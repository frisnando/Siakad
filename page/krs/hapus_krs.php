<?php 

	$id = $_GET['id'];

	$sql = $koneksi->query("delete from tb_krs where kode='$id'");

	?>
		<script>
		    setTimeout(function() {
		        sweetAlert({
		            title: 'OKE!',
		            text: 'Data Berhasil Dihapus!',
		            type: 'error'
		        }, function() {
		            onclick=self.history.back()
		        });
		    }, 300);
		</script>
		

	<?php

 ?>