<div class="row">
    <div class="col-md-8">
        <!-- Form Elements -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                Tambah Ruang
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <form role="form" method="POST">

                        	
                            <div class="form-group">
                                <label>Ruang :</label>
                                <input type="Text" class="form-control" name="nama_ruang" />

                            </div>

                             <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
			                <input type=button value=Kembali onclick=self.history.back() class="btn btn-info" />
                        </form>

<?php

	if (isset($_POST['simpan'])) {

		$nama_ruang = $_POST['nama_ruang'];


		$simpan = $koneksi->query("insert into tb_ruang (nama_ruang) values('$nama_ruang')");


		if ($simpan) {
			echo "

					<script>
					    setTimeout(function() {
					        swal({
					            title: 'Selamat!',
					            text: 'Data Berhasil Disimpan!',
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
