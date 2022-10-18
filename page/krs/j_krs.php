<?php

$nim = $_SESSION['username'];



$sql = $koneksi->query("SELECT * from  tb_mahasiswa , tb_jurusan  
							WHERE  tb_mahasiswa.kode_jurusan = tb_jurusan.kode_jurusan
							
							AND tb_mahasiswa.nim='$nim'");

$sql2 = $koneksi->query("select * from tb_dosen where kode_dosen='$kode_dosen'");

$data = $sql->fetch_assoc();


?>


<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				Kartu Rencana Studi Anda
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-6">

						<form role="form" method="POST" enctype="multipart/form-data">

							<div class="form-group">
								<label>Nim :</label>
								<input class="form-control" name="nim" value="<?php echo $data['nim']; ?> " readonly />

							</div>

							<div class="form-group">
								<label>Nama :</label>
								<input class="form-control" name="nama" value="<?php echo $data['nama']; ?>" readonly />
							</div>

					</div>

					<div class="col-md-6">

						<div class="form-group">
							<label>Jurusan :</label>
							<input class="form-control" name="jurusan" value="<?php echo $data['nama_jurusan']; ?>" readonly></input>
						</div>

						<div class="form-group">
							<label>Semester yang Akan Ditempuh :</label>
							<input class="form-control" name="smester" value="<?php echo $data['smester']; ?>" readonly />
						</div>

						
						<div class="form-group">
							<label>Pilih Dosen PA :</label>
							<select class="form-control" name="nama_dosen"  >
								
                                    <option value="">--Pilih--</option>
								<?php

								$sql1 = $koneksi->query("select nama_dosen from tb_dosen");
								while ($j = $sql1->fetch_assoc()) {
									$pilih = ($j['nama_dosen'] == $data['nama_dosen'] ? "selected" : "");
									echo "
									<option value='$j[nama_dosen]' $pilih>$j[nama_dosen]</option>";
									
								}
								
								?>
                                <input type="submit" name="simpan" value="Tambah" class="btn btn-primary">

							</select>
						</div>


					</div>


					<div class="row">
						<div class="col-md-12">
							<!--    Hover Rows  -->
							<div class="panel panel-default">
								<div class="panel-heading">
									Data Mata Kuliah Yang Akan Ditempuh
								</div>
								<div class="panel-body">
									<div class="table-responsive">
										<table class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th>Pilih</th>
													<th>No</th>
													<th>Kode MK</th>
													<th>Mata Kuliah</th>
													<th>SKS</th>
													<th>Dosen/NIP</th>
													<!--<th>Ruang</th>
													<th>Jadwal</th>-->

												</tr>
											</thead>
											<tbody>

												<?php

												$smester = $data['smester'];
												$no = 1;
												

												$matkul  = $koneksi->query("SELECT * FROM tb_matkul LEFT JOIN tb_jadwal ON tb_matkul.kode_mk = tb_jadwal.kode_mk WHERE smester = '$smester'");

												
														

												while ($tampil_matkul = $matkul->fetch_assoc()) {
													
												?>
													<tr>

														<td><input type="checkbox" name="pilih[]" value="<?php echo $tampil_matkul['kode_mk']; ?>"></td>

														<td><?php echo $no++; ?></td>

														<td>
															<div class="form-group">

																<input class="form-control" name="kd_mk" value="<?php echo $tampil_matkul['kode_mk']; ?> " readonly style="width: 100px;" />

															</div>
														</td>

														<td><?php echo $tampil_matkul['nama_mk']; ?></td>
														<td><?php echo $tampil_matkul['sks']; ?></td>	
													</td>
													<?php
													$kd_dosen = $tampil_matkul['kode_dosen'];
													$dosen = $koneksi->query("SELECT * FROM tb_dosen 
																					WHERE kode_dosen = '$kd_dosen'");
													$tampil_dosen = $dosen->fetch_assoc();
													?>
														<td><?php echo $tampil_dosen['nama_dosen']; ?><br><?php echo $tampil_dosen['nip']; ?></td>
														<?php
													?>
													<?php
													$kd_ruang = $tampil_matkul['kode_ruang'];
													$ruang = $koneksi->query("SELECT * FROM tb_ruang 
																					WHERE kode_ruang = '$kd_ruang'");
													$tampil_ruang = $ruang->fetch_assoc();
													?>
														<!---<td><?php echo $tampil_ruang['nama_ruang']; ?></td>
														<td><?php echo $tampil_matkul['hari']; ?></td> --> 
													</tr>

												<?php } ?>
											</tbody>
										</table>

									</div>

								</div>
								<input type="submit" name="simpan" value="Tambah" class="btn btn-primary">

								</form>


								<a href="?page=krs&aksi=lihat&smester=<?php echo $smester; ?>" class="btn btn-success" style="margin-left: 20px;">Lihat KRS</a>

								<?php


								if (isset($_POST['simpan'])) {

									$nim = $_POST['nim'];
									$jurusan = $_POST['jurusan'];
									$nama_dosen= $_POST['nama_dosen'];

									$jumlah = count($_POST['pilih']);

									for ($i = 0; $i < $jumlah; $i++) {
										$pilih = $_POST['pilih'][$i];

										$simpan = $koneksi->query("insert into tb_krs(kode_mk, nim, kode_jurusan, status_nilai)values('$pilih','$nim','$jurusan', 1)");
									
										$update = $koneksi->query("update tb_mahasiswa set status_krs=0 where nim='$nim'");

										if ($simpan) {
								?>

											<script>
												setTimeout(function() {
													swal({
														title: "Selamat!",
														text: "KRS Berhasil Ditambahkan!",
														type: "success"
													}, function() {
														onclick=self.history.back()
													});
												}, 300);
											</script>

								<?php
										}
									}
								}


								?>