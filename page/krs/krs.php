<?php

$nim = $_SESSION['username'];

$sql = $koneksi->query("SELECT * from  tb_mahasiswa , tb_jurusan  
                            WHERE  tb_mahasiswa.kode_jurusan = tb_jurusan.kode_jurusan
                            
                            AND tb_mahasiswa.nim='$nim'");


$sql2 = $koneksi->query("select * from tb_dosen where kode_dosen='$kode_dosen'");

$data = $sql->fetch_assoc();


?>

<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Sistem Informasi Akademik</title>
        <!-- BOOTSTRAP STYLES-->
        <link href="assets/css/responsive.css" rel="stylesheet" />
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
        <!-- FONTAWESOME STYLES-->
        <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
        <link href="assets/css/custom.css" rel="stylesheet" />
        <!-- GOOGLE FONTS-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
        <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

        <link rel="stylesheet" type="text/css" href="assets/sw/dist/sweetalert.css">

        <script type="text/javascript" src="assets/sw/dist/sweetalert.min.js"></script>
    </head>


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Kartu Rencana Studi Yang Telah Diambil
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
                            </select>
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
                            <!-- Advanced Tables -->

                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>Kode MK</th>
                                                <th>Nama Mata Kuliah</th>
                                                <th>SKS</th>
                                                <th>Dosen/NIP</th>
                                              <!--<th>Kelas</th>
                                                <th>hari Jam</th>-->
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php

                                            $smester = $_GET['smester'];
                                            $nim = $_SESSION['username'];
                                            $no = 1;

                                            if ($_SESSION['mahasiswa']) {


                                                $sql = $koneksi->query("SELECT * from tb_krs , tb_matkul, tb_dosen, tb_jadwal, tb_ruang   
                                                                            WHERE   tb_matkul.kode_mk = tb_krs.kode_mk
                                                                            AND     tb_dosen.kode_dosen = tb_jadwal.kode_dosen
                                                                            AND     tb_matkul.kode_mk = tb_jadwal.kode_mk
                                                                            AND     tb_jadwal.kode_ruang = tb_ruang.kode_ruang
                                                                            AND tb_krs.nim='$nim'
                                                                            AND tb_matkul.smester='$smester'");
                                            } else {

                                                $sql = $koneksi->query("select * from tb_krs  
                                                                inner join tb_mahasiswa 
                                                                on tb_mahasiswa.nim=tb_krs.nim 
                                                                
                                                                inner join tb_matkul
                                                                on tb_matkul.kode_mk=tb_krs.kode_mk
                                                                
                                                                inner join tb_jurusan                                                                
                                                                on tb_jurusan.kode_jurusan=tb_krs.kode_jurusan");
                                            }
                                            while ($data = $sql->fetch_assoc()) {



                                            ?>

                                                <tr class="odd gradeX">
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $data['kode_mk']; ?></td>
                                                    <td><?php echo $data['nama_mk']; ?></td>
                                                    <td align="center"><?php echo $data['sks']; ?></td>
                                                    <td><?php echo $data['nama_dosen']; ?><br><?php echo $data['nip']; ?></td>
                                                 <!--<td><?php echo $data['nama_ruang']; ?></td>
                                                    <td><?php echo $data['hari'] . ', &nbsp;' . date('G:i', strtotime($data['jam_mulai'])) . '-' . date('G:i', strtotime($data['jam_selesai'])) . '&nbsp; WIB'; ?></td> -->


                                                    <td>


                                                        <a onclick="return confirm('Yakin Akan Menghapus Data Ini...???')" href="?page=krs&aksi=hapus&id=<?php echo $data['kode']; ?>" class=" btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>


                                                    </td>
                                                </tr>

                                            <?php

                                                $jml_krs = $jml_krs + $data['sks'];
                                            }

                                            ?>
                                        </tbody>

                                        <tr>
                                            <th style="text-align: center; font-size: 17px; " colspan="3">Total SKS</th>
                                            <td style="font-size: 15px; text-align: right;"><b><?php echo $jml_krs; ?></b></td>
                                            <td colspan="4"></td>
                                        </tr>

                                    </table>
                                </div>

                                <a href="./cetak/cetak_krs.php?id=<?php echo $nim; ?>&smester=<?php echo $smester; ?>" class="btn btn-default" style="margin-top: 10px;" target="blank"><i class="fa fa-print"></i> Cetak KRS</a>

                                <input type=button value=Kembali onclick=self.history.back() class="btn btn-info" style="margin-top: 10px;" />


                           