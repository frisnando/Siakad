<?php 

	$kode_ruang = $_GET['kode_ruang'];

	$ambil = $koneksi->query("select * from tb_ruang where kode_ruang='$kode_ruang'");
	$tampil=$ambil->fetch_assoc();
 ?>
<div class="row">
    <div class="col-md-8">
        <!-- Form Elements -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                Ubah Ruang
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <form role="form" method="POST">

						<div class="form-group">
                                <label>Ruang :</label>
                                <input type="nama_ruang" class="form-control" name="ruang" />
                                
                            </div>

                             <input type="submit" name="ubah" value="Ubah" class="btn btn-primary">
			                <input type=button value=Kembali onclick=self.history.back() class="btn btn-info" />
                        </form>

<?php 

	if (isset($_POST['ubah'])) {
		
		
		$ruang = $_POST['ruang'];


		$simpan = $koneksi->query("update  tb_ruang set nama_ruang='$ruang' where kode_ruang = '$kode_ruang' ");


		if ($simpan) {
			echo "

					<script>
					    setTimeout(function() {
					        swal({
					            title: 'Selamat!',
					            text: 'Data Berhasil Diubah!',
					            type: 'success'
					        }, function() {
					            window.location = '?page=ruang';
					        });
					    }, 300);
					</script>

			";
		}

	}

 ?>
                            