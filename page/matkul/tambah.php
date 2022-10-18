<?php 

		$sql = $koneksi->query("select kode_mk from tb_matkul order by kode_mk desc");

		$data = $sql->fetch_assoc();

		

 ?>

<div class="row">
    <div class="col-md-8">
        <!-- Form Elements -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                Tambah Mata Kuliah
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <form role="form" method="POST">

                        	
                            <div class="form-group">
                                <label>Kode Mata Kuliah :</label>
                                <input type="text" class="form-control" name="kodemk" required />
                            </div>

                             <div class="form-group">
                                <label>Nama Mata Kuliah :</label>
                                <input type="text" class="form-control" name="nama" required/>
                            </div>

                             <div class="form-group">
                                <label>SKS :</label>
                                <input type="number" class="form-control" name="sks" required />
                            </div>

                            <div class="form-group">
                                <label>Semester :</label>
                                <select class="form-control" name="smester">

                                <option>-Pilih Smester-</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                </select>
                            </div>

                             <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
			                <input type=button value=Kembali onclick=self.history.back() class="btn btn-info" />
                        </form>

<?php 

	if (isset($_POST['simpan'])) {
		
		$kodemk = $_POST['kodemk'];
		$nama = $_POST['nama'];
		$sks = $_POST['sks'];
		$smester = $_POST['smester'];
		


		$simpan = $koneksi->query("insert into tb_matkul (kode_mk, nama_mk, sks, smester)
									values('$kodemk', '$nama', '$sks', '$smester')");


		if ($simpan) {
			echo "

					<script>
					    setTimeout(function() {
					        swal({
					            title: 'Selamat!',
					            text: 'Data Berhasil Disimpan!',
					            type: 'success'
					        }, function() {
					            window.location = '?page=matkul';
					        });
					    }, 300);
					</script>

			";
		}

	}

 ?>
                            